<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

class Permission
{
    /**
     * Check permission.
     *
     * @param $permission
     *
     * @return true
     */
    public static function check($permission)
    {
        if (static::isAdministrator()) {
            return true;
        }

        if (is_array($permission)) {
            collect($permission)->each(function ($permission) {
                call_user_func([Permission::class, 'check'], $permission);
            });

            return;
        }

        if (Auth::user()->cannot($permission)) {
            return static::error();
        }
    }

    /**
     * Roles allowed to access.
     *
     * @param $roles
     *
     * @return true
     */
    public static function allow($roles)
    {
        if (static::isAdministrator()) {
            return true;
        }

        if (!Auth::user()->inRoles($roles)) {
            return static::error();
        }
    }

    /**
     * Roles denied to access.
     *
     * @param $roles
     *
     * @return true
     */
    public static function deny($roles)
    {
        if (static::isAdministrator()) {
            return true;
        }

        if (Auth::user()->inRoles($roles)) {
            return static::error();
        }
    }

    /**
     * If current user is administrator.
     *
     * @return mixed
     */
    public static function isAdministrator()
    {
        return Auth::user()->isRole('administrator');
    }

    public static function error()
    {
        $uriCurrent = request()->fullUrl();
        $methodCurrent = request()->method();
        if (strtoupper($methodCurrent) === 'GET') {
            return redirect()->route('admin.deny')->with(['method' => $methodCurrent, 'url' => $uriCurrent]);
        } else {
            return response()->json([
                'error' => '1',
                'msg' => "Lỗi xảy ra",
                'detail' => [
                    'method' => $methodCurrent,
                    'url' => $uriCurrent
                ]
            ]);
        }
    }
}
