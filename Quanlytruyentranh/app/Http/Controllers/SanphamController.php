<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSanPhamRequest;
use App\Http\Service\SanPhamService;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use App\Models\Loaisanpham;
use App\Models\Anh;

class SanphamController extends Controller
{
    //
    protected $sanphamService;
    public function __construct(SanPhamService $sanphamService)
    {
        $this->sanphamService  = $sanphamService;
    }
    public function create(){

        $maLoaiSanPhamList = Loaisanpham::pluck('TenLoai','MaLoaiSP');

        return view('admin.sanpham.add',[
           'title'=>'Thêm mới danh mục',
            'maLoaiSanPhamLists' =>  $maLoaiSanPhamList
        ]);
    }

    public function store(CreateSanPhamRequest $request){
      //xử lý thêm mới danh mục
        $result = $this->sanphamService->create($request);
        return redirect()->back();
    }

    public function list(){
        $maLoaiSanPhamList = Loaisanpham::pluck('TenLoai','MaLoaiSP');


        return view('admin.sanpham.list',[
            'title'=>'Danh sách danh mục',
            'sanphams' => $this->sanphamService->getAll(),
            'maLoaiSanPhamLists' =>  $maLoaiSanPhamList
        ]);
    }
    public function edit(Sanpham $sanpham){
        //dd($sanpham);
        $maLoaiSanPhamList = Loaisanpham::pluck('TenLoai','MaLoaiSP');
        return view('admin.sanpham.edit',[
            'title'=>'Sửa thông tin danh mục',
            'sanpham'=>$sanpham,
            'maLoaiSanPhamLists' =>  $maLoaiSanPhamList
        ]);
    }
    public function postedit(Sanpham $sanpham,Request $request){
        $result = $this->sanphamService->edit($request,$sanpham);
        return redirect()->back();
    }
    public function delete(Request $request){
        $result = $this->sanphamService->delete($request);
        if($result){
            return response()->json([
               'error'=>'false',
               'message'=>'Xóa danh mục thành công'
            ]);
        }

        return response()->json([
            'error'=>'true'
        ]);
    }
}

