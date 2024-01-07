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
        //
//        $sanpham = Sanpham::where('IDSanPham', $detail)->first();
        $img_sanphams = Anh::where('IDSanPham', $detail)->get();

        //


//        dd($relatedProducts);
        $sanpham = Sanpham::join('Loaisanpham', 'sanphams.MaLoaiSP', '=', 'Loaisanpham.MaLoaiSP')
            ->select('sanphams.*', 'Loaisanpham.TenLoai')
            ->where('IDSanPham', $detail)->first();;

//        dd($products);

        $product1Type = $sanpham->MaLoaiSP;

        $relatedProducts = Sanpham::join('Loaisanpham', 'sanphams.MaLoaiSP', '=', 'Loaisanpham.MaLoaiSP')
            ->select('sanphams.*', 'Loaisanpham.TenLoai')
            ->where('sanphams.MaLoaiSP', $product1Type) // Chỉ định rõ trường MaLoaiSP đến từ bảng sanphams
            ->where('sanphams.IDSanPham', '!=', $detail)
            ->get();

//        dd($relatedProducts);

        //
        return view('detail',
            ['sanpham' => $sanpham,
                'img_sanphams' => $img_sanphams,
                'relatedProducts' => $relatedProducts,
            ]
        );
    }
}

