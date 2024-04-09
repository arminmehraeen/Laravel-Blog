<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::resource('posts',\App\Http\Controllers\PostController::class);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::post('/upload',[\App\Http\Controllers\UploadController::class,'store']) ;

    Route::resource('commends',\App\Http\Controllers\CommendController::class);
    Route::resource('users',\App\Http\Controllers\UserController::class);
});
