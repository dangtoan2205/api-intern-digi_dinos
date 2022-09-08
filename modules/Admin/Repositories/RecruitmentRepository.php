<?php

namespace Modules\Admin\Repositories;

use App\Repositories\BaseRepository;
use Modules\Admin\Models\Recruitment;

class RecruitmentRepository extends BaseRepository
{
    /**
     * @return  Recruitment
     */
    public function getModel()
    {
        return Recruitment::class;
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
            case 'post_date':
                return $query->whereDate($column, $data);
            case 'expired_date':
                return $query->whereDate($column, $data);
            case 'title_vi':
                return $query->where($column, 'like', '%' . $data . '%');
            case 'title_en':
                return $query->where($column, 'like', '%' . $data . '%');
            case 'title_ja':
                return $query->where($column, 'like', '%' . $data . '%');
            case 'status':
                return $query->where($column, '=', $data);
            default:
                return $query;
        }
    }
}
