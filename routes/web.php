<?php

use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Account\OrderController as AccountOrderController;
use App\Http\Controllers\Admin\Account\RequestController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PlayerController;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Financial\DepoceitController;
use App\Http\Controllers\Admin\Financial\WithdrawController;
use App\Http\Controllers\Admin\Shop\CPController;
use App\Http\Controllers\Admin\Shop\OrderController;
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

    // Group routes under the 'admin/shop' prefix
    Route::group(['prefix' => 'shop'], function(){
        // Define resource routes for 'cp' which will map to CPController
        Route::resource('cp', CPController::class);
        
        // Define resource routes for 'order' which will map to OrderController
        Route::resource('order', OrderController::class);
    });


    // Group routes under the 'admin/account' prefix
    Route::group(['prefix' => 'account'], function(){
        // Define resource routes for 'request' which will map to RequestController
        Route::resource('request', RequestController::class);
        
        // Define resource routes for 'order' which will map to AccountOrderController
        Route::resource('order-account', AccountOrderController::class);

        // Define resource routes for 'account' which will map to AccountController
        Route::resource('account', AccountController::class);
    });
});
