@include('share.header')

    <body class="theme-color4 light ltr">
    <!-- Start Navigation -->
    @include('share.nav')

    <!-- Start Breadcrumb -->
    @include('share.breadcrumb')

    <!-- Start Cart -->
    <section class="cart-section section-b-space">
        <form action="{{route('checkout.prepare')}}" method="POST">
            @csrf
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
                            <th scope="col"> action </th>
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
                </div>
                <div class="col-12 mt-md-5 mt-4">
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

                <div class="cart-checkout-section">
                    <div class="row g-4">
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
            <input type="submit" value="Thanh toan" class="btn btn-warning" >
        </form>
    </section>

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

    <div class="modal fade newletter-modal" id="newsletter">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <img src="assets/images/newletter-icon.png" class="img-fluid blur-up lazyload" alt="">
                    <div class="modal-title">
                        <h2 class="tt-title">Sign up for our Newsletter!</h2>
                        <p class="font-light">Never miss any new updates or products we reveal, stay up to date.</p>
                        <p class="font-light">Oh, and it's free!</p>

                        <div class="input-group mb-3">
                            <input placeholder="Email" class="form-control" type="text">
                        </div>

                        <div class="cancel-button text-center">
                            <button class="btn default-theme w-100" data-bs-dismiss="modal"
                                    type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-label="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="modal-contain">
                        <div>
                            <div class="modal-messages">
                                <i class="fas fa-check"></i> 3-stripes full-zip hoodie successfully added to
                                you cart.
                            </div>
                            <div class="modal-product">
                                <div class="modal-contain-img">
                                    <img src="assets/images/fashion/instagram/4.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </div>
                                <div class="modal-contain-details">
                                    <h4>Premier Cropped Skinny Jean</h4>
                                    <p class="font-light my-2">Yellow, Qty : 3</p>
                                    <div class="product-total">
                                        <h5>TOTAL : <span>$1,140.00</span></h5>
                                    </div>
                                    <div class="shop-cart-button mt-3">
                                        <a href="shop-left-sidebar.php"
                                           class="btn default-light-theme conti-button default-theme default-theme-2 rounded">CONTINUE
                                            SHOPPING</a>
                                        <a href="cart.php"
                                           class="btn default-light-theme conti-button default-theme default-theme-2 rounded">VIEW
                                            CART</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_asos mt-4">
                        <div class="container">
                            <div class="row m-0">
                                <div class="col-sm-12 p-0">
                                    <div
                                        class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space spacing-slider">
                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/1.jpg"
                                                                 class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/2.jpg"
                                                                 class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/3.jpg"
                                                                 class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="details.php">
                                                            <img src="assets/images/fashion/product/front/4.jpg"
                                                                 class="bg-img blur-up lazyload" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <div class="rating-details d-block text-center">
                                                        <span class="font-light grid-content">B&Y Jacket</span>
                                                    </div>
                                                    <div class="main-price mt-0 d-block text-center">
                                                        <h3 class="theme-color">$78.00</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <div class="bg-overlay"></div>

    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });

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

