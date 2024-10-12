<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;

class DetailController extends Controller
{
    /*
     *
     *
     * */
    public function viewDetail($detail) {

        $sanpham = Sanpham::join('loaisanpham', 'sanpham.matheloai', '=', 'loaisanpham.id')
            ->select('sanpham.*', 'loaisanpham.tenloai')
            ->where('sanpham.id', $detail)->first();

        $product1Type = $sanpham->matheloai;

        $relatedProducts = Sanpham::join('loaisanpham', 'sanpham.matheloai', '=', 'loaisanpham.id')
            ->select('sanpham.*', 'loaisanpham.tenloai')
            ->where('sanpham.matheloai', $product1Type) // Chỉ định rõ trường MaLoaiSP đến từ bảng sanpham
            ->where('sanpham.id', '!=', $detail)
            ->get();

        return view('detail', [
                'sanpham' => $sanpham,
                'relatedProducts' => $relatedProducts,
            ]
        );
    }
}


