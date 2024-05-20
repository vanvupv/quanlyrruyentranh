<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhaxuatban;
use Illuminate\Http\Request;

class NhaxuatbanController extends Controller
{
    //
    public function list() {
        $nxb = Nhaxuatban::all();
        return view('admin.nhaxuatban.listNhaxuatban',[
            'nhaxuatbans' => $nxb,
        ]);
    }

    //
    public function add() {
        return view('admin.nhaxuatban.add');
    }

    //
    public function store(Request $request) {
        $tentnxb = $request->input('tennxb');
        $mota = $request->input('mota');

        Nhaxuatban::create([
            'tennxb' => $tentnxb,
            'gioithieunxb' => $mota,
        ]);

        return redirect()->back()->with([
            'message' => 'Thêm nhà xuất bản thành công',
            'status' => 200,
        ]);
    }

    //
    public function view() {

    }

    //
    public function edit($manhaxuatban) {
        //
        $nhaxuatbanDetail = Nhaxuatban::where('id', $manhaxuatban)->first();
        //
        return view('admin.nhaxuatban.editNhaxuatban', [
            'manhaxuatban' => $manhaxuatban,
            'nhaxuatbanDetail' => $nhaxuatbanDetail,
        ]);
    }

    public function postedit($manhaxuatban, Request $request) {
        $tennxb = $request->input('tennxb');
        $mota = $request->input('mota');

        Nhaxuatban::where('id', $manhaxuatban)
            ->update([
                'tennxb' => $tennxb,
                'gioithieunxb' => $mota,
            ]);
        //
        return redirect()->back()->with([
            'message' => 'Cập nhật nhà xuất bản thành công',
            'status' => 200,
        ]);
    }

    public function delete($id) {
        $checkDausach = Dausach::where('manxb', $id)->exists();

        if($checkDausach) {
            return redirect()->back()->with('message', "Không được phép xóa nhà xuất bản này");
        }

        Nhaxuatban::where('id', $id)->delete();

        return redirect()->back()->with([
            'message' => 'Xóa nhà xuất bản thành công',
            'status' => 200,
        ]);
    }
}
