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

// ragruppo tutto per api 
Route::namespace('Api')->group(function(){
    // routes relative ai post 
    Route::get('/posts','PostController@index');
    Route::get('/post/{slug}','PostController@show');

    //routes relative all'email
    Route::post('/contacts', 'ContactController@store');
});




