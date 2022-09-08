<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'image',
        'title_vi',
        'title_en',
        'title_ja',
        'name_vi',
        'name_en',
        'name_ja',
        'des_vi',
        'des_en',
        'des_ja',
        'status',
    ];
}
