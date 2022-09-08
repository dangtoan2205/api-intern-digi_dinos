<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use DB;
use Modules\Admin\Models\ModuleImage;

class ModuleImageRepository extends BaseRepository
{
    /**
     * @return  ModuleImage
     */
    public function getModel()
    {
        return ModuleImage::class;
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
            case 'name_vi':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'name_en':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'name_ja':
                return $query->where($column, 'like', '%'.$data.'%');
            case 'status':
                return $query->where($column, '=', $data);
            default:
                return $query;
        }
    }
}
