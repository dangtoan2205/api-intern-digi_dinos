<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use DB;
use Modules\Admin\Models\CategoryPost;

class CategoryPostRepository extends BaseRepository
{
    /**
     * @return  CategoryPost
     */
    public function getModel()
    {
        return CategoryPost::class;
    }

    /**
     * @param mixed $query  Query.
     * @param mixed $column Column.
     * @param mixed $data   Data.
     * @return Query
     */
    public function search($query, $column, $data)
    {
        switch ($column) {
            case 'created_at':
                return $query->whereDate($column, $data);
            case 'title_vi':
            case 'location':
            case 'status':
                return $query->where($column, 'like', '%' . $data . '%');
            default:
                return $query;
        }
    }

    /**
     * Update loction
     *
     * @param mixed $request Request.
     * @return mixed
     */
    public function updateLocation($request)
    {
        $i = 0;
        foreach ($request->all() as $value) {
            $cate_first = $this->model->where('id', $value['id'])->first();
            $cate_first->location = $i;
            $cate_first->save();
            $i++;
        }
        return $cate_first;
    }
}
