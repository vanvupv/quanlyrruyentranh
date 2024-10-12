<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
use Validator;

//
use App\Models\Sanpham;
use App\Models\Loaisanpham;

class LoaisanphamController extends Controller
{
    /*
     *
     * */
    public function list() {
        $loaisanphams = Loaisanpham::with('parentCategory')->get();

        $danhmuc = (new Loaisanpham())->getTreeCategoriesAdmin();

        return view('admin.loaisanpham.theloai',[
            'theloais' => $loaisanphams,
            'danhmucs' => $danhmuc,
        ]);
    }

    /*
     *
     * */
    public function store(Request $request) {
        $parent     = $request->input('parent_category');
        $tenloai    = $request->input('tentheloai');
        $mota       = $request->input('motatheloai');
        $anhbia     = $request->input('anhbia');

        $data = request()->all();

        $arrValidation = [
            'parent_category' => 'required',
            'tentheloai' => 'required|unique:loaisanpham,tenloai|string|max:100',
            'motatheloai'   => 'required|string|max:200',
            'anhbia' => 'nullable|string|max:200',
        ];

        $validator = Validator::make(
            $data,$arrValidation,
            [
                'tentheloai.regex' => 'Kiểu thể loại bị sai',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        Loaisanpham::create([
            'parent_id' => $parent,
            'tenloai'   => $tenloai,
            'mota'      => $mota,
            'anhbia'    => $anhbia,
        ]);

        return redirect()->back()->with([
            'success' => 'Thêm thể loại thành công',
            'status' => 200,
        ]);
    }

    /*
     *
     * */
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

    /*
     *
     * */
    public function postedit($id) {
        $loaisanpham = Loaisanpham::find($id);

        //
        if(!$loaisanpham) {
            return redirect()->back()->with('error', 'Không tìm thấy tên thể loại');
        }

        $data = request()->all();

        $arrValidation = [
            'parent_category' => 'required',
            'tentheloai' => 'required|unique:loaisanpham,tenloai,' . $loaisanpham->id . '|string|max:100',
            'motatheloai'   => 'required|string|max:200',
            'anhbia' => 'nullable|string|max:200',
        ];

        $validator = Validator::make(
            $data, $arrValidation,
            [
                'tentheloai.regex'     => 'Kiểu thể loại bị sai',
                'tentheloai.unique'    => 'Tên thể loại đã tồn tại',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        //
        Loaisanpham::where('id', $id)
            ->update([
                'parent_id' => $data['parent_category'],
                'tenloai'   => $data['tentheloai'],
                'mota'      => $data['motatheloai'],
                'anhbia'    => $data['anhbia'],
            ]);

        return redirect()->back()->with([
            'message' => 'Cập nhật thể loại thành công',
            'status' => 200,
        ]);
    }

    /*
     *
     * */
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

