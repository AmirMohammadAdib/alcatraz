<?php

use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PlayerController;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Financial\DepoceitController;
use App\Http\Controllers\Admin\Financial\WithdrawController;
use Illuminate\Support\Facades\Route;

// Group routes under the 'admin' prefix
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    // Group routes under the 'admin/auth' prefix
    Route::group(['prefix' => 'auth'], function(){
        
        // Define resource routes for 'player' which will map to PlayerController
        Route::resource('player', PlayerController::class);
        
        // Define resource routes for 'admin' which will map to AdminController
        Route::resource('admin', AdminController::class);
        
        // Define resource routes for 'role' which will map to RoleController
        Route::resource('role', RoleController::class);
    });

    // Group routes under the 'admin/financial' prefix
    Route::group(['prefix' => 'financial'], function(){
        
        // Define resource routes for 'depoceit' which will map to DepoceitController
        Route::resource('depoceit', DepoceitController::class);
        
        // Define resource routes for 'withdraw' which will map to WithdrawController
        Route::resource('withdraw', WithdrawController::class);
    });
});
