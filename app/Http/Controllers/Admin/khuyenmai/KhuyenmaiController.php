<?php

namespace App\Http\Controllers\Admin\khuyenmai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
use App\Models\Khuyenmai;

class KhuyenmaiController extends Controller
{
    //
    public function index() {
        $khuyenmais = Khuyenmai::all();

        return view('admin.khuyenmai.danhsachkhuyenmai',[
            'khuyenmais' => $khuyenmais,
        ]);
    }

    public function edit($id) {

    }
}
