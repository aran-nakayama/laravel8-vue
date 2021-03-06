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

Route::prefix('/articles')->name('article.')->group(function(){
    Route::put('/{article}/like', 'App\Http\Controllers\ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like', 'App\Http\Controllers\ArticleController@unlike')->name('unlike')->middleware('auth');
});


Route::get('/user', function (Request $request) {
    return [0,'a'];
});

