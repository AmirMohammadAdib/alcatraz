<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PlayerController;
use App\Http\Controllers\Admin\Auth\RoleController;
use Illuminate\Support\Facades\Route;

// Group routes under the 'admin' prefix
Route::group(['prefix' => 'admin'], function(){
    
    // Group routes under the 'admin/auth' prefix
    Route::group(['prefix' => 'auth'], function(){
        
        // Define resource routes for 'player' which will map to PlayerController
        Route::resource('player', [PlayerController::class]);
        
        // Define resource routes for 'admin' which will map to AdminController
        Route::resource('admin', [AdminController::class]);
        
        // Define resource routes for 'role' which will map to RoleController
        Route::resource('role', [RoleController::class]);
    });
});
