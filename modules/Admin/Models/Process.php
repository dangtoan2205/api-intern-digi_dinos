<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    protected $table = 'processes';
//    use SoftDeletes;

    protected $fillable  = [
        'id',
        'title_vi',
        'image',
        'title_en',
        'title_ja',
        'status',
    ];
}
