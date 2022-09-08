<?php

use Illuminate\Database\Seeder;

use Modules\Admin\Seeders\AdminSeeder;
use Modules\Admin\Seeders\SliderSeeder;
use Modules\Admin\Seeders\CategoryPostSeeder;
use Modules\Admin\Seeders\MenuSeeder;
use Modules\Admin\Seeders\PortfolioSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenuSeeder::class,
            AdminSeeder::class,
            PortfolioSeeder::class,
            CategoryPostSeeder::class,
        ]);
        $this->call([
            SliderSeeder::class,
        ]);
    }
}
