<?php

namespace Modules\Admin\Seeders;

use Modules\Admin\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::updateOrCreate(
            [
                'title_vi' => 'VI FRAMEWORK',
                'title_ja' => 'JA FRAMEWORK',
                'title_en' => 'EN FRAMEWORK',
                'content_vi' => 'VI content',
                'content_ja' => 'JA content',
                'content_en' => 'EN content',
                'url_image' => '/image/avatar.jpg',
            ]
        );
    }
}
