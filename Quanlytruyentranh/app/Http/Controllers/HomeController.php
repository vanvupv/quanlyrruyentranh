<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    //
    public function viewHome() {
        $sanphams = DB::table('sanphams')->get();
        $loaisanphams = DB::table('loaisanpham')->get();
        $sanphammois = DB::table('sanphams')
            ->orderBy('created_at', 'desc') // Sắp xếp giảm dần theo ngày thêm mới nhất
            ->get();

        return view('home',
        ['sanphams' => $sanphams,
            'loaisanphams' => $loaisanphams,
            'sanphammois' => $sanphammois,
        ],
        );
    }
}
