<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use Illuminate\Http\Request;

//
use App\Models\Loaisanpham;

class LoaisanphamController extends Controller
{
    //
    public function list() {
        $loaisanphams = Loaisanpham::all();

        return view('admin.loaisanpham.theloai',[
            'theloais' => $loaisanphams,
        ]);
    }

    public function store(Request $request) {
        $tenloai = $request->input('tentheloai');
        $mota = $request->input('motatheloai');
        $anhbia = $request->input('anhbia');

        if (Loaisanpham::theloaiExists($tenloai)) {
            return redirect()->back()->with('error', 'Tên Thể Loại Đã Tồn Tại');
        }

        Loaisanpham::create([
            'tenloai'   => $tenloai,
            'mota'      => $mota,
            'anhbia'    => $anhbia,
        ]);

        return redirect()->back()->with([
            'success' => 'Thêm thể loại thành công',
            'status' => 200,
        ]);
    }

    public function view() {

    }

    public function edit($maLoaisanpham) {
        $LoaisanphamDetail = Loaisanpham::where('id', $maLoaisanpham)->first();

        return view('admin.Loaisanpham.editLoaisanpham', [
            'maLoaisanpham' => $maLoaisanpham,
            'LoaisanphamDetail' => $LoaisanphamDetail,
        ]);
    }

    //
    public function postedit($maLoaisanpham, Request $request) {
        $tenLoaisanpham = $request->input('tenLoaisanpham');
        $mota = $request->input('mota');

        $Loaisanpham = Loaisanpham::where('id', $maLoaisanpham)->first();
        $Loaisanpham->tentl = $tenLoaisanpham;
        $Loaisanpham->mota = $mota;

        if ($Loaisanpham->isDirty()) {
            $changedAttributes = $Loaisanpham->getDirty();

            if (isset($changedAttributes['tentl'])) {
                if (Loaisanpham::LoaisanphamExists($tenLoaisanpham)) {
                    return redirect()->back()->with('message', 'Thể Loại "' . $tenLoaisanpham . '" Đã Tồn Tại');
                }
            }
        }

        else {
            return redirect()->back()->with([
                'message' => 'Không có thông tin thay đổi',
                'status' => 200,
            ]);
        }

        Loaisanpham::where('id', $maLoaisanpham)
            ->update([
                'tentl' => $tenLoaisanpham,
                'mota' => $mota,
            ]);

        return redirect()->back()->with([
            'message' => 'Cập nhật thể loại thành công',
            'status' => 200,
        ]);
    }

    public function delete($id) {
        $checkDausach = Sanpham::where('matl', $id)->exists();

        if($checkDausach) {
            return redirect()->back()->with('message', "Không được phép xóa Thể loại này");
        }

        Loaisanpham::where('id', $id)->delete();

        return redirect()->back()->with([
            'message' => 'Xóa thể loại thành công',
            'status' => 200,
        ]);
    }
}

