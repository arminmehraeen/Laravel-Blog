<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CommendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::middleware('auth:sanctum')->group( function () {

    Route::get('/user', [LoginRegisterController::class, 'user']);
    Route::post('/logout', [LoginRegisterController::class, 'logout']);
    Route::post('/upload',[UploadController::class,'store']) ;

    Route::apiResource('posts', PostController::class) ;
    Route::apiResource('commends', CommendController::class);
});
