<?php

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', 'PostCategoryController@showNews')->name('news.show');
Route::get('/news', 'PostCategoryController@showNews')->name('news.show');
Route::get('/category/{catId}', 'PostCategoryController@show')->name('category.showbyslug');
Route::get('/category/{catSlug}.html', 'PostCategoryController@showBySlug')->name('category.showbyslug');
//Route::get('/news/{page}', 'PostCategoryController@show')->name('category.show');
Route::get('/blog', 'PostCategoryController@showBlog')->name('blog.show');
//Route::get('/blog/{page}', 'PostCategoryController@show')->name('category.show');
Route::get('/posts/pid:{postId}', 'PostController@show')->name('post.show');
Route::get('/posts/{postSlug}', 'PostController@showBySlug')->name('post.showbyslug');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts/{catId}/create', 'PostController@create')->name('post.create');
    Route::get('/posts/{postId}/edit', 'PostController@edit')->name('post.edit');
    Route::post('/posts/{postId}', 'PostController@update')->name('post.update');
    Route::post('/posts/new/store', 'PostController@store')->name('post.store');
});


require __DIR__.'/auth.php';
Auth::routes(['register' => false]);