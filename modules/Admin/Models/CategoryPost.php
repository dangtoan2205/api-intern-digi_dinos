<?php

namespace modules\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';
    protected $fillable = ['title_vi', 'title_ja', 'title_en', 'location', 'status'];

    /**
     * Categorypost
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
