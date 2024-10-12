@include('share.header')

@include('share.nav')

@include('share.breadcrumb')

<!-- Detail Product -->
<section>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <!-- Slide -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="details-image-vertical black-slide rounded">
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="details-image-1 ratio_asos">
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 data-zoom-image="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 data-zoom-image="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid w-100 image_zoom_cls-2 blur-up lazyload" alt="">
                                        </div>
                                        <div>
                                            <img src="{{asset($sanpham->anhbia)}}"
                                                 data-zoom-image="{{asset($sanpham->anhbia)}}"
                                                 class="img-fluid w-100 image_zoom_cls-3 blur-up lazyload" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Silde -->
                        <!-- Detail Product -->
                        <div class="col-md-6">
                            <div class="cloth-details-size">
                                <div class="details-image-concept">
                                    <h2>{{$sanpham->tensanpham}}</h2>
                                </div>
                                <div class="label-section">
                                    <span class="badge badge-grey-color">#1 Best seller</span>
                                </div>
                                <h3 class="price-detail">{{ number_format($sanpham->giaban) }} <span> đ </span></h3>
                                <div id="selectSize" class="addeffect-section product-description border-product">
                                    <h6 class="product-title product-title-2 d-block">Số lượng</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-danger btn-number" onclick="updateminusQuantity()"  data-type="minus" data-field="quant[1]">
                                                <span class="bi bi-dash"></span>
                                              </button>
                                            </span>
                                            <input type="text" name="quant[1]" id="quantity" class="form-control input-number" value="1"  min="1" max="{{$sanpham->soluong}}">
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-success btn-number" onclick="updateQuantity()" data-type="plus" data-field="quant[1]">
                                                <span class="bi bi-plus"></span>
                                              </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('addtocart').submit();"
                                       id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                        <i class="bi bi-cart"></i>
                                        <span>Add To Cart</span>
                                        <form id="addtocart" method="post"
                                              action="{{ route('cart.store') }}">
                                            @csrf
                                            <input  type="hidden" name="id" value="{{$sanpham->id}}">
                                            <input type="hidden" name="quantity" id="qty" value="1">
                                            <script>
                                                let qtyDetail = $('#quantityInput').val();
                                                    $('#qty').val(qtyDetail);
                                            </script>
                                        </form>
                                    </a>
                                </div>
                                <div class="product_meta">
                                    <span class="sku_wrapper">Mã: <span class="sku">DSMH01300XNH40-1</span></span>
                                    <span class="posted_in">Danh mục: <a href="https://giaythethao.maugiaodien.com/danh-muc/boots/" rel="tag">Boots</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/cao-got/" rel="tag">Cao gót</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/de-bet/" rel="tag">Đế bệt</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/de-go/" rel="tag">Đế gỗ</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/giay-bup-be/" rel="tag">Giày búp bê</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/sneaker/" rel="tag">Sneaker</a>, <a href="https://giaythethao.maugiaodien.com/danh-muc/the-thao/" rel="tag">Thể thao</a></span>
                                </div>
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
                        <!-- / Detail Product -->
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="cloth-review">
                    <!-- Nav Tab -->
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
                    <!-- / Nav Tab -->
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Description -->
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                <div class="row g-3 align-items-start">
                                    <div class="col-lg-8">
                                        <div class="part mt-3">
                                            <h5 class="inner-title mb-2">Mô Tả: </h5>
                                            <p class="font-light">{!! $sanpham->mota !!}</p>

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <img src="{{asset("http://127.0.0.1:8000/img/banner_truyen/onepiece-truyen/one-piece-tap57.gif")}}"
                                             class="img-fluid rounded blur-up lazyload" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Description -->

                        <!-- Specification -->
                        <div class="tab-pane fade" id="speci">
                            <div class="pro mb-4">
                                <div class="table-responsive">
                                    <table class="table table-part">
                                        <tr>
                                            <th>Mã</th>
                                            <td>{{$sanpham->SKU}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tên Truyện</th>
                                            <td>{{$sanpham->tensanpham}}</td>
                                        </tr>
                                        <tr>
                                            <th>Số Lượng</th>
                                            <td>{{$sanpham->soluong}}</td>
                                        </tr>
                                        <tr>
                                            <th>Giá bán</th>
                                            <td>{{$sanpham->giaban}}</td>
                                        </tr>
                                        <tr>
                                            <th>Thể Loại</th>
                                            <td>{{$sanpham->tenloai}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mô Tả</th>
                                            <td>{{$sanpham->mota}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- / Specification -->

                        <!-- Review -->
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
                        <!-- / Review -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Detail Product -->

<!-- Related Product -->
<section class="ratio_asos section-b-space overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-lg-4 mb-3 text-center">SẢN PHẨM LIÊN QUAN</h2>
                @if(!$relatedProducts->isEmpty())
                    <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                        @foreach($relatedProducts as $relatedProduct)
                            <div>
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="front">
                                            <a href="{{route('home.detail', $relatedProduct->id)}}">
                                                <img src="{{asset($relatedProduct->anhbia)}}"
                                                     class="bg-img blur-up lazyload" alt="{{ $relatedProduct->tensanpham }}">
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
                                            <span class="font-default grid-content">{{$relatedProduct->tensanpham}}</span>
                                        </div>
                                        <div class="main-price">
                                            <div class="listing-content">
                                                <span class="font-light">Regular Fit</span>
                                                <p class="font-light">Dolorem nihil quia qui laudantium expedita aut dolor.
                                                    Qui eligendi voluptatem autem ullam et. Voluptas nemo eum nihil aliquam
                                                    eos aperiam. Numquam dolorum veniam non magnam illum odit deleniti.</p>
                                            </div>
                                            <h3 class="theme-color">{{ number_format($relatedProduct->giaban) }}</h3>
                                            <button onclick="location.href = 'cart.html';" class="btn listing-content">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                @else
                    <div class="text-center">
                        Không tìm thấy sản phẩm liên quan
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- / Related Product -->

@include('share.footer')

<script>
    function updateQuantity() {
        $("#quantity").val(parseInt($("#quantity").val()) + 1);
        $("#qty").val(parseInt($("#quantity").val()) + 1);
    }

    function updateminusQuantity() {
        $("#quantity").val(parseInt($("#quantity").val()) - 1);

        $("#qty").val(parseInt($("#quantity").val()) - 1);
    }

</script>

