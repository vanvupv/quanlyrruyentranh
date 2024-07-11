@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{session('message')}}
        </div>
    @endif

    <!-- -->
    <form action={{route('order.product_info')}} id="addProduct" name="addProduct">
        <div class="addProdcut">
            <select name="addProduct" id="addProductSelect">
                <option value=""></option>
                @foreach($sanphams as $ind => $item)
                    <option value={{$item->id}}> {{$item->tensanpham}} </option>
                @endforeach
            </select>
        </div>
    </form>

    <form id="productDetail" name="productDetail" method="POST" action={{route('order.prepareCheckout')}}>
        @csrf
        <!-- -->
        <input type="hidden" name="listProduct" value="">
        <table class="table">
            <thead>
            <th>STT</th>
            <th>Ma san pham</th>
            <th>Ten san pham</th>
            <th>So luong</th>
            <th>Gia ban</th>
            <th>Tong tien</th>
            <th>Action</th>
            </thead>
            <tbody class="listProduct_content">
            <!-- -->
            </tbody>
        </table>
        <div class="mb-5">
            <hr>
        </div>
        <table class="table box table-bordered" id="sc_showTotal">
            <tbody>
            <tr class="sc_showTotal">
                <th>SubTotal</th>
                <td style="text-align: right" id="subtotal">
                    .VND
                </td>
            </tr>
            <tr class="sc_showTotal">
                <th>Tax</th>
                <td style="text-align: right" id="tax">
                    .VND
                </td>
            </tr>
            <tr class="sc_showTotal" style="background:#f5f3f3;font-weight: bold;">
                <th>Total</th>
                <td style="text-align: right" id="total">
                     .VND
                </td>
            </tr>
            </tbody>
        </table>
        <!-- -->
        <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-responsive">
                        <tbody>
                        <tr width="100%">
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-user"></i>
                                    First name:</label>
                                <input class="form-control" name="first_name" type="text" placeholder="First name" value="">
                            </td>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-user"></i>
                                    Last name:</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Last name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-envelope"></i>
                                    Email:</label>
                                <input class="form-control" name="email" type="text" placeholder="Email" value="">
                            </td>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> Phone:</label>
                                <input class="form-control" name="phone" type="text" placeholder="Phone" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="form-group">
                                <label for="country" class="control-label"><i class="fas fa-globe"></i>
                                    Country:</label>
                                <select class="form-control country " style="width: 100%;" name="country">
                                    <option value="">__Country__</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td colspan="2" class="form-group ">
                                <label for="address1" class="control-label"><i class="fa fa-list-ul"></i>
                                    Address:</label>
                                <input class="form-control" name="address" type="text" placeholder="Address " value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="control-label"><i class="fa fa-calendar-o"></i>
                                    Note:</label>
                                <textarea class="form-control" rows="5" name="comment" placeholder="Note...."></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange"
                                                                                                 aria-hidden="true"></i> Coupon
                                            <span style="display:inline; cursor: pointer; display: none"
                                                  class="text-danger" id="removeCoupon">(Remove coupon <i
                                                    class="fa fa fa-times"></i>)</span>
                                        </label>
                                        <div id="coupon-group" class="input-group ">
                                            <input type="text" placeholder="Your coupon" class="form-control"
                                                   id="coupon-value" aria-describedby="inputGroupSuccess3Status">
                                            <div class="input-group-prepend">
                                        <span class="input-group-text " id="coupon-button"
                                              style="cursor: pointer;"
                                              data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking">Apply</span>
                                            </div>
                                        </div>
                                        <span class="status-coupon" style="display: none;" aria-hidden="true"></span>
                                        <div class="coupon-msg  " style="text-align: left;padding-left: 10px; "></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                                    Shipping method:<br></h3>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="shippingMethod" value="ShippingStandard"
                                               style="position: relative;" class="radio-custom"><span
                                            class="radio-custom-dummy"></span>
                                        <span for="shippingMethod">Shipping Standard</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ">
                                <h3 class="control-label"><i class="fa fa-credit-card-alt"></i>
                                    Payment method:<br></h3>
                            </div>
                            <div class="form-group cart-payment-method">
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="paymentMethod" value="Cash"
                                               style="position: relative;" class="radio-custom"><span
                                            class="radio-custom-dummy"></span>
                                        <span class="radio-inline" for="paymentMethod">
                                    <img title="Cash on delivery" alt="Cash on delivery"
                                         src="https://demo.s-cart.org/Plugins/Payment/Cash/images/logo.png">
                                </span>
                                    </label>
                                </div>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="paymentMethod" value="BankTransfer"
                                               style="position: relative;" class="radio-custom"><span
                                            class="radio-custom-dummy"></span>
                                        <span class="radio-inline" for="paymentMethod">
                                    <img title="Bank transfer" alt="Bank transfer"
                                         src="https://demo.s-cart.org/Plugins/Payment/BankTransfer/images/logo.png">
                                </span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        Bank name: ABC XYZ<br>Bank number: 12345678
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       <!-- -->
        <input type="submit" class="btn btn-warning" value="Xác nhận">
    </form>
    <!-- -->
@endsection
