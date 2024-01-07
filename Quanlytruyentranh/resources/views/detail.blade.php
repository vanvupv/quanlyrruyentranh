@include('share.head')
<body class="theme-color4 light ltr">

<!-- Start Header -->
@include('share.nav')
<!-- End Header -->

<!--  -->
<div class="mobile-menu d-sm-none">
    <ul>
        <li>
            <a href="demo3.php" class="active">
                <i data-feather="home"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="align-justify"></i>
                <span>Category</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="shopping-bag"></i>
                <span>Cart</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i data-feather="heart"></i>
                <span>Wishlist</span>
            </a>
        </li>
        <li>
            <a href="user-dashboard.php">
                <i data-feather="user"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>

<!-- Start Header -->
@include('share.breadcrumb')
<!-- End Header -->

<!-- Start Chi Tiet San Pham -->
<section>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <!-- Start Slide Ảnh -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="details-image-vertical black-slide rounded">
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-98.jpg")}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-97.jpg")}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-55.jpg")}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <div class="details-image-1 ratio_asos">
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-98.jpg")}}"
                                                 data-zoom-image="{{asset("img/banner_truyen/conan-truyen/conan-tap-98.jpg")}}"
                                                 class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-97.jpg")}}"
                                                 data-zoom-image="{{asset("img/banner_truyen/conan-truyen/conan-tap-97.jpg")}}"
                                                 class="img-fluid w-100 image_zoom_cls-2 blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-55.jpg")}}"
                                                 data-zoom-image="{{asset("img/banner_truyen/conan-truyen/conan-tap-55.jpg")}}"
                                                 class="img-fluid w-100 image_zoom_cls-3 blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slide Ảnh -->

                        <!-- Start Chi Tiết Sản Phẩm -->
                        <div class="col-md-6">
                            <div class="cloth-details-size">
                                <div class="product-count">
                                    <ul>
                                        <li>
                                            <span class="p-counter">37</span>
                                            <span class="lang">orders in last 24 hours</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="details-image-concept">
                                    <h2>{{$sanpham->TenSP}}</h2>
                                </div>

                                <div class="label-section">
                                    <span class="badge badge-grey-color">#1 Best seller</span>
                                </div>

                                <h3 class="price-detail">{{ number_format($sanpham->GiaBan) }}</h3>

                                <div id="selectSize" class="addeffect-section product-description border-product">
                                    <h6 class="product-title product-title-2 d-block">quantity</h6>
                                    <!-- Start Số Lượng -->
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant[1]"

                                              >
                                                <span class="bi bi-dash"></span>
                                              </button>
                                            </span>
                                            <input type="text" name="quant[1]" id="quantityInput" class="form-control input-number" value="1"  min="1" max="{{$sanpham->SoLuong}}"

                                            >
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[1]"

                                              >
                                                <span class="bi bi-plus"></span>
                                              </button>
                                            </span>
                                        </div>
                                    <!-- End Số Lượng -->
                                </div>
                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
{{--                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}
                                <script>
                                    $(document).ready(function () {
                                        // Lấy các nút tăng/giảm số lượng
                                        const decreaseButton = $('.btn-number[data-type="minus"]');
                                        const increaseButton = $('.btn-number[data-type="plus"]');

                                        // Lắng nghe sự kiện click trên nút giảm
                                        decreaseButton.on('click', function () {
                                            updateQuantity('minus');
                                        });

                                        // Lắng nghe sự kiện click trên nút tăng
                                        increaseButton.on('click', function () {
                                            updateQuantity('plus');
                                        });

                                        // Lắng nghe sự kiện submit của form
                                        $('#addtocart').on('submit', function (event) {
                                            event.preventDefault(); // Ngăn chặn form submit mặc định
                                            console.log('Submitted Quantity:', quantityInput.val());
                                        });

                                    });

                                    function updateQuantity(type) {
                                        const quantityInput = $('#quantityInput');
                                        let quantity = parseInt(quantityInput.val());

                                        if (type === 'plus') {
                                            quantity += 1;
                                        } else if (type === 'minus' && quantity > 1) {
                                            quantity -= 1;
                                        }

                                        quantityInput.val(quantity);
                                        console.log('Updated Quantity:', quantity);
                                        return quantityl;
                                        // Bạn có thể thực hiện các thao tác khác hoặc gửi giá trị cập nhật đến máy chủ nếu cần.
                                    }
                                </script>
{{--                                <script>--}}
{{--                                    function updateQty(type) {--}}
{{--                                        event.preventDefault();--}}
{{--                                        let dem = 0;--}}
{{--                                        const quantityField = document.getElementById('quantity');--}}
{{--                                        console.log(">>>Check: ", quantityField);--}}
{{--                                        let quantity = parseInt(quantityField.value);--}}
{{--                                        console.log(">>>Check quantity: ", quantity);--}}

{{--                                        if (type === 'plus') {--}}
{{--                                            quantity += 1;--}}
{{--                                            dem = dem + 1;--}}
{{--                                            console.log("Check update: ", quantity);--}}
{{--                                        } else if (type === 'minus' && quantity > 1) {--}}
{{--                                            quantity -= 1;--}}
{{--                                        }--}}

{{--                                        // quantityField.value = quantity;--}}
{{--                                        // You can perform additional logic or send the updated quantity to the server if needed.--}}
{{--                                    }--}}
{{--                                </script>--}}

                                <div class="product-buttons">
                                    <a href="javascript:void(0)" class="btn btn-solid">
                                        <i class="bi bi-bookmark fz-16 me-2"></i>
                                        <span>Wishlist</span>
                                    </a>
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('addtocart').submit();"
                                       id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                        <i class="bi bi-cart"></i>
                                        <span>Add To Cart</span>
                                        <form id="addtocart" method="post"
                                              action="{{ route('cart.store') }}">
                                            @csrf
                                            <input  type="hidden" name="id" value="{{$sanpham->IDSanPham}}">
                                            <input type="hidden" name="quantity" id="qty" value="" />
                                            <script>
                                                // Sử dụng JavaScript để đặt giá trị vào trường input ẩn
                                                // let qtyDetail = document.getElementById('quantityInput').value;
                                                // document.getElementById('qty').value = qtyDetail;
                                                let qtyDetail = $('#quantityInput').val();
                                                    $('#qty').val(qtyDetail);
                                            </script>

                                        </form>
                                    </a>
                                </div>

                                <ul class="product-count shipping-order">
                                    <li>
                                        <img src=" {{ asset("images/truck.png") }}" class="img-fluid blur-up lazyload"
                                             alt="image">
                                        <span class="lang">Free shipping for orders</span>
                                    </li>
                                </ul>

                                <div class="border-product">
                                    <h6 class="product-title d-block">share it</h6>
                                    <div class="product-icon">
                                        <ul class="product-social">
                                            <li>
                                                <a href="https://www.facebook.com/">
                                                    <i class="bi bi-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.google.com/">
                                                    <i class="bi bi-google"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/">
                                                    <i class="bi bi-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/">
                                                    <i class="bi bi-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="pe-0">
                                                <a href="https://www.google.com/">
                                                    <i class="bi bi-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Chi Tiết Sản Phẩm -->
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="cloth-review">
                    <!-- Start Menu -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Description</button>

                            <button class="nav-link" id="nav-speci-tab" data-bs-toggle="tab" data-bs-target="#speci"
                                    type="button">Specifications</button>

                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#review" type="button">Review</button>
                        </div>
                    </nav>
                    <!-- End Menu -->

                    <div class="tab-content" id="nav-tabContent">
                        <!-- Start Description -->
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                <div class="row g-3 align-items-start">
                                    <div class="col-lg-8">
                                        <div class="part mt-3">
                                            <h5 class="inner-title mb-2">Mô Tả: </h5>
                                            <p class="font-light">{!! $sanpham->MoTa !!}</p>

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <img src="{{asset("http://127.0.0.1:8000/img/banner_truyen/onepiece-truyen/one-piece-tap57.gif")}}"
                                             class="img-fluid rounded blur-up lazyload" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Description -->

                        <!-- Start Specification -->
                        <div class="tab-pane fade" id="speci">
                            <div class="pro mb-4">
                                <div class="table-responsive">
                                    <table class="table table-part">
                                        <tr>
                                            <th>Mã Truyện</th>
                                            <td>{{$sanpham->MaSP}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tên Truyện</th>
                                            <td>{{$sanpham->TenSP}}</td>
                                        </tr>
                                        <tr>
                                            <th>Số Lượng</th>
                                            <td>{{$sanpham->SoLuong}}</td>
                                        </tr>
                                        <tr>
                                            <th>Thể Loại</th>
                                            <td>{{$sanpham->TenLoai}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mô Tả</th>
                                            <td>{{$sanpham->MoTa}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End Specification -->

                        <!-- Start Review -->
                        <div class="tab-pane fade" id="review">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="customer-rating">
                                        <h2>Customer reviews</h2>
                                        <ul class="rating my-2 d-inline-block">
                                            <li>
                                                <i class="bi bi-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="bi bi-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="bi bi-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="bi bi-star"></i>
                                            </li>
                                            <li>
                                                <i class="bi bi-star"></i>
                                            </li>
                                        </ul>

                                        <div class="global-rating">
                                            <h5 class="font-light">82 Ratings</h5>
                                        </div>

                                        <ul class="rating-progess">
                                            <li>
                                                <h5 class="me-3">5 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 78%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <h5 class="ms-3">78%</h5>
                                            </li>
                                            <li>
                                                <h5 class="me-3">4 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 62%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <h5 class="ms-3">62%</h5>
                                            </li>
                                            <li>
                                                <h5 class="me-3">3 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 44%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <h5 class="ms-3">44%</h5>
                                            </li>
                                            <li>
                                                <h5 class="me-3">2 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 30%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <h5 class="ms-3">30%</h5>
                                            </li>
                                            <li>
                                                <h5 class="me-3">1 Star</h5>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 18%"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                                <h5 class="ms-3">18%</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <p class="d-inline-block me-2">Rating</p>
                                    <ul class="rating mb-3 d-inline-block">
                                        <li>
                                            <i class="bi bi-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="bi bi-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="bi bi-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="bi bi-star"></i>
                                        </li>
                                        <li>
                                            <i class="bi bi-star"></i>
                                        </li>
                                    </ul>
                                    <div class="review-box">
                                        <form class="row g-4">
                                            <div class="col-12 col-md-6">
                                                <label class="mb-1" for="name">Name</label>
                                                <input type="text" class="form-control" id="name"
                                                       placeholder="Enter your name" required="">
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label class="mb-1" for="id">Email Address</label>
                                                <input type="email" class="form-control" id="id"
                                                       placeholder="Email Address" required="">
                                            </div>

                                            <div class="col-12">
                                                <label class="mb-1" for="comments">Comments</label>
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                          id="comments" style="height: 100px" required=""></textarea>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit"
                                                        class="btn default-light-theme default-theme default-theme-2">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="customer-review-box">
                                        <h4>Customer Reviews</h4>

                                        <div class="customer-section">
                                            <div class="customer-profile">
                                                <img src="../assets/images/inner-page/review-image/1.jpg"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </div>

                                            <div class="customer-details">
                                                <h5>Mike K</h5>
                                                <ul class="rating my-2 d-inline-block">
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="font-light">I purchased my Tab S2 at Best Buy but I wanted
                                                    to
                                                    share my thoughts on Amazon. I'm not going to go over specs and
                                                    such
                                                    since you can read those in a hundred other places. Though I
                                                    will
                                                    say that the "new" version is preloaded with Marshmallow and now
                                                    uses a Qualcomm octacore processor in place of the Exynos that
                                                    shipped with the first gen.</p>

                                                <p class="date-custo font-light">- Sep 08, 2021</p>
                                            </div>
                                        </div>

                                        <div class="customer-section">
                                            <div class="customer-profile">
                                                <img src="../assets/images/inner-page/review-image/2.jpg"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </div>

                                            <div class="customer-details">
                                                <h5>Norwalker</h5>
                                                <ul class="rating my-2 d-inline-block">
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="font-light">Pros: Nice large(9.7") screen. Bright colors.
                                                    Easy
                                                    to setup and get started. Arrived on time. Cons: a bit slow on
                                                    response, but expected as tablet is 2 generations old. But works
                                                    fine and good value for the money.</p>

                                                <p class="date-custo font-light">- Sep 08, 2021</p>
                                            </div>
                                        </div>

                                        <div class="customer-section">
                                            <div class="customer-profile">
                                                <img src="../assets/images/inner-page/review-image/3.jpg"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </div>

                                            <div class="customer-details">
                                                <h5>B. Perdue</h5>
                                                <ul class="rating my-2 d-inline-block">
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="font-light">Love the processor speed and the sensitivity
                                                    of
                                                    the touch screen.</p>

                                                <p class="date-custo font-light">- Sep 08, 2021</p>
                                            </div>
                                        </div>

                                        <div class="customer-section">
                                            <div class="customer-profile">
                                                <img src="../assets/images/inner-page/review-image/4.jpg"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </div>

                                            <div class="customer-details">
                                                <h5>MSL</h5>
                                                <ul class="rating my-2 d-inline-block">
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star theme-color"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                    <li>
                                                        <i class="bi bi-star"></i>
                                                    </li>
                                                </ul>
                                                <p class="font-light">I purchased the Tablet May 2017 and now April
                                                    2019
                                                    I have to charge it everyday. I don't watch movies on it..just
                                                    play
                                                    a game or two while on lunch. I guess now I need to power it
                                                    down
                                                    for future use.</p>

                                                <p class="date-custo font-light">- Sep 08, 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Review -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section end -->

<!-- product section start -->
<section class="ratio_asos section-b-space overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-lg-4 mb-3">Sản Phẩm Liên Quan</h2>
                <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                    <!-- Start Sản Phẩm Liên Quan -->
                    @foreach($relatedProducts as $relatedProduct)
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{route('home.detail', $relatedProduct->IDSanPham)}}">
                                        <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-98.jpg")}}"
                                             class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="back">
                                    <a href="{{route('home.detail', $relatedProduct->IDSanPham)}}">
                                        <img src="{{asset("img/banner_truyen/conan-truyen/conan-tap-98.jpg")}}"
                                             class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="cart-wrap">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class="addtocart-btn"
                                               data-bs-toggle="modal" data-bs-target="#addtocart">
                                                <i data-feather="shopping-bag"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#quick-view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{$relatedProduct->TenSP}}</span>
                                </div>
                                <div class="main-price">
                                    <a href="{{route('home.detail', $relatedProduct->IDSanPham)}}" class="font-default">
                                        <h5>{{ $relatedProduct->TenLoai }}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">Regular Fit</span>
                                        <p class="font-light">Dolorem nihil quia qui laudantium expedita aut dolor.
                                            Qui eligendi voluptatem autem ullam et. Voluptas nemo eum nihil aliquam
                                            eos aperiam. Numquam dolorum veniam non magnam illum odit deleniti.</p>
                                    </div>
                                    <h3 class="theme-color">{{ number_format($relatedProduct->GiaBan) }}</h3>
                                    <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                        To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Sản Phẩm Liên Quan -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->

<!-- Start -->
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

<div class="tap-to-top">
    <a href="#home">
        <i class="bi bi-chevron-up"></i>
    </a>
</div>

<div class="bg-overlay"></div>
<!-- End -->

@include('share.footer')
