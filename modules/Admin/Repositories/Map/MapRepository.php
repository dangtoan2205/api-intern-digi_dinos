<?php

namespace Modules\Admin\Repositories\Map;

use App\Repositories\BaseRepository;
use Modules\Admin\Models\Map;

class MapRepository extends BaseRepository
{
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function getModel()
    {
        return Map::class;
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
