<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologi extends Model
{
    protected $table = 'technologies';
//    use SoftDeletes;

    protected $fillable  = [
        'id',
        'title_vi',
        'title_en',
        'title_ja',
        'image',
        'status',
    ];
}
