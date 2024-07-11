<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permission\PermissionController;

Route::group(['prefix' => 'admin/permission'],

    function () {
        // Role
        Route::get('/role',
            [PermissionController::class,'viewRoles']
        )->name('permission_role');

        // Role Add
        Route::get('/role/add',
            [PermissionController::class,'create']
        )->name('permission_role.add');

        // Role Add Store
        Route::post('/role/add/store',
            [PermissionController::class,'store']
        )->name('permission_role.store');

        // Role Edit
        Route::get('/role/edit/{id}',
            [PermissionController::class,'edit']
        )->name('permission_role.edit');

        // Role Post Edit
        Route::post('/role/edit/{id}',
            [PermissionController::class,'postedit']
        )->name('permission_role.postedit');

        // Permission
        Route::get('/',
            [PermissionController::class,'viewPermission']
        )->name('permission');

        // Permission Add
        Route::get('/add',
            [PermissionController::class,'addPermission']
        )->name('permission.add');

        // Permission Add Store
        Route::post('/add/store',
            [PermissionController::class,'storePermission']
        )->name('permission.store');

        // Permission Edit
        Route::get('/edit/{id}',
            [PermissionController::class,'editPermission']
        )->name('permission.edit');

        // Permission Post Edit
        Route::post('/edit/{id}',
            [PermissionController::class,'editPostPermission']
        )->name('permission.postedit');

        // Route
        Route::get('/route',
            [PermissionController::class,'routeIndex']
        )->name('permission_route');

        // Route Add
        Route::get('/route/add',
            [PermissionController::class,'routeCreate']
        )->name('permission_route.add');

        // Role Add Store
        Route::post('/route/add/store',
            [PermissionController::class,'routeStore']
        )->name('permission_route.store');

        // Route Edit
        Route::get('/route/edit/{id}',
            [PermissionController::class,'routeEdit']
        )->name('permission_route.edit');

        // Route Post Edit
        Route::post('/route/edit/{id}',
            [PermissionController::class,'routePostEdit']
        )->name('permission_route.postedit');

    }
);
