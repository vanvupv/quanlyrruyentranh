<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
use App\Models\Vitri;

class VitriController extends Controller
{
    //
    public function list() {
        $vitris = Vitri::all();
        return view('admin.vitri.listVitri',[
            'vitris' => $vitris,
        ]);
    }

    //
    public function add() {
        return view('admin.vitri.add');
    }

    public function store(Request $request) {
        $tenvitri = $request->input('tenvitri');
        $mota = $request->input('mota');

        if (Vitri::vitriExists($tenvitri)) {
            return redirect()->back()->with('message', 'Tên Vị Trí Đã Tồn Tại');
        }

        Vitri::create([
            'vitri_name' => $tenvitri,
            'vitri_title' => $mota,
        ]);

        return redirect()->back()->with([
            'message' => 'Thêm vị trí thành công',
            'status' => 200,
        ]);
    }

    public function view() {

    }

    //
    public function edit($mavitri) {
        //
        $VitriDetail = Vitri::where('id', $mavitri)->first();
        //
        return view('admin.vitri.editVitri', [
            'mavitri' => $mavitri,
            'vitriDetail' => $VitriDetail,
        ]);
    }

    //
    public function postedit($mavitri, Request $request) {
        $tenvitri = $request->input('tenvitri');
        $mota = $request->input('mota');

        $vitri = Vitri::where('id', $mavitri)->first();
        $vitri->vitri_name = $tenvitri;
        $vitri->vitri_title = $mota;

        if ($vitri->isDirty()) {
            $changedAttributes = $vitri->getDirty();

            if (isset($changedAttributes['vitri_name'])) {
                if (Vitri::vitriExists($tenvitri)) {
                    return redirect()->back()->with('message', 'Vị trí "' . $tenvitri . '" Đã Tồn Tại');
                }
            }
        }

        else {
            return redirect()->back()->with([
                'message' => 'Không có thông tin thay đổi',
                'status' => 200,
            ]);
        }

        Vitri::where('id', $mavitri)
            ->update([
                'vitri_name' => $tenvitri,
                'vitri_title' => $mota,
            ]);

        return redirect()->back()->with([
            'message' => 'Cập nhật vị trí thành công',
            'status' => 200,
        ]);
    }

    public function delete($id) {
        $checkDausach = Dausach::where('mavitri', $id)->exists();

        if($checkDausach) {
            return redirect()->back()->with('message', "Không được phép xóa Vị trí này");
        }

        Vitri::where('id', $id)->delete();

        return redirect()->back()->with([
            'message' => 'Xóa vị trí thành công',
            'status' => 200,
        ]);
    }
}
