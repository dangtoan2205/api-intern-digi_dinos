<?php

namespace modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = ['title_vi', 'title_ja', 'title_en', 'content_vi', 'content_ja', 'content_en', 'url_image', 'status'];
    protected $table = 'portfolio';
}
