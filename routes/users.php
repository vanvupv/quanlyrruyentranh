<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permission\PermissionController;

Route::group(['prefix' => 'admin/user'],

    function () {
        // User
        Route::get('/',
            [PermissionController::class,'viewUsers']
        )->name('permission_user');

        // User Add
        Route::get('/add',
            [PermissionController::class,'userAdd']
        )->name('permission_user.add');

        // User Store
        Route::post('/add/store',
            [PermissionController::class,'userStore']
        )->name('permission_user.store');

        // User Edit
        Route::get('/edit/{id}',
            [PermissionController::class,'userEdit']
        )->name('permission_user.edit');

        // User Post Edit
        Route::post('/edit/{id}',
            [PermissionController::class,'userPostEdit']
        )->name('permission_user.postedit');
    }
);
