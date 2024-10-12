<?php

namespace App\Http\Controllers\Admin\khuyenmai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
use App\Models\Loaisanpham;
use App\Models\Sanpham;
use App\Models\Khuyenmai;
use Validator;

class KhuyenmaiController extends Controller
{
    /*
     *
     *
     * */
    public function index() {
        // Lấy tất cả mã giảm giá
        $khuyenmais = Khuyenmai::all();

        return view('admin.khuyenmai.danhsachkhuyenmai',[
            'khuyenmais' => $khuyenmais,
        ]);
    }

    /*
     *
     *
     * */
    public function create() {
        $sanphams = Sanpham::pluck('tensanpham','id')->all();
        $danhmucs = Loaisanpham::pluck('tenloai','id')->all();

        return view('admin.khuyenmai.themkhuyenmai',[
            'khuyenmais' => '',
            'sanphams' => $sanphams,
            'danhmucs' => $danhmucs,
        ]);
    }

    /*
     *
     *
     * */
    public function store() {
        $data = request()->all();

        $rules = [
            'code' => 'required|unique:khuyenmai,code|string|max:255',
            'reward' => 'required|numeric',
            'type' => 'required|string|max:50',
            'data' => 'required|string',
            'limit' => 'required|integer',
            'productExclude' => 'nullable|array',
            'productApply' => 'nullable|array',
            'categoryExclude' => 'nullable|array',
            'categoryApply' => 'nullable|array',
            'expires_at' => 'required|date',
            'status' => 'required|boolean',
        ];

        $messages = [
            'code.required' => 'Mã giảm giá là bắt buộc.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'reward.required' => 'Phần thưởng là bắt buộc.',
            'type.required' => 'Loại phần thưởng là bắt buộc.',
            'data.required' => 'Mô tả là bắt buộc.',
            'limit.required' => 'Giới hạn là bắt buộc.',
            'expires_at.required' => 'Ngày hết hạn là bắt buộc.',
            'status.required' => 'Trạng thái là bắt buộc.',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        $discount['code'] = $data['code'];
        $discount['reward'] = $data['reward'];
        $discount['type'] = $data['type'];
        $discount['desc'] = $data['data'];
        $discount['limit'] = $data['limit'];
        $discount['productExclude'] = json_encode(array_map('intval', $data['product_exclude']));
        $discount['productApply'] = json_encode(array_map('intval', $data['product_apply']));
        $discount['categoryExclude'] = json_encode(array_map('intval', $data['category_exclude']));
        $discount['categoryApply'] = json_encode(array_map('intval', $data['category_apply']));
        $discount['expires'] = $data['expires_at'];
        $discount['status'] = $data['status'];

        Khuyenmai::create($discount);

        return redirect()->back()->with('success','Them moi ma thanh cong');
    }

    /*
     *
     *
     * */
    public function edit($id) {
        $coupon = Khuyenmai::find($id);
        $coupon->productExclude= json_decode($coupon->productExclude);
        $coupon->productApply= json_decode($coupon->productApply);
        $coupon->categoryExclude= json_decode($coupon->categoryExclude);
        $coupon->categoryApply= json_decode($coupon->categoryApply);

        $sanphams = Sanpham::pluck('tensanpham','id')->all();
        $danhmucs = Loaisanpham::pluck('tenloai','id')->all();

        return view('admin.khuyenmai.capnhatkhuyenmai',[
            'data' => $coupon,
            'sanphams' => $sanphams,
            'danhmucs' => $danhmucs,
        ]);
    }

    /*
     *
     *
     * */
    public function postedit($id, Request $request) {
        $coupon = Khuyenmai::find($id);

        $data = $request->all();

        $rules = [
            'code' => 'required|unique:khuyenmai,code,' . $coupon->id . '|string|max:255',
            'reward' => 'required|numeric',
            'type' => 'required|string|max:50',
            'data' => 'required|string',
            'limit' => 'required|integer',
            'productExclude' => 'nullable|array',
            'productApply' => 'nullable|array',
            'categoryExclude' => 'nullable|array',
            'categoryApply' => 'nullable|array',
            'expires_at' => 'required|date',
            'status' => 'required|boolean',
        ];

        $messages = [
            'code.required' => 'Mã giảm giá là bắt buộc.',
            'code.unique' => 'Mã giảm giá đã tồn tại.',
            'reward.required' => 'Phần thưởng là bắt buộc.',
            'type.required' => 'Loại phần thưởng là bắt buộc.',
            'data.required' => 'Mô tả là bắt buộc.',
            'limit.required' => 'Giới hạn là bắt buộc.',
            'expires_at.required' => 'Ngày hết hạn là bắt buộc.',
            'status.required' => 'Trạng thái là bắt buộc.',
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($data);
        }

        $discount['code'] = $data['code'];
        $discount['reward'] = $data['reward'];
        $discount['type'] = $data['type'];
        $discount['desc'] = $data['data'];
        $discount['limit'] = $data['limit'];
        $discount['productExclude'] = json_encode(array_map('intval', $data['product_exclude'])) ?? '';
        $discount['productApply'] = json_encode(array_map('intval', $data['product_apply'])) ?? '';
        $discount['categoryExclude'] = json_encode(array_map('intval', $data['category_exclude'])) ?? '';
        $discount['categoryApply'] = json_encode(array_map('intval', $data['category_apply'])) ?? '';
        $discount['expires'] = $data['expires_at'];
        $discount['status'] = $data['status'];

        $coupon->update($discount);

        return redirect()->back()->with('success', 'Cap nhat ma giam gia thanh cong');
    }
}
