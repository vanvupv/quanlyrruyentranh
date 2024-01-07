<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
//        dd('trang chu');
        return view('login', [
            'title'=>'Trang đăng nhập'
        ]);
    }
    public function store(Request $request){
//        dd('login'); --> Lỗi do hàm validate()
        $this->validate($request, [
            'username' => 'required|email:filter',
            'password' => 'required',
        ], [
            'username.required' => 'Email không được để trống.',
            'username.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

//        dd($request); --> Lỗi do hàm validate() --> dd($request) không chạy
        if(Auth::attempt([
            'email'=>$request->input('username'),
            'password'=>$request->input('password')
        ])) {
            $user = Auth::user();
//            dd($user);
            //echo "đăng nhập thành công";
            return redirect()->route('home');
        } else {
//            dd('Debug: Session flash error is set.'); --> Lỗi do hàm validate() --> Đã chạy
            Session()->flash('error','Tên đăng nhập hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }
}
