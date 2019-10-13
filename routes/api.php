<?php

use Illuminate\Http\Request;

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

Route::namespace('api')->group(function(){
    Route::resource('/devs', 'UsersController');

    Route::resource('/likes', 'LikesController');
    Route::resource('/dislikes', 'DislikesController');
});
