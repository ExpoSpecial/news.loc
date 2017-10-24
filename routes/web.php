<?php

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

Auth::routes();

Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');
Route::get('lists', 'Frontend\HomeController@listsMy');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/', 'Admin\AdminHomeController@show')->name('admin.home');

    Route::group(['prefix' => 'post'], function(){
        Route::get('/', 'Admin\PostsController@index')->name('admin.posts');
        Route::get('/create', 'Admin\PostsController@create')->name('admin.post.create');
        Route::post('/', 'Admin\PostsController@store')->name('admin.post.store');
        Route::get('/{name}', 'Admin\PostsController@edit')->name('admin.post.edit');
        Route::post('/{id}', 'Admin\PostsController@update')->name('admin.post.update');
        Route::delete('/{id}', 'Admin\PostsController@destroy')->name('admin.post.destroy');
        Route::post('/create', 'Admin\PostsController@create')->name('admin.post.create');
    });
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'Admin\CategoriesController@index')->name('admin.categories');
        Route::get('/create', 'Admin\CategoriesController@create')->name('admin.category.create');
        Route::post('/', 'Admin\CategoriesController@store')->name('admin.category.store');
        Route::get('/{name}', 'Admin\CategoriesController@edit')->name('admin.category.edit');
        Route::post('/{id}', 'Admin\CategoriesController@update')->name('admin.category.update');
        Route::delete('/{id}', 'Admin\CategoriesController@destroy')->name('admin.category.destroy');
        Route::post('/create', 'Admin\CategoriesController@create')->name('admin.category.create');
    });
    Route::group(['prefix' => 'tag'], function() {
        Route::get('/', 'Admin\TagsController@index')->name('admin.tags');
        Route::get('/create', 'Admin\TagsController@create')->name('admin.tag.create');
        Route::post('/', 'Admin\TagsController@store')->name('admin.tag.store');
        Route::get('/{name}', 'Admin\TagsController@edit')->name('admin.tag.edit');
        Route::post('/{id}', 'Admin\TagsController@update')->name('admin.tag.update');
        Route::delete('/{id}', 'Admin\TagsController@destroy')->name('admin.tag.destroy');
        Route::post('/create', 'Admin\TagsController@create')->name('admin.tag.create');
    });
});
