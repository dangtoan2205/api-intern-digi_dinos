<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use DB;
use Modules\Admin\Models\Module;

class ModuleRepository extends BaseRepository
{
    /**
     * @return  Module
     */
    public function getModel()
    {
        return Module::class;
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
            default:
                return $query;
        }
    }
}
