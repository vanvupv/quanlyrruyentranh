<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function viewCart() {
        $this->clearSession();

//        $customer = Auth::user();

//        $cartDetail = DB::table('shoppingcart')
//            ->where('identifier', $customer->id)
//            ->where('instance', 'cart')
//            ->first();
//
//        dd($cartDetail, unserialize($cartDetail->content));
//
//        if($cartDetail) {
//            $cartItems = unserialize($cartDetail->content) ?? '';
//        }

        $cartItems = Cart::instance('cart')->content();

        return view('cart', [
            'title' => "giohang",
            'cartItems' => $cartItems,
        ]);
    }

    public function addCart(Request $request) {

        $customer = Auth::user();

        $product = Sanpham::find($request->id);

        Cart::instance('cart')->add($product->id, $product->tensanpham, $request->quantity, $product->giaban)
            ->associate('App\Models\Sanpham');

        Cart::instance('cart')->store($customer->id);

        return redirect()->back()->with('message', 'success ! Items has been added successfully');
    }

    public function updateCart(Request $request) {
        Cart::instance('cart')->update($request->rowID, $request->quantity);

        return redirect()->route('cart');
    }

    public function removeCart(Request $request) {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);

        return redirect()->route('cart');
    }

    public function clearCart() {
        Cart::instance('cart')->destroy();

        return redirect()->route('cart');
    }

    private function clearSession()
    {
        session()->forget('paymentMethod'); //destroy paymentMethod
        session()->forget('shippingMethod'); //destroy shippingMethod
        session()->forget('totalMethod'); //destroy totalMethod
        session()->forget('otherMethod'); //destroy otherMethod
        session()->forget('dataTotal'); //destroy dataTotal
        session()->forget('dataCheckout'); //destroy dataCheckout
        session()->forget('storeCheckout'); //destroy storeCheckout
        session()->forget('dataOrder'); //destroy dataOrder
        session()->forget('arrCartDetail'); //destroy arrCartDetail
        session()->forget('orderID'); //destroy orderID
        session()->forget('shippingAddress'); // shippingAddress
    }
}
