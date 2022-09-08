<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Modules\Admin\Models\Slider;
use Session;
use File;

class SliderRepository extends BaseRepository
{

    /**
     * @return  Slider
     */
    public function getModel()
    {
        return Slider::class;
    }

    /**
    * Create Slider
    *
    * @param mixed $request Request.
    *
    * @return boolean
    */
    public function createSlider($request)
    {
        $data = $request->only([
            'title_vi',
            'title_ja',
            'title_en',
            'status',
            'image_url',
        ]);
        $slider = new Slider();
        $slider->title_vi = $data['title_vi'];
        $slider->title_ja = $data['title_ja'];
        $slider->title_en = $data['title_en'];
        $slider->status   = $data['status'];

        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/uploads/imagesSlider'), $filename);
            $slider->image_url = $filename;
        }
        \Log::info($slider);
        $slider->save();
        return $slider;
    }

    /**
     * Update Slider
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return boolean
     */
    public function editSlider($id, $request)
    {
        $data = $request->only([
            'title_vi',
            'title_ja',
            'title_en',
            'status',
            'image_url',
        ]);
        $slider = Slider::find($id);
        $slider->title_vi = $data['title_vi'];
        $slider->title_ja = $data['title_ja'];
        $slider->title_en = $data['title_en'];
        $slider->status   = $data['status'];

        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/uploads/imagesSlider'), $filename);
            $slider->image_url = $filename;
        }
        $slider->save();

        return $slider;
    }


    /**
     * Delete Slider
     *
     * @param mixed $id ID.
     *
     * @return boolean
     */
    public function destroySlider($id)
    {
        $slider = $this->model->find($id);
            $slider->delete();

            $imagePath = "uploads/imagesSlider/" .  $slider->image_url;
            File::delete($imagePath);
            return true;
    }

    /**
     * @param mixed $query  Query.
     * @param mixed $column Column.
     * @param mixed $data   Data.
     *
     * @return Query
     */
    public function search($query, $column, $data)
    {
        switch ($column) {
            case 'id':
            case 'created_at':
                return $query->whereDate($column, $data);
            case 'title_vi':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'title_ja':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'title_en':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'status':
                return $query->where($column, $data);
            default:
                return $query;
        }
    }

    /**
     * List Slider
     *
     *
     * @return Query
     */
    public function getSliders()
    {
        try {
            return $this->model->where('status', 1)->latest()->take(3)->get();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}
