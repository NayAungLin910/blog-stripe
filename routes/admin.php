<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Writer\PostController as WriterPostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WriterController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin', 
    'middleware' => ['isAdmin', 'auth'], 
    'as' => 'admin.'
], function () {

    Route::get('/dashboard', DashboardController::class)->name('index');
    
    // Users
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    // Writers
    Route::group(['prefix' => 'writers', 'as' => 'writers.'], function () {
        Route::get('/', [WriterController::class, 'index'])->name('index');
    });

    // Posts
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/', [PostController::class, 'index'])->name('index');
        ROute::get('/writer', [WriterPostController::class, 'index'])->name('writer');
    });

    // Tags
    Route::resource('tags', TagController::class);
});
