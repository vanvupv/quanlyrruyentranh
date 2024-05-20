<?php

namespace App\Http\Service;

use App\Models\Loaisanpham;
use PHPUnit\Exception;
use DB;

class LoaiSanPhamService
{
    public function create($request){
        try {
            Loaisanpham::create([
                'MaLoaiSP' => $request->input('MaLoaiSP'),
                'TenLoai' => (string)$request->input('TenLoai'),
                'MoTa' => $request->input('MoTa'),
            ]);
            Session()->flash('success','Thêm mới danh mục thành công');
        }
        catch (Exception $ex){
            Session()->flash('error',$ex->getMessage());
            return false;
        }
        return true;
    }

     public function getAll(){
        return Loaisanpham::paginate(6);
     }
      public function edit($request,$loaisanpham)
      {
          try {

              $loaisanpham->TenLoai = (string)$request->input('TenLoai');
              $loaisanpham->MoTa = $request->input('MoTa');

              $loaisanpham->save();

              Session()->flash('success','Sửa thông tin loại thành công');

          }
          catch (Exception $ex){
              Session()->flash('error',$ex->getMessage());
              return false;
          }
          return true;
      }
    public function delete($request){
        $loaisanpham = Loaisanpham::where('MaLoaiSP',$request->input('id'))->first();
        if($loaisanpham){
            return $loaisanpham->delete();
        }
    }
}




