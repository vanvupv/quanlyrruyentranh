<?php

namespace App\Http\Service;

use App\Models\Sanpham;
use PHPUnit\Exception;
use DB;

class SanPhamService  
{
    public function create($request){
        try {
            $requestImage = $request->file();
            if($request->hasFile('AnhBia')) {
                $anhbia = $request->file('AnhBia');
                $tenanhbia = $anhbia->getClientOriginalName();

                // Kiểm tra tên ảnh
                $counter = 1;
                $imageName = $tenanhbia;
                while (file_exists(public_path('images/' . $imageName)) && $counter < 100) {
                    // Đổi tên
                    $imageName = $counter . '_' . $tenanhbia;
                    $counter++;
                }

                $anhbia->move(public_path('images'), $imageName);

            } else {
                $anhbia = 'anh-messi.jpeg';
            }

            Sanpham::create([
                'TenSP' => (string)$request->input('TenDM'),
                'MaSP' => $request->input('MaDM'),
                'SoLuong' => $request->input('SoLuong'),
                'DonViTinh' => $request->input('DonViTinh'),
                'GiaBan' => $request->input('GiaBan'),
                'AnhBia' => $imageName ?? $anhbia,
                'MaLoaiSP' => $request->input('MaLoaiSP'),
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
        return Sanpham::paginate(6);
     }
      public function edit($request,$sanpham)
      {
          try {
              $sanpham->TenSP = (string)$request->input('TenDM');
              $sanpham->MaSP = $request->input('MaDM');
              $sanpham->SoLuong = $request->input('SoLuong');
              $sanpham->DonViTinh= $request->input('DonViTinh');
              $sanpham->GiaBan = $request->input('GiaBan');
              $sanpham->MaLoaiSP = $request->input('MaLoaiSP');
              $sanpham->MoTa = $request->input('MoTa');

              $sanpham->save();
              Session()->flash('success','Sửa thông tin danh mục thành công');

          }
          catch (Exception $ex){
              Session()->flash('error',$ex->getMessage());
              return false;
          }
          return true;
      }
    public function delete($request){
        $sanpham = Sanpham::where('IDSanPham',$request->input('id'))->first();
        if($sanpham){
            return $sanpham->delete();
        }
    }
}




