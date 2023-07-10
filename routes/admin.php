<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'isAdmin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', DashboardController::class)->name('index');
    
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        // Users
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        // Posts
        Route::get('/', [PostController::class, 'create'])->name('create');
    });
});
