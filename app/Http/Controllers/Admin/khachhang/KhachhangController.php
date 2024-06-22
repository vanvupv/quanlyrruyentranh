<?php

namespace App\Http\Controllers\Admin\khachhang;

use App\Http\Controllers\Controller;
use App\Models\Khachhang;

//
use Illuminate\Http\Request;
use Validator;

class KhachhangController extends Controller
{
    /*
     *
     *
     * */
    public function index() {
        $customers = Khachhang::all();

        return view('admin.khachhang.danhsachkhachhang',[
            'khachhangs' => $customers,
        ]);
    }

    /*
     *
     *
     * */
    public function create() {

        return view('admin.khachhang.themkhachhang',[
            'title' => 'Thêm Khách Hàng',
        ]);
    }

    /*
     *
     *
     * */
    public function store(Request $request) {
        $data = $request->all();

        $arrValidation = [
            'tenkhachhang' => 'required',
            'sodienthoai' => 'required|unique:khachhang,sodienthoai|regex:/(^([0-9A-Za-z\-_]+)$)/|string|max:100',
            'trangthaihoatdong'   => 'required|string|max:200',
        ];

        $validator = Validator::make(
            $data,$arrValidation,
            [
                'sodienthoai.regex' => 'So dien thoai khong dung dinh dang',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        Khachhang::create([
            'tenkhachhang' => $data['tenkhachhang'],
            'sodienthoai' => $data['sodienthoai'],
            'trangthaihoatdong' => $data['trangthaihoatdong'],
        ]);

        return redirect()->back()->with('success','Them moi khach hang thanh cong');
    }

    /*
     *
     *
     * */
    public function edit($id) {
        $khachhang = Khachhang::find($id);

        return view('admin.khachhang.capnhatkhachhang',[
            'title' => 'Cap nhat thong tin khach hang',
            'data' => $khachhang,
        ]);
    }

    /*
     *
     *
     * */
    public function postedit($id, Request $request) {
        $khachhang = Khachhang::find($id);

        $data = $request->all();

        // unique:khachhang,sodienthoai
        $arrValidation = [
            'tenkhachhang' => 'required',
            'sodienthoai' => 'required|regex:/(^([0-9A-Za-z\-_]+)$)/|string|max:100',
            'trangthaihoatdong'   => 'string|max:200',
        ];

        $validator = Validator::make(
            $data,$arrValidation,
            [
                'sodienthoai.regex' => 'So dien thoai khong dung dinh dang',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        $khachhang->update([
            'tenkhachhang' => $data['tenkhachhang'],
            'sodienthoai' => $data['sodienthoai'],
            'trangthaihoatdong' => $data['trangthaihoatdong'],
        ]);

        return redirect()->back()->with('success','Cap nhat thong tin khach hang thanh cong');
    }

    /*
     *
     *
     * */
    public function delete($id) {

        return redirect()->back()->with('success','Xoa khach hang thanh cong');
    }


}
