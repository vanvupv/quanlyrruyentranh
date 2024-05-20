<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class RegisterController extends Controller
{
    //
    public function viewRegister() {
        return view("register");
    }

    public function storeRegister(Request $request) {
        $name = $request->input('name', '');
        $username = $request->input('username', '');
        $password = $request->input('password', '');
        $re_password  = $request->input('re-password', '');

        $user = User::where('email', $username)->first();
        if ($user) {
            // Tên tài khoản đã tồn tại
            Session()->flash('error','Tên đăng nhập hoặc mật khẩu không chính xác');
            return redirect()->back();
        } else {
            // Tên tài khoản chưa tồn tại
            User::create([
                'name' => $name,
                'email' => $username,
                'password' => bcrypt($password),
                'role_id' => '3',
            ]);
            Session()->flash('success','Thêm mới tài khoản thành công! Vui lòng đăng nhập');
            return redirect('login');
        }
    }
}
