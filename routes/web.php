<?php

use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Account\GalleryController;
use App\Http\Controllers\Admin\Account\GunController;
use App\Http\Controllers\Admin\Account\OrderController as AccountOrderController;
use App\Http\Controllers\Admin\Account\RequestController;
use App\Http\Controllers\Admin\Auth\AdminController;
use App\Http\Controllers\Admin\Auth\PlayerController;
use App\Http\Controllers\Admin\Auth\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Financial\DepoceitController;
use App\Http\Controllers\Admin\Financial\WithdrawController;
use App\Http\Controllers\Admin\Match\PlayerController as MatchPlayerController;
use App\Http\Controllers\Admin\Match\RoomController;
use App\Http\Controllers\Admin\Shop\CPController;
use App\Http\Controllers\Admin\Shop\OrderController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginOtpController;
use App\Http\Controllers\Auth\LoginPassController;
use App\Http\Controllers\Main\AccountController as MainAccountController;
use App\Http\Controllers\Main\CPController as MainCPController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\ProfileController;
use App\Http\Controllers\Main\RoomController as MainRoomController;
use App\Http\Controllers\Main\WalletController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

auth()->loginUsingId(1);
date_default_timezone_set('Iran');

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
        Route::resource('account-order', AccountOrderController::class);

        // Define resource routes for 'account' which will map to AccountController
        Route::resource('account', AccountController::class);


        // Define resource routes for 'gun' which will map to GunController
        Route::resource('gun', GunController::class);


        // Define resource routes for 'gallery' which will map to GalleryController
        Route::resource('gallery', GalleryController::class);
    });

    // Group routes under the 'admin/match' prefix
    Route::group(['prefix' => 'match'], function(){
        // Define resource routes for 'request' which will map to RoomController
        Route::resource('room', RoomController::class);
        
        // Define resource routes for 'player' which will map to MatchPlayerController
        Route::resource('room-player', MatchPlayerController::class);
    });


    // Group routes under the 'admin/ticket' prefix
    Route::group(['prefix' => 'ticket'], function(){
        // Define resource routes for '/' which will map to TicketController
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    });
});


// Index or Main pages that run on IndexController
Route::get('/', [IndexController::class, 'index'])->name('app.index');
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('app.contact-us');
Route::post('/contact-us', [IndexController::class, 'contactUsStore'])->name('app.contact-us.store');

Route::get('/question', [IndexController::class, 'question'])->name('app.question');
Route::get('/notification', [IndexController::class, 'notification'])->name('app.notification');
Route::get('/stars', [IndexController::class, 'stars'])->name('app.stars');

// Profile pages that run on ProfileController
Route::get('/profile', [ProfileController::class, 'profileView'])->name('profile.view');
Route::post('/set-email-pass/{account}', [ProfileController::class, 'setEmailPass'])->name('set-email-pass');
Route::get('/update-profile', [ProfileController::class, 'profileUpdateView'])->name('profile.update.view');
Route::put('/update-profile', [ProfileController::class, 'profileUpdateUpdate'])->name('profile.update.update');


// Wallet pages that run on WalletController
Route::get('/wallet', [WalletController::class, 'walletView'])->name('wallet.view');
Route::post('/wallet/withdraw', [WalletController::class, 'withdraw'])->name('wallet.withdraw');
Route::post('/wallet/deposite', [WalletController::class, 'deposite'])->name('wallet.deposite');
Route::post('/wallet/transport', [WalletController::class, 'transport'])->name('wallet.transport');


// Room pages that run on MainRoomController
Route::get('/rooms', [MainRoomController::class, 'roomsView'])->name('rooms.view');
Route::get('/room/{room}', [MainRoomController::class, 'roomView'])->name('room.view');
 

// ShopCP pages that run on MainCPController
Route::get('/shop/cp', [MainCPController::class, 'shopView'])->name('shop.shop.view');
Route::get('/shop/cp/{cp}', [MainCPController::class, 'cpView'])->name('shop.cp.view');


// Shop account pages that run on MainAccountController
Route::get('/shop/account', [MainAccountController::class, 'shopView'])->name('shop.accounts.view');
Route::get('/shop/account/{account}', [MainAccountController::class, 'accountView'])->name('shop.account.view');
Route::get('/account-request', [MainAccountController::class, 'accountRequestView'])->name('account.request.view');


Route::prefix('auth')->group(function(){
    Route::get('/login-otp', [LoginOtpController::class, 'view'])->name('login.otp.view');
    Route::post('/login-otp', [LoginOtpController::class, 'store'])->name('login.otp.store');
    Route::get('/login-resend-otp/{token}', [LoginOtpController::class, 'loginResendOtp'])->name('login.otp.resend');

    Route::get('/login-confirm/{token}', [LoginOtpController::class, 'confirmView'])->name('confirm.view');
    Route::post('/login-confirm/{token}', [LoginOtpController::class, 'confirmStore'])->name('confirm.store');
    Route::get('/login-pass', [LoginPassController::class, 'view'])->name('login.pass.view');
    Route::post('/login-pass', [LoginPassController::class, 'store'])->name('login.pass.store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});