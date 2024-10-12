@include('share.header')

<!-- Error -->
@include('share.nav')
<!-- / Error -->

<!-- Poster Slide -->
<section class="pt-0 poster-section">
    <div class="poster-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="{{asset("assets/images/poster/t1.jpg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{asset("assets/images/poster/t2.jpg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{asset("assets/images/poster/t3.jpg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>

    <div class="slider-nav image-show">
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("assets/images/poster/t1.jpg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("assets/images/poster/t2.jpg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("assets/images/poster/t3.jpg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-contain">
        <div class="banner-left">
            <h4> <span class="theme-color"></span></h4>
            <h1> <span></span></h1>
            <p> <span class="theme-color"></span></p>
            <h2> <span class="theme-color"><del></del></span></h2>
            <p class="poster-details mb-0"></p>
        </div>
    </div>

    <div class="right-side-contain">
        <div class="social-image">
            <h6>Facebook</h6>
        </div>

        <div class="social-image">
            <h6>Instagram</h6>
        </div>

        <div class="social-image">
            <h6>Twitter</h6>
        </div>
    </div>
</section>
<!-- / Poster Slide -->

<!-- Banner -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('home.shop')}}" class="banner-img">
                        <img src="{{asset("assets/images/banner/Conan-1.jpg")}} " class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="bi bi-heart"></i>
                        </a>
                        <span class="font-dark-30">26% <span>OFF</span></span>
                    </div>
                    <a href="{{route('home.shop')}}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">CONAN</h2>
                            <span>BUY ONE GET ONE FREE</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('home.shop')}}" class="banner-img">
                        <img src="{{asset("assets/images/banner/Onpiece-1.jpg")}}" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="bi bi-heart"></i>
                        </a>
                        <span class="font-dark-30">50% <span>OFF</span></span>
                    </div>
                    <a href="{{route('home.shop')}}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">ONE PIECE</h2>
                            <span>New offer 50% off</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('home.shop')}}" class="banner-img">
                        <img src="{{asset("assets/images/banner/Hotaru-1.jpg")}}" class="bg-img blur-up lazyload" alt="">
                    </a>
                    <div class="banner-detail">
                        <a href="javacript:void(0)" class="heart-wishlist">
                            <i class="bi bi-heart"></i>
                        </a>
                        <span class="font-dark-30">36% <span>OFF</span></span>
                    </div>
                    <a href="{{route('home.shop')}}" class="contain-banner">
                        <div class="banner-content with-big">
                            <h2 class="mb-2">HOTARU</h2>
                            <span>BUY ONE GET ONE FREE</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Banner -->

<!-- Top Product -->
<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>SẢN PHẨM BÁN CHẠY</h2>
                    <h5 class="theme-color">Top những sản phẩm được mua nhiều nhất</h5>
                </div>
            </div>
        </div>

        <div class="row g-sm-4 g-3">
            @foreach($sanphams as $sanpham)
                <div class="col-xl-3 col-lg-3 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{route('home.detail', $sanpham->id)}}">
                                <img src="{{asset($sanpham->anhbia)}}"
                                     class="w-100 bg-img blur-up lazyload" alt="{{$sanpham->tensanpham}}">
                            </a>
                            <div class="cart-wrap">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)" class="addtocart-btn">
                                            <i data-feather="shopping-cart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
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

                        <div class="product-style-3 product-style-chair">
                            <div class="product-title d-block mb-0">
                                <p class="font-default mb-sm-2 mb-0">{{$sanpham->tensanpham}}</p>
                                <div class="r-price">
                                    <div class="theme-color">{{$sanpham->giaban}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- / Top Product -->

<!-- Category Slide -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>DANH MỤC SẢN PHẨM</h2>
                    <h5 class="theme-color">Bộ Sưu Tập</h5>
                </div>
            </div>
        </div>

        <div class="row gy-3">
            <div class="col-xxl-2 col-lg-3">
                <div class="category-wrap category-padding category-block theme-bg-color">
                    <div>
                        <h2 class="light-text">Top</h2>
                        <h2 class="top-spacing">Our Top</h2>
                        <span>Categories</span>
                    </div>
                </div>
            </div>
            <div class="col-xxl-10 col-lg-9">
                <div class="category-wrapper category-slider1 white-arrow category-arrow">
                    @foreach($loaisanphams as $loaisanpham)
                    <div>
                        <a href="{{route('home.shop')}}" class="category-wrap category-padding">
                            <img src="{{asset($loaisanpham->anhbia)}}" class="bg-img blur-up lazyload"
                                 alt="{{$loaisanpham->tenloai}}">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color">{{$loaisanpham->tenloai}}</h3>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Category Slide -->

<!-- New Product -->
<section class="ratio_asos overflow-hidden pb-5">
    <div class="px-0 container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2> SẢN PHẨM MỚI NHẤT </h2>
                    <h5 class="theme-color">Những sản phẩm mới nhất được shop nhập về phục vụ tín đồ</h5>
                </div>
            </div>
            <div class="row g-sm-4 g-3">
                @foreach($sanphams as $sanpham)
                    <div class="col-xl-3 col-lg-3 col-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <a href="{{route('home.detail', $sanpham->id)}}">
                                    <img src="{{asset($sanpham->anhbia)}}"
                                         class="w-100 bg-img blur-up lazyload" alt="{{$sanpham->tensanpham}}">
                                </a>
                                <div class="cart-wrap">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)" class="addtocart-btn">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
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

                            <div class="product-style-3 product-style-chair">
                                <div class="product-title d-block mb-0">
                                    <p class="font-default mb-sm-2 mb-0">{{$sanpham->tensanpham}}</p>
                                    <div class="r-price">
                                        <div class="theme-color">{{$sanpham->giaban}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- / New Product -->

@include('share.footer')


