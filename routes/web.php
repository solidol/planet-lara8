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
Route::get('/home', 'HomeController@index')->name('home.show');
Route::get('/news', 'PostCategoryController@showNews')->name('news.show');
Route::get('/blog', 'PostCategoryController@showBlog')->name('blog.show');
Route::get('/programs', 'PostCategoryController@showPrograms')->name('programs.show');
Route::get('/projects', 'PostCategoryController@showProjects')->name('projects.show');
Route::get('/sessions', 'PostCategoryController@showSessions')->name('sessions.show');

Route::get('/posts/pid:{postId}', 'PostController@show')->name('post.show');
Route::get('/posts/{postSlug}', 'PostController@showBySlug')->name('post.showbyslug');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/news', 'PostCategoryController@adminShowNews')->name('admin.news.show');
    Route::get('/admin/blog', 'PostCategoryController@adminShowBlog')->name('admin.blog.show');
    Route::get('/admin/programs', 'PostCategoryController@adminShowPrograms')->name('admin.programs.show');
    Route::get('/admin/projects', 'PostCategoryController@adminShowProjects')->name('admin.projects.show');
    Route::get('/admin/sessions', 'PostCategoryController@adminShowSessions')->name('admin.sessions.show');
    Route::get('/admin/{catId}/create', 'PostController@create')->name('admin.post.create');
    Route::get('/admin/pid:{postId}/edit', 'PostController@edit')->name('admin.post.edit');
    Route::get('/admin/pid:{postId}', 'PostController@adminShow')->name('admin.post.show');
    Route::post('/admin/pid:{postId}', 'PostController@update')->name('admin.post.update');
    Route::post('/admin/new/store', 'PostController@store')->name('admin.post.store');
});


require __DIR__.'/auth.php';
Auth::routes(['register' => false]);