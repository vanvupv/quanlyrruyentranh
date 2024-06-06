<?php

namespace App\Http\Controllers;

use App\Models\Loaisanpham;
use App\Models\Sanpham;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index(Request $request) {

        $loaisp = Loaisanpham::select('loaisanpham.id','tenloai', 'loaisanpham.mota', 'loaisanpham.anhbia', DB::raw('count(sanphams.id) as count'))
            ->leftJoin('sanphams', 'loaisanpham.id', '=', 'sanphams.matheloai')
            ->groupBy('loaisanpham.id','loaisanpham.tenloai','loaisanpham.mota', 'loaisanpham.anhbia')
            ->get();

        $query = Sanpham::query();

        //
        $orderBy = $request->query('order');
        if($orderBy) {
            if ($orderBy == -1) {
                $orderBy = 'asc';
            }
            $query->orderBy("giaban", $orderBy);
        }

        //
        $q_options = $request->query("categories");
        if ($q_options) {
            $arr_options = explode(',',$q_options);
            $query->whereIn('matheloai',$arr_options);
        }

        //
        $min_price =  $request->query('minprice');
        $max_price =  $request->query('maxprice');
        if ($min_price && $max_price) {
            $arr_price = [];
            $arr_price[] = $min_price;
            $arr_price[] = $max_price;
            $query->whereBetween('giaban',$arr_price);
        }

        //
        $page = $request->query('pagenumber') ?? '8';

        if ($page) {
            $sanphams = $query->paginate($page);
        }

        $sanphams->appends($request->query());

        return view('shop', [
            'sanphams' => $sanphams,
                'loaisanphams' => $loaisp,
                'q_loaisanpham' => $loaisp,
                'q_options' => $q_options,
                'min_price' => $min_price,
                'max_price' => $max_price,
                'orderBy' => $orderBy,
                'page' => $page,
            ])->with('request', $request);
    }
}


