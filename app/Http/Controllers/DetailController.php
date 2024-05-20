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

        $sanpham = Sanpham::join('Loaisanpham', 'sanphams.MaLoaiSP', '=', 'Loaisanpham.MaLoaiSP')
            ->select('sanphams.*', 'Loaisanpham.TenLoai')
            ->where('id', $detail)->first();

        $product1Type = $sanpham->MaLoaiSP;

        $relatedProducts = Sanpham::join('Loaisanpham', 'sanphams.MaLoaiSP', '=', 'Loaisanpham.MaLoaiSP')
            ->select('sanphams.*', 'Loaisanpham.TenLoai')
            ->where('sanphams.MaLoaiSP', $product1Type) // Chỉ định rõ trường MaLoaiSP đến từ bảng sanphams
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

