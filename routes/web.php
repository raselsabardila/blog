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

Auth::routes();

Route::get("/","BlogController@index");
Route::get("/isi/{slug}","BlogController@show")->name("blog.show");
Route::get("/list","BlogController@list")->name("blog.list");
Route::get("/listkategori/{id}","BlogController@listkategori")->name("blog.listkategori");
Route::get("/cari","BlogController@cari")->name("blog.cari");

Route::get('/home',"HomeController@index")->name("home");

Route::get("/post/recycle","PostController@tampilhapus")->name("post.recycle");

Route::delete("/post/kill/{id}","PostController@kill")->name("post.kill");

Route::get("/post/restore/{id}","PostController@restore")->name("post.restore");

Route::resource('/category','CategoryController');

Route::resource('/tag','TagController');

Route::resource('/post',"PostController");

Route::resource('/user',"UserController");


