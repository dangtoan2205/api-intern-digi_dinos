<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use DB;
use Modules\Admin\Models\Service;
use File;

class ServiceRepository extends BaseRepository
{
    /**
     * @return  Service
     */
    public function getModel()
    {
        return Service::class;
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
            default:
                return $query;
        }
    }

    /**
     * Create a new resource in storage.
     *
     * @param mixed $request Request.
     *
     * @return Query
     */
    public function createService($request)
    {
        try {
            $dataInsert = [
                'title_vi' => $request->title_vi,
                'title_en' => $request->title_en,
                'title_ja' => $request->title_ja,
                'name_vi' => $request->name_vi,
                'name_en' => $request->name_en,
                'name_ja' => $request->name_ja,
                'des_vi' => $request->des_vi,
                'des_en' => $request->des_en,
                'des_ja' => $request->des_ja,
                'status' => $request->status ?? 0,
            ];

            $getImage = $request->file('image');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/service', $newNameImage);
            } else {
                $newNameImage = '';
            }
            $dataInsert['image'] = $newNameImage;
            return $service = $this->model->create($dataInsert);
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
   
     /**
     * Create a new resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return Query
     */
    public function findService($id)
    {
        try {
            $service = $this->model->find($id);
            return $service;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

     /**
     * Create a new resource in storage.
     *
     * @param mixed $id      ID.
     * @param mixed $request Request.
     *
     * @return Query
     */
    public function updateService($id, $request)
    {
        try {
            $service = $this->model->find($id);
            $dataUpdate = [
                'title_vi' => $request->title_vi,
                'title_en' => $request->title_en,
                'title_ja' => $request->title_ja,
                'name_vi' => $request->name_vi,
                'name_en' => $request->name_en,
                'name_ja' => $request->name_ja,
                'des_vi' => $request->des_vi,
                'des_en' => $request->des_en,
                'des_ja' => $request->des_ja,
                'status' => $request->status,
            ];
            $newNameImage = $service->image;
            $getImage = $request->file('image');
            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/service', $newNameImage);
                $imagePath = "upload/service/" .  $service->image;
                File::delete($imagePath);
            }
            $dataUpdate['image'] = $newNameImage;
            $service->update($dataUpdate);
            return $service;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

     /**
     * Create a new resource in storage.
     *
     * @param mixed $id ID.
     *
     * @return boolean
     */
    public function destroyService($id)
    {
        try {
            $service = $this->model->find($id);
            $service->delete();
            $imagePath = "upload/service/" .  $service->image;
            File::delete($imagePath);
            return true;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Query
     */
    public function getServicePCTop()
    {
        try {
            return $this->model->where('status', 1)->latest()->take(3)->get();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Query
     */
    public function getServicePCBottom()
    {
        try {
            return $this->model->where('status', 1)->latest()->skip(3)->take(3)->get();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Query
     */
    public function getServiceMobile()
    {
        try {
            return $this->model->where('status', 1)->latest()->take(5)->get();
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }
}
