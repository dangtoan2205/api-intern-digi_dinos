<?php

namespace Modules\Admin\Repositories;

use Modules\Admin\Models\Portfolio;
use App\Repositories\BaseRepository;
use DB;

class PortfolioRepository extends BaseRepository
{
    /**
     * @return  Portfolio
     */
    public function getModel()
    {
        return Portfolio::class;
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
            case 'created_at':
                return $query->whereDate($column, $data);
            case 'title_vi':
            case 'content_vi':
            case 'status':
                return $query->where($column, 'like', '%' . $data . '%');
            default:
                return $query;
        }
    }
}
