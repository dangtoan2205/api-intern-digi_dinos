<?php

namespace Modules\Admin\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = Slider::create([
            'title_vi' => 'anh thu nhat',
            'title_en' => 'image one',
            'title_ja' => 'adasdasd',
            'image_url' => 'hell words',
            'status' => 1
        ]);
        $sliders = Slider::create([
            'title_vi' => 'anh thu hai',
            'title_en' => 'image two',
            'title_ja' => 'dsadasd',
            'image_url' => 'hell words 2',
            'status' => 0
        ]);
    }
}
