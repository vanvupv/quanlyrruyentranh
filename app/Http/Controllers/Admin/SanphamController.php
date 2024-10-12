<?php

namespace App\Http\Controllers\Admin;

//
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Exception;

//
use App\Models\Loaisanpham;
use App\Models\Sanpham;

class SanphamController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    /*
     *
     * */
    public function index() {
        $datas = Sanpham::all();

        return view('admin.sanpham.danhsachsanpham',[
            'title'     => 'Danh sách sản phẩm',
            'sanphams'  => $datas,
        ]);
    }

    /*
     *
     * */
    public function create() {
        $theloais = Loaisanpham::pluck('tenloai','id');

        return view('admin.sanpham.themsanpham',[
            'action'        => 'create',
            'title'         => 'Thêm mới danh mục',
            'theloais'      =>  $theloais,
        ]);
    }

    /*
     *
     * */
    public function store(Request $request) {
        $data = request()->all();

        $tensanpham     =   $request->input('productTitle'); // 2
        $sku            =   $request->input('productSku'); // 3
        $mota           =   $request->input('productDesc'); // 5
        $soluong        =   $request->input('productQty'); // 6
        $giaban         =   $request->input('productPrice'); // 8
        $giatotnhat     =   $request->input('productDiscountedPrice'); // 9
        $anhbia         =   $request->input('anhbia'); // 10
        $matheloai      =   $request->input('matheloai'); // 13
        $trangthai      =   $request->input('status'); // 15

        $validator = Validator::make($request->all(), [
            'productSku' => 'required|product_sku_unique' ,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'SKU đã tồn tại Khi sử dụng ')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Sanpham::create([
                'tensanpham'    => $tensanpham,
                'sku'           => $sku,
                'mota'          => $mota,
                'soluong'       => $soluong,
                'gianhap'       => $giaban,
                'giaban'        => $giatotnhat,
                'anhbia'        => $anhbia,
                'matheloai'     => $matheloai,
                'trangthai'     => $trangthai,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Thêm mới sản phẩm thất bại');
        }

        return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
    }

    /*
     *
     * */
    public function detail($id) {
        $product = Sanpham::find($id);

        if ($product) {
            return response()->json([
                'data' => $product,
                'message' => 'success',
            ]);
        }
    }

    /*
     *
     * */
    public function edit($id){
        $sanpham    = Sanpham::findorFail($id);
        $theloais   = Loaisanpham::pluck('tenloai','id');

        return view('admin.sanpham.themsanpham',[
            'action'        => 'edit',
            'title'         => 'Thêm mới danh mục',
            'sanpham'       => $sanpham,
            'theloais'      =>  $theloais,
        ]);
    }

    /*
     *
     * */
    public function postedit($id){
        $sanpham = Sanpham::findorFail($id);
        $data = request()->all();

        //
        $tensanpham     =  $data["productTitle"];
        $sku            =  $data["productSku"];
        $mota           =  $data["productDesc"];
        $soluong        =  $data["productQty"];
        $gianhap        =  $data["productPrice"];
        $giaban         =  $data["productDiscountedPrice"];
        $anhbia         =  $data["anhbia"];
        $matheloai      =  $data["matheloai"];
        $trangthai      =  $data["status"];

        $validator = Validator::make(request()->all(), [
            'productSku' => 'required|product_sku_unique:'.$id ,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'SKU đã tồn tại')
                ->withErrors($validator)
                ->withInput();
        }

        //
        $sanpham->tensanpham = $tensanpham;
        $sanpham->sku = $sku;
        $sanpham->mota = $mota;
        $sanpham->soluong = $soluong;
        $sanpham->gianhap  =  $gianhap;
        $sanpham->giaban = $giaban;
        $sanpham->anhbia = $anhbia;
        $sanpham->matheloai = $matheloai;
        $sanpham->trangthai = $trangthai;

        $sanpham->save();

        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công');
    }

    /*
     * Delete Product
     * */
    public function delete(){

        return response()->json([
            'error'=>'true'
        ]);
    }
}

