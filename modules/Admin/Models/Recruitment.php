<?php

namespace modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\RecruitmentPosition;

class Recruitment extends Model
{
    use HasFactory;
    protected $fillable = [
        'recruitment_position_id',
        'title_vi',
        'title_en',
        'title_ja',
        'salary',
        'post_date',
        'expired_date',
        'des_vi',
        'des_en',
        'des_ja',
        'status',
    ];

    /**
     * Recruitment_position
     *
     * @return mixed
     */
    public function recruitment_position()
    {
        return $this->belongsTo(RecruitmentPosition::class);
    }
}
