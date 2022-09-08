<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| 'middleware' => ['auth:admin-api', 'check.permission'],
*/
Route::group(['middleware' => ['auth:admin-api', 'check.permission'], 'prefix' => 'admins'], function () {
    Route::apiResource('admin', 'AdminController');
    Route::put('admin/lock-unlock/{id}', 'AdminController@lockUnlock');
    Route::apiResource('module', 'ModuleController');
    Route::apiResource('module-image', 'ModuleImageController');
    Route::apiResource('slider', 'SliderController');
    Route::get('me', 'AdminController@getProfile')->name('me.');
    Route::apiResource('permistion', 'PermistionController');
    Route::apiResource('role', 'RoleController');
    Route::apiResource('user-role', 'UserRoleController');
    // Route::post('/show-permission', 'RoleController@create')->name('show-permission.');
    Route::post('/show-permission', 'UserRoleController@create')->name('show-permission.');
    Route::apiResource('process', 'ProcessController');
    Route::post('sort', 'ProcessController@sort')->name('sort.');
    Route::get('search', 'ProcessController@search')->name('search.');
    Route::apiResource('customer', 'CustomerController');
    Route::apiResource('service', 'ServiceController');
    Route::apiResource('technologi', 'TechnologiController');
    Route::apiResource('portfolio', 'PortfolioController');
    Route::apiResource('category-post', 'CategoryPostController');
    Route::post('category-post/update-location', 'CategoryPostController@updateLocation');
    Route::apiResource('post', 'PostController');
});

// Route::group(['middleware' => ['guest:admin-api'], 'prefix' => 'admins'], function () {
//     Route::post('login', 'AdminController@login')->name('admins/login');
// });

Route::group(['prefix' => 'admins'], function () {
    Route::apiResource('menu', 'MenuController');
    Route::get('/menu-parent-id', 'MenuController@getMenuByParentId');
    Route::post('/menu-position', 'MenuController@updatePosition');
});
Route::group(['middleware' => ['guest:admin-api'], 'prefix' => 'admins'], function () {
    Route::post('login', 'AdminController@login')->name('admins/login');
    Route::post('logout', 'AdminController@logout')->name('logout.');
    Route::apiResource('recruitment-position', 'RecruitmentPositionController');
    Route::apiResource('recruitment', 'RecruitmentController');
});
