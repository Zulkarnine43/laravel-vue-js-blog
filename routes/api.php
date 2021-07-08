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

 //Category

Route::post('/add-category','CategoryController@add_category');
Route::get('/category','CategoryController@all_category');
Route::delete('/category/{id}','CategoryController@delete_category');
Route::get('/editcategory/{id}','CategoryController@edit_category');
Route::post('/update-category/{id}','CategoryController@update_category');

//Post
Route::get('/post','PostController@all_Post');
Route::post('/savepost','PostController@save_post');
Route::delete('/delete/{id}','PostController@delete_post');
Route::get('/post/{id}','PostController@edit_post');
Route::post('/update/{id}','PostController@update_post');

//Blog
Route::get('/blogpost','BlogController@get_all_blog_post');
Route::get('/singlepost/{id}','BlogController@getpost_by_id');
Route::get('/categories','BlogController@get_all_category');
Route::get('/categorypost/{id}','BlogController@get_all_post_by_cat_id');
Route::get('/search','BlogController@search_post');
Route::get('/latestpost','BlogController@latest_post');

//Products
Route::post('/products','productController@add_product_db');
Route::get('/products','productController@view');
Route::delete('/products/{id}','productController@destroy');


