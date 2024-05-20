<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index() {
        return view('login', [
            'title'=>'Trang đăng nhập'
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required|email:filter',
            'password' => 'required',
        ], [
            'username.required' => 'Email không được để trống.',
            'username.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

        if(Auth::attempt([
            'email'=>$request->input('username'),
            'password'=>$request->input('password')
        ])) {
            $user = Auth::user();

            return redirect()->route('home');
        } else {
            Session()->flash('error','Tên đăng nhập hoặc mật khẩu không chính xác');
            return redirect()->back();
        }
    }
}
