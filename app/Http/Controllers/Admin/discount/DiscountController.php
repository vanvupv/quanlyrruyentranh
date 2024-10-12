<?php

namespace App\Http\Controllers\Admin\discount;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    /*
     *
     *
     * */
    public function index() {

        $discounts = Discount::all();

        return view('admin.discount.danhsachkhuyenmai', [
            'title' => 'DANH SÁCH MÃ KHUYẾN MẠI',
            'discounts' => $discounts
        ]);
    }

    /*
    *
    *
    * */
    public function create() {


        return view('admin.discount.themkhuyenmai');
    }

    /*
    *
    *
    * */
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
        ]);

        if ($validator->passes()) {

            // Starting data must be greater than current date
            if (!empty($request->starts_at)) {
                $now = Carbon::now();
                $startAt = Carbon::createFromFormat('Y-m-d', $request->starts_at);

                if ($startAt->lte($now) == true) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['starts_at' => 'Start date can not be less than current time']
                    ]);
                }
            }

            // Expiry date must be greater than start date
            if (!empty($request->starts_at) && !empty($request->expires_at)) {
                $expiresAt = Carbon::createFromFormat('Y-m-d', $request->expires_at);
                $startAt = Carbon::createFromFormat('Y-m-d', $request->starts_at);

                if ($expiresAt->gt($startAt) == false) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['expires_at' => 'Expiry date must be greator than start date']
                    ]);
                }
            }

            $discountCode = new Discount();
            $discountCode->code = $request->code;
            $discountCode->name = $request->name;
            $discountCode->desc = $request->desc;
            $discountCode->max_uses = $request->max_uses;
            $discountCode->max_uses_user	 = $request->max_uses_user	;
            $discountCode->type = $request->type;
            $discountCode->discount_amount = $request->discount_amount;
            $discountCode->min_amount = $request->min_amount;
            $discountCode->status = $request->status;
            $discountCode->starts_at = $request->starts_at;
            $discountCode->expires_at = $request->expires_at;

            $discountCode->save();

            session()->flash('success', "Thêm Mã giảm giá thành công!");

            return response()->json([
                'status' => true,
                'message' => 'Thêm Mã giảm giá thành công!'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /*
    *
    *
    * */
    public function edit($id) {
        $discountDetail = Discount::find($id);

        if ($discountDetail == null) {
            session()->flash('error', 'Record not found');

            return redirect()->route('khuyenmai');
        }

        $data['title'] = "EDIT DISCOUNT";
        $data['coupon'] = $discountDetail;

        return view('admin.discount.capnhatkhuyenmai', $data);
    }

    /*
    *
    *
    * */
    public function update(Request $request, $id) {
        $discountCode = Discount::find($id);

        if ($discountCode == null) {
            session()->flash('error', 'Record not found');

            return response()->json([
                'status' => true,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
        ]);

        if ($validator->passes()) {

            // Starting data must be greater than current date
            if (!empty($request->starts_at)) {
                $now = Carbon::now();
                $startAt = Carbon::createFromFormat('Y-m-d', $request->starts_at);

                if ($startAt->lte($now) == true) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['starts_at' => 'Start date can not be less than current time']
                    ]);
                }
            }

            // Expiry date must be greater than start date
            if (!empty($request->starts_at) && !empty($request->expires_at)) {
                $expiresAt = Carbon::createFromFormat('Y-m-d', $request->expires_at);
                $startAt = Carbon::createFromFormat('Y-m-d', $request->starts_at);

                if ($expiresAt->gt($startAt) == false) {
                    return response()->json([
                        'status' => false,
                        'errors' => ['expires_at' => 'Expiry date must be greator than start date']
                    ]);
                }
            }

            $discountCode->code = $request->code;
            $discountCode->name = $request->name;
            $discountCode->desc = $request->desc;
            $discountCode->max_uses = $request->max_uses;
            $discountCode->max_uses_user	 = $request->max_uses_user	;
            $discountCode->type = $request->type;
            $discountCode->discount_amount = $request->discount_amount;
            $discountCode->min_amount = $request->min_amount;
            $discountCode->status = $request->status;
            $discountCode->starts_at = $request->starts_at;
            $discountCode->expires_at = $request->expires_at;

            $discountCode->save();

            session()->flash('success', "Cập nhật Mã giảm giá thành công!");

            return response()->json([
                'status' => true,
                'message' => 'Cập nhật Mã giảm giá thành công!'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /*
    *
    *
    * */
    public function delete(Request $request, $id) {
        $discountCode = Discount::find($id);

        if ($discountCode == null) {
            session()->flash('error', 'Record not found');

            return response()->json([
                'status' => true,
            ]);
        }

        $discountCode->delete();

        session()->flash('error', 'Discount deleted successfully');

        return response()->json([
            'status' => true,
        ]);
    }
}
