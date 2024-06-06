<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Cart;

class CheckoutController extends Controller
{
    //
    public function index() {
//        dd(session()->all());
//       dd(Cart::content());

//     dd(   Cart::instance('cart')->content());

        $dataCheckout = session('dataCheckout') ?? '';
//        dd($dataCheckout);

        // If cart info empty
        if (!$dataCheckout) {
            return redirect()->route('cart')->with(['error' => 'Gio hang khong co san pham']);
        }

        // Shipping
        // Lay danh sach phuong thuc giao hang

        // Payment
        // Lay danh sach phuong thuc thanh toan

        // Total
        // Lay danh sach tong

        // Shipping address
        // Lay dia chi giao hang mac dinh

        //
        //

        //
        $customer = Auth::user();


        $cartDetail = DB::table('shoppingcart')
            ->where('identifier', $customer->id)
            ->where('instance', 'cart')
            ->first();

        // Chuyển đổi chuỗi serialized về đối tượng gốc
        $content = unserialize($cartDetail->content);

        dd(Cart::instance('cart'));

        dd($content->subtotal());

        session(['cartDetail', $cartDetail]);

               $cart = new Cart(session('cartDetail'));

               dd($cart->subtotal());

        $cartItems = unserialize($cartDetail->content);

        $totalItem = 0;
        foreach ($cartItems as $item) {
            $totalItem += (double) $item->subtotal();
        }

        //Process captcha
        // Ma Capcha xac minh khong phai robot

        return view('checkout', [
            'title' => "Thanh toan",
            'cartItems' => $cartItems,
            'totalItem' => $totalItem,
        ]);
    }

    /*
     * Kiem tra request duoc gui len tu gio hang
     *
     * */
    public function prepareCheckout(Request $request) {
        $data = $request->all();

        //
        $customer = Auth::user()->id;

        // Kiem tra gio hang rong
        $cartDetail = DB::table('shoppingcart')
            ->where('identifier', $customer)
            ->where('instance', 'cart')
            ->first();

        $cartItems = unserialize($cartDetail->content);

        // Kiem tra so luong tung san pham


        //Set session
        session(['dataCheckout' => $cartItems]);

        return redirect()->route('checkout');
    }

    /*
     *
     *
     * */
    public function processCheckout(Request $request) {
        $dataCheckout  = session('dataCheckout') ?? '';
//        dd($dataCheckout);

        // Kiem tra gio hang rong
        if (!$dataCheckout) {
            return redirect()->route('cart')->with(['error' => 'Gio hang rong']);
        }

        $customer = auth()->user();

        // Kiem tra khach hang phai dang nhap
        if (!$customer) {
            return redirect()->route('login');
        }

        $data = request()->all();

        //Set session shippingMethod
        session(['shippingMethod' => request('shippingMethod')]);

        //Set session paymentMethod
        session(['paymentMethod' => request('paymentMethod')]);

        //Set session address process
        session(['address_process' => request('address_process')]);

        //Set session shippingAddressshippingAddress
        session(
            [
                'shippingAddress' => [
                    'first_name'      => request('first_name'),
                    'last_name'       => request('last_name'),
                    'email'           => request('email'),
                    'country'         => request('country'),
                    'address'        => request('address'),
                    'phone'           => request('phone'),
                    'comment'         => request('comment'),
                ],
            ]
        );

        //
        return redirect()->route('checkout.confirm');
    }

    /*
     *
     *
     * */
    public function getCheckoutConfirmFront(Request $request) {
        // Address Shipping
        $shippingAddress = session('shippingAddress') ?? '';

        // Shipping method
        $shippingMethod = session('shippingMethod') ?? '';

        // Payment method
        $paymentMethod = session('paymentMethod') ?? '';

        //

        //
        $data = $request->all();

        //
        return view('checkoutConfirm', [
            'title'              => 'checkout.page_title',
            'cart'               => session('dataCheckout'),
            'paymentMethodData'  => $shippingMethod,
            'shippingMethodData' => $paymentMethod,
            'shippingAddress'    => $shippingAddress,
        ]);
    }

