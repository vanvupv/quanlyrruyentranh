<?php

namespace App\Http\Controllers\Admin\donhang;

use App\Http\Controllers\Controller;
use App\Models\Chitietdonhang;
use App\Models\Donhang;
use Illuminate\Http\Request;

class DonhangController extends Controller
{
    //
    public function index () {
        $donhangs = Donhang::all();

        return view('admin.donhang.danhsachdonhang',[
            'donhangs' => $donhangs,
        ]);
    }

    public function detail($id) {
        $order = Donhang::with('khachhang','nhanvien')->where('id', $id)->first();
        $detailOrder = Chitietdonhang::with('donhang', 'sanpham')->where('madonhang', $id)->get();

        return view('admin.donhang.chitietdonhang', [
            'detailOrder' => $detailOrder,
            'order' => $order,
        ]);
    }

    public function edit($id) {
        return view('a');
    }
}
