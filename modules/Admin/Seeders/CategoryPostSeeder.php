<?php

namespace Modules\Admin\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Models\CategoryPost;
use Modules\Admin\Models\Post;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryPost::updateOrCreate(
            [
                'title_vi' => 'category post 1',
                'title_ja' => 'category post 1',
                'title_en' => 'category post 1',
                'location' => '1',
            ]
        );
        $category = CategoryPost::where('title_vi', 'category post 1')->first();
        Post::updateOrCreate(
            [
                'title_vi' => 'post 1',
                'title_ja' => 'post 1',
                'title_en' => 'post 1',
                'content_vi' => 'post 1',
                'content_ja' => 'post 1',
                'content_en' => 'post 1',
                'url_image' => '/image/avatar.jpg',
                'category_post_id' => $category->id,
            ]
        );
    }
}
