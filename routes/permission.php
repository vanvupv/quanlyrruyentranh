<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permission\PermissionController;

Route::group(['prefix' => 'admin/permission'],

    function () {
        // Role
        Route::get('/role',
            [PermissionController::class,'viewRoles']
        )->name('permission_role');

        // Role Setting
        Route::get('/setting',
            [PermissionController::class,'viewSetting']
        )->name('permission_setting');

        // Role Save
        Route::post('/save',
            [PermissionController::class,'save']
        )->name('permission_save');
    }
);
