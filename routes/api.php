<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;
use App\Http\Controllers;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

    
});

Route::get('/test','App\Http\Controllers\Api\TestApiController@index' )->name('home');

Route::get('/posts/{id}', 'App\Http\Controllers\Api\TestApiController@show')->name('showpost');
Route::post('/posts/store', 'App\Http\Controllers\Api\TestApiController@store')->name('storepost');

Route::put('/posts/{id}','App\Http\Controllers\Api\TestApiController@update')->name('updatepost');
Route::delete('/posts/{id}','App\Http\Controllers\Api\TestApiController@delete')->name('deletepost');

