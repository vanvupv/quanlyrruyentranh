<?php

namespace App\Http\Controllers;

use App\Models\Anh;
use App\Models\Loaisanpham;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function viewDetail($detail) {

        $sanpham = Sanpham::join('loaisanpham', 'sanphams.matheloai', '=', 'loaisanpham.id')
            ->select('sanphams.*', 'loaisanpham.tenloai')
            ->where('sanphams.id', $detail)->first();

        $product1Type = $sanpham->matheloai;

        $relatedProducts = Sanpham::join('loaisanpham', 'sanphams.matheloai', '=', 'loaisanpham.id')
            ->select('sanphams.*', 'loaisanpham.tenloai')
            ->where('sanphams.matheloai', $product1Type) // Chỉ định rõ trường MaLoaiSP đến từ bảng sanphams
            ->where('sanphams.id', '!=', $detail)
            ->get();

        //
        return view('detail', [
                'sanpham' => $sanpham,
                'relatedProducts' => $relatedProducts,
            ]
        );
    }
}

