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
Route::get('/', 'App\Http\Controllers\ArticleController@index');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
