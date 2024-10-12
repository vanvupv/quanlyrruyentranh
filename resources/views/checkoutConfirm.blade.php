@include('share.header')

<!-- Navigation -->
@include('share.nav')
<!-- / Navigation -->

<!-- Breadcrumb -->
@include('share.breadcrumb')
<!-- / Breadcrumb -->

<!-- Confirm Checkout -->
<section class="cart-section section-b-space">
    <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="sc-shipping-address" id="form-order" role="form" method="POST"
                          action={{route('order.add')}}>
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                                    Shipping address:<br></h3>
                                <table class="table box table-bordered" id="showTotal">
                                    <tbody>
                                    <tr>
                                        <th>Name:
                                        </th>
                                        <td>{{$shippingAddress['first_name']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:
                                        </th>
                                        <td>{{$shippingAddress['phone']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:
                                        </th>
                                        <td>{{$shippingAddress['email']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:
                                        </th>
                                        <td>{{$shippingAddress['address']}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Note:
                                        </th>
                                        <td>chung ta</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <h3 class="control-label"><br></h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table box table-bordered" id="showTotal">
                                            <tbody>
                                            <tr class="showTotal">
                                                <th>SubTotal</th>
                                                <td style="text-align: right" id="subtotal">
                                                    $50
                                                </td>
                                            </tr>
                                            <tr class="showTotal">
                                                <th>Tax</th>
                                                <td style="text-align: right" id="tax">
                                                    $5
                                                </td>
                                            </tr>
                                            <tr class="showTotal">
                                                <th>Shipping Standard</th>
                                                <td style="text-align: right" id="shipping">
                                                    $20
                                                </td>
                                            </tr>
                                            <tr class="showTotal" style="background:#f5f3f3;font-weight: bold;">
                                                <th>Total</th>
                                                <td style="text-align: right" id="total">
                                                    $75
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h3 class="control-label"><i class="fas fa-credit-card"></i>
                                                        Payment method:<br></h3>
                                                    <label for="">{{$shippingMethodData}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <label class="radio-inline">
                                                            <img title="Bank transfer" alt="Bank transfer"
                                                                 src="https://demo.s-cart.org/Plugins/Payment/BankTransfer/images/logo.png"
                                                                 style="width: 120px;">
                                                        </label>
                                                        <div>{{$paymentMethodData}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="padding-bottom: 20px;">
                                    <div class="col-md-12 text-center">
                                        <div class="pull-left">
                                            <button onclick="location.href=' https://demo.s-cart.org/cart.html '" style=""
                                                    class=" button button-lg " type="button"><i class="fa fa-arrow-left"></i>Back to
                                                cart</button>
                                        </div>
                                        <div class="pull-right">
                                            <button style="" class=" button button-lg  button-secondary" type="submit"><i
                                                    class="fa fa-check"></i>Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</section>
<!-- / Confirm Checkout -->

@include('share.footer')

