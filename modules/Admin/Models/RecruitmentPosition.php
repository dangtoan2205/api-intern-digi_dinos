<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use modules\Admin\Models\Recruitment;

class RecruitmentPosition extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_vi',
        'name_en',
        'name_ja',
        'status',
    ];

    /**
     * Recruitment
     *
     * @return mixed
     */
    public function recruitments()
    {
        return $this->hasMany(Recruitment::class);
    }
}
