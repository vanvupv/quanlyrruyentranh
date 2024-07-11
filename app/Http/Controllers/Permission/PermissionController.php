<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//
use Validator;

class PermissionController extends Controller
{
    /*
     *
     *
     * */
    public function viewRoles() {
        $roleList = DB::table('roles')->get();

        return view('permission.role',
            ['roleLists' => $roleList]
        );
    }

    /*
     *
     *
     * */
    public function create() {
        $permissions = Permission::pluck('name','id')->all();
        $users = User::pluck('name','id')->all();

        return view('permission.themrole', [
            'title' => 'Them quyen',
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    /*
     *
     *
     * */
    public function store() {
        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:50|unique:"'.Role::class.'",role_name',
            'slug' => 'required|regex:/(^([0-9A-Za-z\._\-]+)$)/|unique:"'.Role::class.'",role_slug|string|max:50|min:3',
        ], [
            'name.unique' => 'Ten vai tro da ton tai',
            'slug.regex' => 'Slug sai định dạng',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $role = [
            'role_name' => $data['name'],
            'role_slug' => $data['slug'],
        ];

        $role = Role::create($role);

        $permission = $data['permission'] ?? [];
        $administrators = $data['administrators'] ?? [];

        //Insert permission
        if ($permission) {
            $role->permissions()->attach($permission);
        }
        //Insert administrators
        if ($administrators) {
            $role->administrators()->attach($administrators);
        }

        return redirect()->back()->with('success', 'Them moi vai tro thanh cong');
    }

    /*
     *
     *
     * */
    public function edit($id) {
        $role = Role::find($id);

        $permission = Permission::pluck('name', 'id')->all();
        $user = User::pluck('name', 'id')->all();

        return view('permission.capnhatrole', [
            'title' => 'Cap nhat quyen',
            'role' => $role,
            'permission' => $permission,
            'userList' => $user,
        ]);
    }

    /*
     *
     *
     * */
    public function postedit($id) {
        $role = Role::find($id);

        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:50|unique:"'.Role::class.'",role_name,' . $role->id,
            'slug' => 'required|regex:/(^([0-9A-Za-z\._\-]+)$)/|unique:"'.Role::class.'",role_slug,' . $role->id . '|string|max:50|min:3',
        ], [
            'name.unique' => 'Ten vai tro da ton tai',
            'slug.max' => 'Ten vai tro da ton tai',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataUpdate = [
            'role_name' => $data['name'],
            'role_slug' => $data['slug'],
        ];

        $role->update($dataUpdate);

        $permission = $data['permission'] ?? [];
        $administrators = $data['administrators'] ?? [];
        $role->permissions()->detach();
        $role->administrators()->detach();

        //Insert permission
        if ($permission) {
            $role->permissions()->attach($permission);
        }
        //Insert administrators
        if ($administrators) {
            $role->administrators()->attach($administrators);
        }

        return redirect()->back()->with('success', 'Cap nhat vai tro thanh cong');
    }

    /*
     *
     *
     * */
    public function viewPermission() {
        $permissions = Permission::all();

        return view('permission.permission',
            [
                'title' => 'Danh sách Quyền',
                'permissions' => $permissions,
            ]
        );
    }

    /*
     *
     *
     * */
    public function addPermission() {
        $route = Route::all();

        return view('permission.thempermission', [
            'title' => 'Them Quyen',
            'route' => $route,
        ]);
    }

    /*
     *
     *
     * */
    public function storePermission() {
        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:50|unique:"'.Permission::class.'",name',
            'slug' => 'required|regex:/(^([0-9A-Za-z\._\-]+)$)/|unique:"'.Permission::class.'",slug|string|max:50|min:3',
        ], [
            'slug.regex' => 'Slug sai định dạng',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $dataCreate = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'http_uri' => implode(',', ($data['http_uri'] ?? [])),
        ];

        $permission = Permission::create($dataCreate);

        return redirect()->back()->with('success', 'Them quyen thanh cong');
    }

    /*
     *
     *
     * */
    public function editPermission($id) {
        $permission = Permission::find($id);

        $routes = Route::all();

        return view('permission.capnhatpermission', [
           'title' => 'Cập nhật quyền',
           'permission' => $permission,
            'routeAdmin' => $routes,
        ]);
    }

    /*
     *
     *
     * */
    public function editPostPermission($id) {
        $permission = Permission::find($id);
        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'name' => 'required|string|max:50|unique:"'.Permission::class.'",name,' . $permission->id,
            'slug' => 'required|regex:/(^([0-9A-Za-z\._\-]+)$)/|unique:"'.Permission::class.'",slug,' . $permission->id . '|string|max:50|min:3',
        ], [
            'slug.regex' => 'Slug không đúng định dạng',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //Edit

        $dataUpdate = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'http_uri' => implode(',', ($data['http_uri'] ?? [])),
        ];

        $permission->update($dataUpdate);

        return redirect()->back()->with('success', 'Cap nhat quyen thanh cong');
    }

    /*
     *
     *
     * */
    public function routeIndex () {
        // Hien thị danh sách các roles
        $routeList = DB::table('routes')->get();

        return view('permission.routes',
            [
                'routeList' => $routeList,
            ]
        );
    }

    /*
     *
     *
     * */
    public function routeCreate() {


        return view('permission.themroute', [
            'title' => 'Them duong dan',
        ]);
    }

    /*
     *
     *
     * */
    public function routeStore(Request $request) {
        $data = $request->all();

        $rule = [
            'name' => 'required|string|unique:routes,route_name',
            'slug' => 'nullable|string|max:255',
        ];

        $messages = [
            'name.unique' => 'Ten duong dan da ton tai',
            'slug.max' => 'Ten mo ta duong dan da qua dai',
        ];

        $validate = Validator::make($data, $rule, $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput($data);
        }

        $route = [
            'route_name' => $data['name'],
            'route_title' => $data['slug'],
        ];

        DB::table('routes')->insert($route);

        return redirect()->back()->with('success', 'Them moi duong dan thanh cong');
    }

    /*
     *
     *
     * */
    public function routeEdit($id) {
        $route = DB::table('routes')->where('id', $id)->first();

        return view('permission.capnhatroute', [
            'title' => 'Cap nhat duong dan',
            'data' => $route,
        ]);
    }

    /*
     *
     *
     * */
    public function routePostEdit($id, Request $request) {
        $route = DB::table('routes')->where('id', $id);

        $data = $request->all();

        $rule = [
            'name' => 'required|string|unique:routes,route_name,'. $id,
            'slug' => 'nullable|string|max:255',
        ];

        $messages = [
            'name.unique' => 'Ten duong dan da ton tai',
            'slug.max' => 'Ten mo ta da qua dai',
        ];

        $validate = Validator::make($data, $rule, $messages);

        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput($data)->with('error', 'Duong dan da ton tai');
        }

        $routeArr = [
            'route_name' => $data['name'],
            'route_title' => $data['slug'],
        ];

        $route->update($routeArr);

        return redirect()->back()->with('success', 'Cap nhat duong dan thanh cong');
    }

