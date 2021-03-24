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

# get("URL" => "コントローラー＠アクション")
# laravel8.xではルーティングを上からしっかり書かなければならない。

Auth::routes();
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('articles.index');
Route::resource('/articles', 'App\Http\Controllers\ArticleController')->except(['index','show'])->middleware('auth');
Route::resource('/articles', 'App\Http\Controllers\ArticleController')->only('show');
Route::get('/users/{name}', 'App\Http\Controllers\UserController@show')->name('users.show');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});
