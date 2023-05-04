<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::middleware('is.login')->group(function () {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/store', 'LoginController@store')->name('login.store');
});
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware('login')->group(function () {
    // Admin
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\DashBoardController@index')->name('admin.dashboard');

        // Product
        Route::resource('product', 'Admin\ProductController');
        Route::get('product/delete/{id}', 'Admin\ProductController@delete')->name('product.delete');

        // Product Cat
        Route::resource('product-cat', 'Admin\ProductCatController');
        Route::get('product-cat/delete/{id}', 'Admin\ProductCatController@delete')->name('product-cat.delete');

        // Menu level 1
        Route::resource('menu/level1', 'Admin\MenuController');
        Route::get('menu/level1/delete/{id}', 'Admin\MenuController@delete')->name('level1.delete');

        // Menu level 2
        Route::resource('menu/level2', 'Admin\MenuChildController');
        Route::get('menu/level2/delete/{id}', 'Admin\MenuChildController@delete')->name('level2.delete');

        // Post
        Route::resource('post', 'Admin\PostController');
        Route::get('post/delete/{id}', 'Admin\PostController@delete')->name('post.delete');
    });
});
