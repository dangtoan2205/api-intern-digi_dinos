<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "sliders";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_vi',
        'title_ja',
        'title_en',
        'image_url',
        'status',
    ];
}
