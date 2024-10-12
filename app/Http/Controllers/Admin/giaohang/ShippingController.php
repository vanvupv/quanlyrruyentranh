<?php

namespace App\Http\Controllers\Admin\giaohang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//
use App\Models\Shipping;

class ShippingController extends Controller
{
    /*
     *
     *
     * */
    public function index() {

        $shippings = Shipping::all();

        return view('admin.giaohang.danhsachgiaohang', [
            'title' => 'Danh sách giao hàng',
            'shippings' => $shippings
        ]);
    }

    /*
     *
     *
     * */
    public function create() {
        return view('admin.giaohang.themgiaohang',[
            'title' => 'Thêm Phương thức giao hàng'
        ]);
    }

    /*
     *
     *
     * */
    public function store(Request $request) {

        // Validate -- Chủ đề
        $validator = Validator::make($request->all(),[
           'name_shipping' => 'required',
           'price' => 'required|numeric'
        ]);

        if ($validator->passes()) {

            $shipping = new Shipping;
            $shipping->name_shipping = $request->name_shipping;
            $shipping->price = $request->price;
            $shipping->save();

            // Thông báo -- Chủ đề
            session()->flash('success', 'Thêm phương thức giao hàng thành công!');

            return response()->json([
                'status' => true,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /*
     *
     *
     * */
    public function edit($id) {
        $shipping = Shipping::find($id);

        if (!$shipping) {
            return response()->json([
                'status' => false,
                'message' => 'ID sản phẩm không tồn tại!'
            ]);
        }

        return view('admin.giaohang.capnhatgiaohang', [
            'title' => 'Cập nhật thông tin giao hàng',
            'data' => $shipping
        ]);
    }

    /*
     *
     *
     * */
    public function update($id, Request $request) {

        $shipping = Shipping::find($id);

        // Validate -- Chủ đề
        $validator = Validator::make($request->all(),[
            'name_shipping' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->passes()) {

            if ($shipping == null) {
                // Thông báo -- Chủ đề
                session()->flash('error', 'Phương thức giao hàng không tìm thấy!');

                return response()->json([
                    'status' => true,
                ]);
            }

            $shipping->name_shipping = $request->name_shipping;
            $shipping->price = $request->price;
            $shipping->save();

            // Thông báo -- Chủ đề
            session()->flash('success', 'Cập nhật phương thức giao hàng thành công!');

            return response()->json([
                'status' => true,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    /*
     *
     *
     * */
    public function delete($id) {
        $shipping = Shipping::find($id);

        if ($shipping == null) {
            session()->flash('error', 'Không tìm thấy phương thức giao hàng');

            return response()->json([
                'status' => true,
            ]);
        }

        $shipping->delete();

        // Thông báo -- Chủ đề
        session()->flash('success', 'Xóa phương thức giao hàng thành công!');

        return response()->json([
            'status' => true,
        ]);
    }
}