    /*
     *
     *
     * */
    public function onlineCheckout() {
        //
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl =  route('checkout.store');  // "http://127.0.0.1:8000/admin/phieuphat/";
        $vnp_TmnCode = "YSX38442";  //Mã website tại VNPAY
        $vnp_HashSecret = "UFUPVCJHQOHAXNCZZNHKJPKNYGDJZGAH"; //Chuỗi bí mật
        //
        $vnp_TxnRef =  rand(00, 9999);  // $_POST['order_id'] Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
//        $vnp_TxnRef = $_POST['order_id'];
        $vnp_OrderInfo = "Noi dung thanh toan"; // $_POST['order_desc']
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = ((int)$_POST['money']) * 1000;

        dd($vnp_Amount);
        //
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
//        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
//        $vnp_Bill_Email = $_POST['txt_billing_email'];
//        $fullName = trim($_POST['txt_billing_fullname']);
//        if (isset($fullName) && trim($fullName) != '') {
//            $name = explode(' ', $fullName);
//            $vnp_Bill_FirstName = array_shift($name);
//            $vnp_Bill_LastName = array_pop($name);
//        }
//        $vnp_Bill_Address = $_POST['txt_inv_addr1'];
//        $vnp_Bill_City = $_POST['txt_bill_city'];
//        $vnp_Bill_Country = $_POST['txt_bill_country'];
//        $vnp_Bill_State = $_POST['txt_bill_state'];
//        // Invoice
//        $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
//        $vnp_Inv_Email = $_POST['txt_inv_email'];
//        $vnp_Inv_Customer = $_POST['txt_inv_customer'];
//        $vnp_Inv_Address = $_POST['txt_inv_addr1'];
//        $vnp_Inv_Company = $_POST['txt_inv_company'];
//        $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
//        $vnp_Inv_Type = $_POST['cbo_inv_type'];
        //
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

            //
//            "vnp_ExpireDate" => $vnp_ExpireDate,
//            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
//            "vnp_Bill_Email" => $vnp_Bill_Email,
//            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
//            "vnp_Bill_LastName" => $vnp_Bill_LastName,
//            "vnp_Bill_Address" => $vnp_Bill_Address,
//            "vnp_Bill_City" => $vnp_Bill_City,
//            "vnp_Bill_Country" => $vnp_Bill_Country,
//            "vnp_Inv_Phone" => $vnp_Inv_Phone,
//            "vnp_Inv_Email" => $vnp_Inv_Email,
//            "vnp_Inv_Customer" => $vnp_Inv_Customer,
//            "vnp_Inv_Address" => $vnp_Inv_Address,
//            "vnp_Inv_Company" => $vnp_Inv_Company,
//            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
//            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
//        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
//            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
//        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    /*
     *
     *
     *  */
    public function addOrder() {
        $customer = auth()->user();
        $uID = $customer->id ?? 0;

        //if cart empty
        if (count(session('dataCheckout', [])) == 0) {
            return redirect()->route('home');
        }
        // Kiem tra nguoi dung dang nhap
        if ( !$customer) {
            return redirect()->route('login');
        }

        $data = request()->all();
        if (!$data) {
            return redirect()->route('cart');
        } else {
            $shippingAddress = session('shippingAddress') ?? [];
            $paymentMethod   = session('paymentMethod') ?? '';
            $shippingMethod  = session('shippingMethod') ?? '';
            $dataCheckout    = session('dataCheckout') ?? '';
        }

        //
        $dataOrder['manhanvien']     = $uID;
        $dataOrder['makhachhang']     = $uID;
        $dataOrder['tongtien']        = 10000;
        $dataOrder['trangthai']     = 'new';

        //
        $arrCartDetail = [];
        foreach ($dataCheckout as $cartItem) {
            $arrDetail['masanpham']  = $cartItem->id;
            $arrDetail['soluong']         = $cartItem->qty;
            $arrDetail['giatien'] = $cartItem->price * $cartItem->qty;
            $arrCartDetail[]          = $arrDetail;
        }

        //Set session info order
        session(['dataOrder' => $dataOrder]);
        session(['arrCartDetail' => $arrCartDetail]);

        //Create new order
        $newOrder = (new Donhang)->createOrder($dataOrder, $arrCartDetail);

        // Kiem tra don hang da tao thanh cong chua
        if ($newOrder['error'] == 1) {
            return redirect()->route('cart')->with(['error' =>'Tao don hang that bai']);
        }

        // Set session orderID
        session(['orderID' => $newOrder['orderID']]);

        //
        return redirect()->route('order.success')->with(['success', "Tao don hang thanh cong"]);
    }

    public function orderSuccessProcessFront() {

        return view('order-success');
    }
}
