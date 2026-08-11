<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'AdminMiddleware'])->prefix('admin')->group(function () {
    // Mange login page
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('admin.login.index');
        Route::post('/login', 'login')->name('admin.login.post');
    });

    // dashboard routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard.view');
        Route::get('/logout', 'logout')->name('admin.logout');
    });
});
