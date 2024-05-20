<?php

namespace App\Http\Controllers;

use App\Models\Loaisanpham;
use App\Models\Sanpham;

class HomeController extends Controller
{
    //
    public function index() {
        $sanphams = Sanpham::all();
        $loaisanphams = Loaisanpham::all();

        $sanphammois = Sanpham::orderBy('created_at', 'desc')->get();

        return view('home', [
            'sanphams' => $sanphams,
            'loaisanphams' => $loaisanphams,
            'sanphammois' => $sanphammois,
        ]);
    }
}
