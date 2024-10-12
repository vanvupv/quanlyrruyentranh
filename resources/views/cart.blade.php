@include('share.header')

<!-- Navigation -->
@include('share.nav')
<!-- / Navigation -->

<!-- Breadcrumb -->
@include('share.breadcrumb')
<!-- / Breadcrumb -->

<!-- Cart -->
<section class="cart-section section-b-space">
    <form action="{{route('checkout.prepare')}}" method="POST">
        @csrf
        <div class="container">
            @if($cartItems->count() > 0)
            <div class="row">
                <div class="col-md-10">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">ảnh</th>
                                <th scope="col"> tên sản phẩm </th>
                                <th scope="col"> giá tiền </th>
                                <th scope="col"> số lượng </th>
                                <th scope="col"> Tổng tiền </th>
                                <th scope="col"> action </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="{{route('home.detail', $item->id)}}">
                                        <img src="{{asset($item->model->AnhBia)}}" class="blur-up lazyloaded"
                                             alt="{{ $item->name }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('home.detail', $item->id)}}">{{ $item->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <!-- -->
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
                                            <!-- -->
                                            <input type="number"
                                                   data-id="{{$item->id}}"
                                                   data-rowid="{{$item->rowId}}"
                                                   onchange="updateQuantity(this)"
                                                   class="item-qty form-control stepper-input"
                                                   name="qty-{{$item->rowId}}" value="{{$item->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">${{$item->subtotal()}}</h2>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeItemCart('{{$item->rowId}}')">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-md-5 mt-4">
                        <div class="row">
                            <div class="col-sm-7 col-5 order-1">
                                <div class="left-side-button text-end d-flex d-block justify-content-end">
                                    <a href="javascript:void(0)"
                                       onclick="clearItemCart()"
                                       class="text-decoration-underline theme-color d-block text-capitalize"> Xóa tất cả </a>
                                </div>
                            </div>
                            <div class="col-sm-5 col-7">
                                <div class="left-side-button float-start">
                                    <a href="{{route('home.shop')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                        <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="cart-checkout-section">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 ">
                                <div class="checkout-button">
                                    <a href="{{route("checkout")}}" class="btn btn-solid-default btn fw-bold">
                                        Thanh Toán
                                        <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </form>
</section>
<!-- / Cart -->

<form id="updateCartQty" action="{{route('cart.update')}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" id="rowID" name="rowID">
    <input type="hidden" id="quantity" name="quantity">
</form>

<form id="deleteCart" action="{{route('cart.remove')}}" method="POST">
    @csrf
    @method('delete')
    <input type="hidden" id="rowID_D" name="rowId">
</form>

<form id="clearCart" action="{{route('cart.clear')}}" method="POST">
    @csrf
    @method('delete')
</form>

<script>
    function updateQuantity(qty) {
        $('#rowID').val($(qty).data('rowid'));
        $('#quantity').val($(qty).val());
        $('#updateCartQty').submit();
    }

    function removeItemCart(rowId) {
        $('#rowID_D').val(rowId);
        $('#deleteCart').submit();
    }

    function clearItemCart() {
        $('#clearCart').submit();
    }
</script>

@include('share.footer')

