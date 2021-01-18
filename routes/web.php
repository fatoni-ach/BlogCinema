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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/auth', 'HomeController@index');
Auth::routes();

Route::get('admin/login', 'AdminController@login')->name('login');
Route::get('/', 'HomeController@home')->name('home');
Route::post('admin/login', 'AdminController@login')->name('login');
Route::get('admin/login', 'AdminController@login')->name('login');

Route::get('admin/signup', 'AdminController@signup')->name('signup');
Route::post('admin/signup', 'AdminController@signup')->name('signup');


Route::middleware('auth')->group(function ()
{
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/logout', 'AdminController@logout')->name('logout');
    Route::get('blog', 'BlogController@blog')->name('blog');
    Route::get('blog/create', 'BlogController@create')->name('blog.create');
    Route::post('blog/create', 'BlogController@create');
    Route::get('blog/{post:slug}', 'BlogController@show')->name('show');
    Route::get('blog/{post:slug}/edit', 'BlogController@edit_post')->name('edit');
    Route::patch('blog/{post:slug}/edit', 'BlogController@edit_post');
    Route::get('blog/{post:slug}/delete-post', 'BlogController@delete_post')->name('delete');

    Route::post('blog/{post:slug}', 'BlogController@save_link');
    Route::get('blog/link-delete/{link_download:slug}', 'BlogController@link_delete')->name('link.delete');

    Route::get('categorie', 'CategorieController@categorie')->name('categorie');
    Route::post('categorie', 'CategorieController@categorie')->name('categorie');
    Route::get('categorie/{categories:slug}/delete', 'CategorieController@delete')->name('categorie.delete');
    Route::get('categorie/{categorie:slug}/edit', 'CategorieController@edit')->name('categorie.edit');
    Route::post('categorie/{categorie:slug}/edit', 'CategorieController@edit')->name('categorie.edit');

});

