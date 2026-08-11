<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\UserRoleController;
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
    // User roles and permissions routes
    Route::controller(UserRoleController::class)->group(function () {
        Route::get('/users-roles', 'index')->name('admin.users-roles.view');
        Route::get('/users-roles/create', 'create_page')->name('admin.users-roles.createPage');
        Route::post('/users-roles/create', 'create')->name('admin.users-roles.create');
        Route::post('/users-roles/status', 'change_status')->name('admin.users-roles.status');
        Route::get('/users-roles-edit/{id}', 'edit')->name('admin.users-roles.edit');
        Route::post('/users-roles-update', 'update')->name('admin.users-roles.update');
        Route::post('/users-roles-delete', 'delete')->name('admin.users-roles.delete');
    });
    // User management routes
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users.view');
        Route::get('/users/create', 'create')->name('admin.users.createPage');
        Route::post('/users/create', 'create_user')->name('admin.users.create');
        Route::get('/users-edit/{id}', 'edit')->name('admin.users.edit');
        Route::post('/users-update', 'update')->name('admin.users.update');
        Route::post('/users-delete', 'delete')->name('admin.users.delete');
        Route::post('/users-bulk-delete', 'bulkDelete')->name('admin.users.bulkDelete');
    });
});
