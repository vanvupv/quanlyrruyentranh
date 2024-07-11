<?php

namespace App\Http\Controllers\Admin;

//
use Illuminate\Support\Facades\Validator;

//
use App\Models\Loaisanpham;
use App\Models\Nhaxuatban;
use App\Models\Sanpham;
use App\Models\Tacgia;
use App\Models\Vitri;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use PHPUnit\Exception;

class SanphamController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index() {
        $datas = Sanpham::all();

        return view('admin.sanpham.danhsachsanpham',[
            'title'     => 'Danh sách sản phẩm',
            'sanphams'  => $datas,
        ]);
    }

    public function create() {
        $theloais = Loaisanpham::pluck('tenloai','id');
        $vitris = Vitri::pluck('tenvitri','id');
//        $nxbs = Nhaxuatban::pluck('tennxb','id');
//        $tacgias = Tacgia::pluck('tentacgia','id');

        return view('admin.sanpham.themsanpham',[
            'action'        => 'create',
            'title'         => 'Thêm mới danh mục',
            'theloais'      =>  $theloais,
            'vitris'        =>  $vitris,
//            'nxbs'          =>  $nxbs,
//            'tacgias'       =>  $tacgias,
        ]);
    }

    public function store(Request $request){
        $masanpham      =   $request->input('productBarcode'); // 1
        $tensanpham     =   $request->input('productTitle'); // 2
        $sku            =   $request->input('productSku'); // 3
        $donvitinh      =   $request->input('productUnit'); // 4
        $mota           =   $request->input('productDesc'); // 5
        $soluong        =   $request->input('productQty'); // 6 -> Thiếu

        $giaban         =   $request->input('productPrice'); // 8
        $giatotnhat     =   $request->input('productDiscountedPrice'); // 9
        $anhbia         =   $request->input('anhbia'); // 10 -> Thiếu
        $matacgia       =   $request->input('matacgia'); // 11
        $manhaxuatban   =   $request->input('manhaxuatban'); // 12
        $matheloai      =   $request->input('matheloai'); // 13
        $mavitri        =   $request->input('mavitri'); // 14

        $trangthai      =   $request->input('status'); // 15

        $validator = Validator::make($request->all(), [
            'productSku' => 'required|product_sku_unique' , // truyền được id -
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'SKU đã tồn tại Khi sử dụng ')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            Sanpham::create([
                'masanpham'     => $masanpham, // 1
                'tensanpham'    => $tensanpham, // 2
                'SKU'           => $sku, // 3
                'donvitinh'     => $donvitinh, // 4
                'mota'          => $mota, // 5
                'soluong'       => $soluong, // 6
                'giagoc'        => $giaban, // 7
                'giaban'        => $giaban, // 8
                'giatotnhat'    => $giatotnhat, // 9
                'anhbia'        => $anhbia, // 10
                'matacgia'      => $matacgia, // 11
                'manhaxuatban'  => $manhaxuatban, // 12
                'matheloai'     => $matheloai, // 13
                'mavitri'       => $mavitri, // 14
                'trangthai'     => $trangthai, // 15
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Thêm mới sản phẩm thất bại');
        }

        return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
    }

    public function detail($id) {
        $product = Sanpham::find($id);

        if ($product) {
            return response()->json([
                'data' => $product,
                'message' => 'success',
            ]);
        }
    }

    public function edit($id){
        $sanpham    = Sanpham::findorFail($id);

        $theloais   = Loaisanpham::pluck('tenloai','id');
        $vitris     = Vitri::pluck('tenvitri','id');
        $nxbs       = Nhaxuatban::pluck('tennxb','id');
        $tacgias    = Tacgia::pluck('tentacgia','id');

        return view('admin.sanpham.themsanpham',[
            'action'        => 'edit',
            'title'         => 'Thêm mới danh mục',
            'sanpham'       => $sanpham,
            'theloais'      =>  $theloais,
            'vitris'        =>  $vitris,
            'nxbs'          =>  $nxbs,
            'tacgias'       =>  $tacgias,
        ]);
    }
    public function postedit($id, Request $request){
        $sanpham    = Sanpham::findorFail($id);

        $masanpham      =   $request->input('productBarcode'); // 1
        $tensanpham     =   $request->input('productTitle'); // 2
        $sku            =   $request->input('productSku'); // 3
        $donvitinh      =   $request->input('productUnit'); // 4
        $mota           =   $request->input('productDesc'); // 5
        $soluong        =   $request->input('productQty'); // 6 -> Thiếu

        $giaban         =   $request->input('productPrice'); // 8
        $giatotnhat     =   $request->input('productDiscountedPrice'); // 9
        $anhbia         =   $request->input('anhbia'); // 10 -> Thiếu
        $matacgia       =   $request->input('matacgia'); // 11
        $manhaxuatban   =   $request->input('manhaxuatban'); // 12
        $matheloai      =   $request->input('matheloai'); // 13
        $mavitri        =   $request->input('mavitri'); // 14

        $trangthai      =   $request->input('status'); // 15

        $validator = Validator::make($request->all(), [
            'productSku' => 'required|product_sku_unique:'.$id , // truyền được id -
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'SKU đã tồn tại Khi sử dụng ')
                ->withErrors($validator)
                ->withInput();
        }

        $sanpham->masanpham = $masanpham; // 1
        $sanpham->tensanpham = $tensanpham; // 2
        $sanpham->sku = $sku; // 3
        $sanpham->donvitinh = $donvitinh; // 4
        $sanpham->mota = $mota; // 5
        $sanpham->soluong = $soluong; // 6
        $sanpham->giagoc  =  $giaban; // 7
        $sanpham->giaban = $giaban; // 7
        $sanpham->giatotnhat = $giatotnhat; // 8
        $sanpham->anhbia = $anhbia; // 9
        $sanpham->matacgia = $matacgia; // 10
        $sanpham->manhaxuatban = $manhaxuatban; // 11
        $sanpham->matheloai = $matheloai; // 12
        $sanpham->mavitri = $mavitri; // 13
        $sanpham->trangthai = $trangthai; // 14

        $sanpham->save();

        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function delete(Request $request){

        return response()->json([
            'error'=>'true'
        ]);
    }
}

