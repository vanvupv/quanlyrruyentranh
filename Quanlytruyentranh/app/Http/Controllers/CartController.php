<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use DB;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    public function viewCart() {
        $cartItems = Cart::instance('cart')->content();

        return view('cart',
        [
            'title' => "giohang",
            'cartItems' => $cartItems,
        ]);
    }

    public function addCart(Request $request) {
        dd($request);
        $product = Sanpham::find($request->id);
        Cart::instance('cart')->add($product->IDSanPham, $product->TenSP,
            $request->quantity, $product->GiaBan)->associate('App\Models\Sanpham');
        return redirect()->back()->with('message', 'success ! Items has been added successfully');
    }

    public function updateCart(Request $request) {
//        dd($request);
        Cart::instance('cart')->update($request->rowID, $request->quantity);
        return redirect()->route('cart');
    }

    public function removeCart(Request $request) {
//        dd($request);
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart');
    }

    public function clearCart() {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart');
    }
}
