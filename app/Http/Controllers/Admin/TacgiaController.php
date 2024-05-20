<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use Illuminate\Http\Request;

//
use App\Models\Tacgia;

class TacgiaController extends Controller
{
    //
    public function list() {
        $tacgia = Tacgia::all();
        return view('admin.tacgia.listTacgia',[
            'tacgias' => $tacgia,
        ]);
    }

    //
    public function add() {
        return view('admin.tacgia.add');
    }

    public function store(Request $request) {
        $tentacgia = $request->input('tentacgia');
        $mota = $request->input('mota');

        Tacgia::create([
            'hotentg' => $tentacgia,
            'gioithieu' => $mota,
        ]);

        return redirect()->back()->with([
            'message' => 'Thêm tác giả thành công',
            'status' => 200,
        ]);
    }

    //
    public function view() {

    }

    //
    public function edit($matacgia) {
        $tacgiaDetail = Tacgia::where('id', $matacgia)->first();

        return view('admin.tacgia.editTacgia', [
            'matacgia' => $matacgia,
            'tacgiaDetail' => $tacgiaDetail,
        ]);
    }

    public function postedit($matacgia, Request $request) {
        $tentacgia = $request->input('tentacgia');
        $mota = $request->input('mota');

        Tacgia::where('id', $matacgia)
            ->update([
                'hotentg' => $tentacgia,
                'gioithieu' => $mota,
            ]);

        return redirect()->back()->with([
            'message' => 'Cập nhật tác giả thành công',
            'status' => 200,
        ]);
    }

    public function delete($id) {
        $checkDausach = Sanpham::where('matg', $id)->exists();

        if($checkDausach) {
            return redirect()->back()->with('message', "Không được phép xóa tác giả này");
        }

        Tacgia::where('id', $id)->delete();

        return redirect()->back()->with([
            'message' => 'Xóa tác giả thành công',
            'status' => 200,
        ]);
    }
}
