<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
    // Menu
    Route::resource('menu', 'Api\MenuController');

    // Product
    Route::resource('product', 'Api\ProductController');
    Route::get('product-detail', 'Api\ProductController@detail')->name('product.detail');

    // Product category
    Route::get('product-category/{id}', 'Api\ProductCatController@index')->name('product-category.index');

    // Brand logo
    Route::get('brand', 'Api\BrandController@index')->name('brand.index');

    // Header
    Route::get('header', 'Api\HeaderController@index')->name('header.index');

    // Post
    Route::get('post', 'Api\PostController@index')->name('post.index');
    Route::get('post/detail', 'Api\PostController@detail')->name('post.detail');
    Route::get('post/recent', 'Api\PostController@recent')->name('post.detail');
});


