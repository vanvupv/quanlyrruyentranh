<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Loaisanpham;
use App\Models\Sanpham;
use App\Models\Anh;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission');
    }

    public function viewShop(Request $request) {

        $loaisp = Loaisanpham::select('loaisanpham.MaLoaiSP','TenLoai', 'loaisanpham.MoTa', 'loaisanpham.AnhBia', DB::raw('count(sanphams.IDSanPham) as count'))
            ->leftJoin('sanphams', 'loaisanpham.MaLoaiSP', '=', 'sanphams.MaLoaiSP')
            ->groupBy('loaisanpham.MaLoaiSP','loaisanpham.TenLoai','loaisanpham.MoTa', 'loaisanpham.AnhBia')
            ->get();

        $query = Sanpham::query();

        //
        $orderBy = $request->query('order');
        if($orderBy) {
            if ($orderBy == -1) {
                $orderBy = 'asc';
            }
            $query->orderBy("GiaBan", $orderBy);
        }

        //
        $q_options = $request->query("categories");
        if ($q_options) {
            $arr_options = explode(',',$q_options);
            $query->whereIn('MaLoaiSP',$arr_options);
        }

        //
        $min_price =  $request->query('minprice');
        $max_price =  $request->query('maxprice');
        if ($min_price && $max_price) {
            $arr_price = [];
            $arr_price[] = $min_price;
            $arr_price[] = $max_price;
            $query->whereBetween('GiaBan',$arr_price);
        }

        //
        $page = $request->query('pagenumber') ?? '8';
//        var_dump($page);

        if ($page) {
            $sanphams = $query->paginate($page);
//            var_dump($sanphams);
        }

        $sanphams->appends($request->query());

        // B2: Trả dữ liệu về View
        return view('shop',
            ['sanphams' => $sanphams,
                'loaisanphams' => $loaisp,
                'q_loaisanpham' => $loaisp,
                'q_options' => $q_options,
                'min_price' => $min_price,
                'max_price' => $max_price,
                'orderBy' => $orderBy,
                'page' => $page,
            ]
        )->with('request', $request);
    }
}

