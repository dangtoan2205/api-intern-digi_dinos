<?php

namespace Modules\Admin\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = 1;

        // user groups
        $userMenu = Menu::updateOrCreate(
            ['title' => 'user.index'],
            ['link' => '/user', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        //process
        $userMenu = Menu::updateOrCreate(
            ['title' => 'slider.list'],
            ['link' => '/slider', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        $serviceMenu = Menu::updateOrCreate(
            ['title' => 'service.index'],
            ['link' => '/service', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        // process
        $processMenu = Menu::updateOrCreate(
            ['title' => 'Process'],
            ['link' => '/process', 'position' => $position++, 'icon' => 'process-friends',  'parent_id' => 0]
        );
        
        $permissionMenu = Menu::updateOrCreate(
            ['title' => 'permistion.index'],
            ['link' => '/permistion', 'position' => $position++, 'icon' => 'process-friends',  'parent_id' => 0]
        );

        $roleMenu = Menu::updateOrCreate(
            ['title' => 'role.index'],
            ['link' => '/role', 'position' => $position++, 'icon' => 'process-friends',  'parent_id' => 0]
        );

        $userRolesMenu = Menu::updateOrCreate(
            ['title' => 'user_roles.index'],
            ['link' => '/user_roles', 'position' => $position++, 'icon' => 'process-friends',  'parent_id' => 0]
        );
        // customer
        $customerMenu = Menu::updateOrCreate(
            ['title' => 'customer.index'],
            ['link' => '/customer', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        // roles
        $roleMenu = Menu::updateOrCreate(
            ['title' => 'role.index'],
            ['link' => '/role', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        //main technologies
        $roleMenu = Menu::updateOrCreate(
            ['title' => 'Technologies'],
            ['link' => '/technologi', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        // portfolio
        $portfolioMenu = Menu::updateOrCreate(
            ['title' => 'portfolio.index'],
            ['link' => '/portfolio', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        // categoryPost
        $categoryPostMenu = Menu::updateOrCreate(
            ['title' => 'category_post.index'],
            ['link' => '/category_post', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );

        // post
        $postMenu = Menu::updateOrCreate(
            ['title' => 'post.index'],
            ['link' => '/post', 'position' => $position++, 'icon' => 'user-friends',  'parent_id' => 0]
        );
    }
}
