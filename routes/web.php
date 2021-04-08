<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;




Route::get('/', 'App\Http\Controllers\PostsController@index')->name('home');

Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');

Route::get('/posts', 'App\Http\Controllers\PostsController@index');

Route::post('/posts/store', 'App\Http\Controllers\PostsController@store');


Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');

Route::get('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@index');

Route::post('/posts/{post}/comments', 'App\Http\Controllers\CommentsController@store');

Route::get('/register', 'App\Http\Controllers\RegistrationController@create');
Route::Post('/register', 'App\Http\Controllers\RegistrationController@store');


Route::get('/login', 'App\Http\Controllers\SessionsController@create');
Route::Post('/check', 'App\Http\Controllers\SessionsController@store');




Route::get('/logout', 'App\Http\Controllers\SessionsController@destroy');

Route::get('/upload','App\Http\Controllers\PostsController@upload');
Route::post('/upload','App\Http\Controllers\PostsController@store');
















