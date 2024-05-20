<?php

namespace App\Http\Controllers\Admin\khachhang;

use App\Http\Controllers\Controller;
use App\Models\Khachhang;
use Illuminate\Http\Request;

class KhachhangController extends Controller
{
    //
    public function index() {
        $customers = Khachhang::all();

        return view('admin.khachhang.danhsachkhachhang',[
            'khachhangs' => $customers,
        ]);
    }

    public function edit($id) {

    }
}
