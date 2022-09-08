<?php


namespace Modules\Admin\Repositories;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Repositories\BaseRepository;
use File;
use Modules\Admin\Models\Technologi;
use Modules\Admin\Requests\TechnologiRequest;

class TechnologiRepository extends BaseRepository
{
    /**
     * @return Technologi
     */
    public function getModel()
    {
        return Technologi::class;
    }

    /**
     * @param TechnologiRequest $request TechnologiRequest.
     * @return Technologi
     */
    public function createTechnologi(TechnologiRequest $request)
    {
        try {
            $data = $request->only([
                'title_vi',
                'title_ja',
                'title_en',
                'status',
            ]);

            $technologi = new Technologi();
            $technologi->title_vi = $data['title_vi'];
            $technologi->title_ja = $data['title_ja'];
            $technologi->title_en = $data['title_en'];
            $technologi->status = $data['status'];

            $getImage = $request->file('image');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/technologies', $newNameImage);
            } else {
                $newNameImage = '';
            }

            $technologi['image'] = $newNameImage;
            $technologi->save();
            return $technologi;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return Technologi $technologi Technologi.
     */
    public function findTechnologi(int $id)
    {
        try {
            $technologi = $this->model->find($id);
            return $technologi;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer           $id      ID.
     * @param TechnologiRequest $request TechnologiRequest.
     * @return Technologi       $technologi Technologi.
     */
    public function updateTechnologi(int $id, TechnologiRequest $request)
    {
        try {
            $technologi = $this->model->find($id);

            $dataUpdate = $request->only([
                'title_vi',
                'title_ja',
                'title_en',
                'status',
            ]);

            $newImage = $technologi->image;
            $getImage = $request->file('image');
            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newImage = time() . $nameImage;
                $getImage->move('upload/technologies', $newImage);
                $imagePath = "upload/technologies/" . $technologi->image;
                File::delete($imagePath);
            }
            $dataUpdate['image'] = $newImage;
            $technologi->update($dataUpdate);
            return $technologi;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return Technologi $technologi Technologi.
     */
    public function destroyTechnologi(int $id)
    {
        try {
            $technologi = $this->model->find($id);
            $technologi->delete();
            $imagePath = "upload/service/" . $technologi->image;
            File::delete($imagePath);
            return true;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
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
                return $query->where($column, 'like', '%' . $data . '%');
            case 'title_en':
                return $query->where($column, 'like', '%' . $data . '%');
            case 'title_ja':
                return $query->where($column, 'like', '%' . $data . '%');
            default:
                return $query;
        }
    }
}
