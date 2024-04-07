<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('post',\App\Http\Controllers\PostController::class);
Route::resource('commend',\App\Http\Controllers\CommendController::class);
Route::resource('user',\App\Http\Controllers\UserController::class);
