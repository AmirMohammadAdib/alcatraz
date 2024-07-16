<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PlayerController;
use App\Http\Controllers\Admin\Auth\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Route::group(['prefix' => 'auth'], function(){
        Route::resource('player', [PlayerController::class]);
        Route::resource('admin', [AdminController::class]);
        Route::resource('role', [RoleController::class]);
    });
});