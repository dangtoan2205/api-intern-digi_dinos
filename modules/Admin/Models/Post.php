<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = ['title_vi', 'title_ja', 'title_en', 'content_vi', 'content_ja', 'content_en', 'url_image', 'status', 'category_post_id'];
    /**
     * Menus
     *
     * @return mixed
     */
    public function category_post()
    {
        return $this->belongsTo(CategoryPost::class);
    }
}
