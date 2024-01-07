<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoaiSanPhamRequest;
use App\Http\Service\LoaiSanPhamService;
use App\Models\Loaisanpham;
use Illuminate\Http\Request;

class LoaisanphamController extends Controller
{
    //
    protected $loaisanphamService;
    public function __construct(LoaiSanPhamService $loaisanphamService)
    {
        $this->loaisanphamService  = $loaisanphamService;
    }

    public function create(){
        return view('admin.loaisanpham.addType',[
           'title'=>'Thêm mới loại sản phẩm'
        ]);
    }
    public function store(CreateLoaiSanPhamRequest $request){
      //xử lý thêm mới danh mục
        //dd($request->input());
        $result = $this->loaisanphamService->create($request);
        return redirect()->back();
    }
    public function list(){
        //dd($this->sanphamService->getAll());
        return view('admin.loaisanpham.listType',[
            'title'=>'Danh sách danh mục',
            'loaisanphams' => $this->loaisanphamService->getAll()
        ]);
    }
    public function edit(Loaisanpham $loaisanpham){
        //dd($sanpham);
        return view('admin.loaisanpham.editType',[
            'title'=>'Sửa thông tin danh mục',
            'loaisanpham'=>$loaisanpham
        ]);
    }
    public function postedit(Loaisanpham $loaisanpham, Request $request){
        $result = $this->loaisanphamService->edit($request,$loaisanpham);
        return redirect()->back();
//        echo 'HHAHAha EDit';
    }

    public function delete(Request $request){
        $result = $this->loaisanphamService->delete($request);
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

