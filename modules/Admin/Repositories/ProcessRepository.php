<?php

namespace Modules\Admin\Repositories;

use App\Exceptions\DDException;
use App\Helpers\LogHelper;
use App\Repositories\BaseRepository;
use DB;
use File;
use Modules\Admin\Requests\ProcessRequest;
use Session;
use Modules\Admin\Models\Process;

class ProcessRepository extends BaseRepository
{
    /**
     * @return Process
     */
    public function getModel()
    {
        return Process::class;
    }

    /**
     * @param ProcessRequest $request ProcessRequest.
     * @return Process
     */
    public function createProcess(ProcessRequest $request)
    {
        try {
            $data = $request->only([
                'title_vi',
                'title_ja',
                'title_en',
                'status',
            ]);

            $process = new Process();
            $process->title_vi = $data['title_vi'];
            $process->title_ja = $data['title_ja'];
            $process->title_en = $data['title_en'];
            $process->status   = $data['status'];

            $getImage = $request->file('image');

            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newNameImage = time() . $nameImage;
                $getImage->move('upload/process', $newNameImage);
            } else {
                $newNameImage = '';
            }

            $process['image'] = $newNameImage;
            $process->save();
            return $process;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return Process $process Process.
     */
    public function findProcess(int $id)
    {
        try {
            $process = $this->model->find($id);
            return $process;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer        $id      ID.
     * @param ProcessRequest $request ProcessRequest.
     * @return Process $process Process.
     */
    public function updateProcess(int $id, ProcessRequest $request)
    {
        try {
            $process = $this->model->find($id);

            $dataUpdate = $request->only([
                'title_vi',
                'title_ja',
                'title_en',
                'status',
            ]);

            $newImage = $process->image;
            $getImage = $request->file('image');
            if ($getImage) {
                $nameImage = $getImage->getClientOriginalName();
                $newImage = time() . $nameImage;
                $getImage->move('upload/process', $newImage);
                $imagePath = "upload/process/" .  $process->image;
                File::delete($imagePath);
            }
            $dataUpdate['image'] = $newImage;
            $process->update($dataUpdate);
            return $process;
        } catch (DDException $th) {
            LogHelper::logTrace($th);

            throw $th;
        }
    }

    /**
     * @param integer $id ID.
     * @return Process $process Process.
     */
    public function destroyProcess(int $id)
    {
        try {
            $process = $this->model->find($id);
            $process->delete();
            $imagePath = "upload/service/" .  $process->image;
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
                return $query->where($column, 'like', '%'.$data.'%');
            case 'title_en':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'title_ja':
                return $query->where($column, 'like', '%'.$data.'%');
            default:
                return $query;
        }
    }
}
