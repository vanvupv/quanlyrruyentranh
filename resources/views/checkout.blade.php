@include('share.header')

<!-- Navigation -->
@include('share.nav')
<!-- / Navigation -->

<!-- Breadcrumb -->
@include('share.breadcrumb')
<!-- / Breadcrumb -->

<!-- Check Out -->
<section class="cart-section section-b-space">
    <div class="container">
        @if($cartItems->count() > 0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">ảnh</th>
                            <th scope="col"> tên sản phẩm </th>
                            <th scope="col"> giá tiền </th>
                            <th scope="col"> số lượng </th>
                            <th scope="col"> Tổng tiền </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="{{route('home.detail',$item->id)}}">
                                        <img src="{{asset($item->model->AnhBia)}}" class="blur-up lazyloaded"
                                             alt="{{ $item->name }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('home.detail', '1')}}">{{ $item->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                           value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>${{$item->price}}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{$item->price}}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            {{ $item->qty }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">${{$item->subtotal()}}</h2>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <form class="sc-shipping-address" id="sc_form-process" role="form" method="POST"
                  action="{{route('checkout.process')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless table-responsive">
                            <tbody>
                            <tr width="100%">
                                <td class="form-group">
                                    <label class="control-label"><i class="fa fa-user"></i>
                                        Name:</label>
                                    <input class="form-control" name="customer_name" type="text" placeholder="Name" value="">
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
                        <div class="shipping-method">
                            <div class="form-group ">
                                <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                                    Shipping method:<br></h3>
                            </div>
                            <div class="form-group">
                                @if($shippings->isNotEmpty())
                                    @foreach($shippings as $item)
                                        <div>
                                            <label class="radio-inline">
                                                <input type="radio" name="shipping-method" value="{{ $item->id }}"
                                                       style="position: relative;" class="radio-custom"><span
                                                    class="radio-custom-dummy"></span>
                                                <span for=" {{ $item->id }}"> {{ $item->name_shipping }} </span>
                                                <span for=" {{ $item->id }}"> {{ $item->price }} </span>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="coupon">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="inputGroupSuccess3">
                                            <i class="fa fa-exchange" aria-hidden="true"></i> Coupon
                                            <span style="display:inline; cursor: pointer; display: none"
                                                  class="text-danger" id="removeCoupon">(Remove coupon
                                                <i class="fa fa fa-times"></i>)
                                            </span>
                                        </label>
                                        <div id="coupon-group" class="input-group ">
                                            <input type="text" placeholder="Your coupon" class="form-control"
                                                   id="discount_code" name="discount_code" aria-describedby="inputGroupSuccess3Status">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="coupon-button" style="cursor: pointer;" data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking">Apply</span>
                                            </div>
                                        </div>
                                        <!-- -->
                                        @if (Session::has('code'))
                                            <div class="input-group mt-4" id="discount-response">
                                                <strong> {{ Session::get('code')->code }}</strong>
                                                <a class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times" id="remove-discount"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method">
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

                        <div class="total-table">
                            <table class="table box table-bordered" id="sc_showTotal">
                                <tbody>
                                <tr class="sc_showTotal">
                                    <th>SubTotal</th>
                                    <td style="text-align: right" id="subtotal">
                                        {{ Cart::instance('cart')->subtotal() }}
                                    </td>
                                </tr>
                                <tr class="sc_showTotal">
                                    <th>Tax</th>
                                    <td style="text-align: right" id="tax">
                                        {{ Cart::instance('cart')->tax() }}
                                    </td>
                                </tr>
                                <tr class="sc_showTotal">
                                    <th>Shipping</th>
                                    <td id="shipping">

                                    </td>
                                </tr>
                                <tr class="sc_showTotal">
                                    <th>Discount</th>
                                    <td id="discount">
                                        {{ $discount }}
                                    </td>
                                </tr>
                                <tr class="sc_showTotal" style="background:#f5f3f3;font-weight: bold;">
                                    <th>Total</th>
                                    <td style="text-align: right" id="total">
                                        {{ $total }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="pull-right">
                            <input type="submit" value="Check Out" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </form>

            <form  action="{{route('checkout')}}" method="post">
                <input type="hidden" name="order_id" value="">
                <input type="hidden" name="money" value="{{Cart::instance('cart')->total()}}">
                <button type="submit" name="redirect" class="btn btn-success"> Thanh toán VNPay </button>
                @csrf
            </form>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Giỏ hàng của bạn đang rỗng!</h2>
                    <h5 class="mt-3">Thêm sản phẩm vào bây giờ</h5>
                    <a href="{{route('home.shop')}}" class="btn btn-warning mt-5">Cửa Hàng</a>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- / Check Out -->

@include('share.footer')

<script>
    $(document).ready(function () {
        // Shipping Logic
        $('input[name="shipping-method"]').on('change', function () {
            var value = $(this).val();

            $.ajax({
                url: `{{ route('checkout.shipping') }}`,
                type : 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                   id: value
                },

                success: function (response) {
                    if (response.status == true) {
                        var shipping_price = $('.total-table #shipping').text(response.data);
                        var discount_price = $('.total-table #discount').text(response.discount);
                        var total = $('.total-table #total').text(response.total);
                    }
                }
            });
        });

        // Coupon Logic
        $('#coupon-button').on('click', function () {
            var code = $('#discount_code').val();

            $.ajax({
                url: `{{ route('checkout.coupon') }}`,
                type : 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    code: code
                },
                dataType: 'json',
                success: function (response) {
                    if (response.status == true) {
                        var discount_price = $('.total-table #discount').text(response.discount);
                        var total = $('.total-table #total').text(response.total);

                        //
                        $('#discount-response').html(response.discountHtml);
                    } else {
                        $('#discount-response').html("<span class='text-danger'>"+response.message+"</span>");
                    }
                }
            });
        });

        // Coupon Remove
        $('body').on('click', "#remove-discount", function () {
            $.ajax({
                url: `{{ route('checkout.removeCoupon') }}`,
                type : 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {},
                dataType: 'json',
                success: function (response) {
                    if (response.status == true) {
                        var discount_price = $('.total-table #discount').text(response.discount);
                        var total = $('.total-table #total').text(response.total);

                        //
                        $('#discount-response').html(response.discountHtml);
                    }
                }
            });
        })
    });
</script>