    /*
     *
     *
     * */
    public function viewUsers() {
        $user = User::with(['roles','permissions'])->get();

        return view('admin.nguoidung.danhsachnguoidung', [
            'title' => 'Danh sách người dùng',
            'data' => $user,
        ]);
    }

    /*
     *
     *
     * */
    public function userAdd() {
        $permission = DB::table('permission')->get();
        $role = DB::table('roles')->get();

        return view('admin.nguoidung.themuser', [
            'title' => 'Thêm mới người dùng',
            'dataPermissions' => $permission,
            'dataRoles' => $role,
        ]);
    }

    /*
     *
     *
     * */
    public function userStore() {
        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'username' => 'required|regex:/(^([0-9A-Za-z@\._]+)$)/|unique:"'.User::class.'",name|string|max:100|min:3',
            'password' => 'required|string|max:60|min:6|confirmed',
            'email'    => 'required|string|email|max:255|unique:"'.User::class.'",email',
        ], [
            'username.regex' => 'Tai khoan khong dung dinh dang',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $dataCreate = [
            'name' => strtolower($data['username']),
            'email'    => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ];

        $user = User::create($dataCreate);

        $roles = $data['roles'] ?? [];
        $permission = $data['permission'] ?? [];

        //Process role special
//        if (in_array(1, $roles)) {
//            // If group admin
//            $roles = [1];
//            $permission = [];
//        } elseif (in_array(2, $roles)) {
//            // If group onlyview
//            $roles = [2];
//            $permission = [];
//        }
        //End process role special

        //Insert roles
        if ($roles) {
            $user->roles()->attach($roles);
        }
        //Insert permission
        if ($permission) {
            $user->permissions()->attach($permission);
        }

        return redirect()->back()->with('success', 'Them Nguoi Dung Thanh Cong');
    }

    /*
     *
     *
     * */
    public function userEdit($id) {
        $user = User::find($id);

        $permission = DB::table('permission')->pluck('name', 'id');
        $role = DB::table('roles')->pluck('role_name', 'id');

        return view('admin.nguoidung.capnhatuser', [
            'title' => 'Cập nhật người dùng',
            'user' => $user,
            'permissions' => $permission,
            'roles' => $role,
        ]);
    }

    /*
     *
     *
     * */
    public function userPostEdit($id) {
        $user = User::find($id);

        $data = request()->all();
        $dataOrigin = request()->all();

        $validator = Validator::make($dataOrigin, [
            'username' => 'required|regex:/(^([0-9A-Za-z@\._]+)$)/|unique:"'.User::class.'",name,'. $user->id . '|string|max:100|min:3',
            'password' => 'nullable|string|max:60|min:6|confirmed',
            'email'    => 'required|string|email|max:255|unique:"'.User::class.'",email,'. $user->id,
        ], [
            'username.regex' => 'Tai khoan khong dung dinh dang',
        ]);

        if ($validator->fails()) {

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $dataUpdate = [
            'name' => strtolower($data['username']),
            'email'    => strtolower($data['email']),
        ];

        if ($data['password']) {
            $dataUpdate['password'] = bcrypt($data['password']);
        }

        $user->update($dataUpdate);

        if (!in_array($user->id, [0])) {
            $roles = $data['roles'] ?? [];
            $permission = $data['permission'] ?? [];
            $user->roles()->detach();
            $user->permissions()->detach();
            //Insert roles
            if ($roles) {
                $user->roles()->attach($roles);
            }
            //Insert permission
            if ($permission) {
                $user->permissions()->attach($permission);
            }
        }

        return redirect()->back()->with('success', 'Cap Nhat Nguoi Dung Thanh Cong');
    }
}

