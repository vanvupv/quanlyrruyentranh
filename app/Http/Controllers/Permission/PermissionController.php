<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    /*
     *
     *
     * */
    public function viewRoles(Request $request) {
        $roleList = DB::table('roles')->get();

        return view('permission.role',
            ['roleLists' => $roleList]
        );
    }

    /*
     *
     *
     * */
    public function viewSetting(Request $request) {
        $id = $request->id;

        // Hien thị danh sách các roles
        $roleList = DB::table('routes')->get();

        $permissionList = DB::table('permission')
            ->where('role_id', $request->id)
            ->get();

        $list = [];
        foreach ($roleList as $item) {
            $status = 0;
            foreach ($permissionList as $item2) {
                if ($item2->route_id == $item->id) {
                    $status = $item2->status;
                    break;
                }
            }

            $list[] = [
                'route_id'      => $item->id,
                'route_title'   => $item->route_title,
                'route_name'    => $item->route_name,
                'status'        => $status,
            ];
        }

        return view('permission.setting',
            [
                'permissionList' => $list,
                'role_id' => $id,
                ]
        );
    }

    /*
     *
     *
     * */
    public function save(Request $request) {
        $status = $request->status;
        $role_id = $request->role_id;
        $route_id = $request->route_id;

// Trong controller hoặc nơi bạn đang sử dụng Log::info()
//        Log::info('Request Data:', $request->all());

        if ($role_id && $route_id) {
            $data = DB::table('permission')
                ->where('route_id', $route_id)
                ->where('role_id', $role_id)
                ->get();
        } else {
            $data = [];
        }

        if ($data != null && count($data) > 0) {
            // update
            DB::table('permission')
                ->where('route_id', $route_id)
                ->where('role_id', $role_id)
                ->update([
                'status' => $status,
            ]);
        } else {
            //insert
            DB::table('permission')->insert([
                'route_id' => $route_id,
                'role_id' => $role_id,
                'status' => $status,
            ]);
        }
    }
}

