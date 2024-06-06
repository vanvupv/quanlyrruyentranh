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

    public function edit($id) {
        $loaisanpham = Loaisanpham::find($id);

        if (!$loaisanpham) {
            return response()->json([
                'status' => 400,
                'message' => 'Không tìm thấy thể loại!',
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => $loaisanpham,
        ]);
    }

    public function postedit($id, Request $request) {
        $data = $request->all();

        $loaisanpham = Loaisanpham::find($id);

        if(!$loaisanpham) {
            return redirect()->back()->with('error', 'Không tìm thấy tên thể loại');
        }

        if(Loaisanpham::checkTenloai($id, $data['tentheloai'])) {
            return redirect()->back()->with('error', 'Tên thể loại đã tồn tại');
        }

        Loaisanpham::where('id', $id)
            ->update([
                'tenloai' => $data['tentheloai'],
                'mota' => $data['motatheloai'],
                'anhbia' => $data['anhbia'],
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

