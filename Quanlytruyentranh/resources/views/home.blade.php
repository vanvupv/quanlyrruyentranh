@include('share.head')
<body class="theme-color4 light ltr">

<!-- -->
@include('share.nav')
<!-- -->

<!-- Start Menu -->
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
<!-- End Menu -->

<!-- Start Banner -->
<section class="pt-0 poster-section">
    <div class="poster-image slider-for custome-arrow classic-arrow">
        <div>
            <img src="{{asset("img/banner_truyen/toonder-comics-1.jpg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{asset("img/banner_truyen/dragon-banner.jpeg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
        <div>
            <img src="{{asset("img/banner_truyen/Conan-banner.jpg")}}" class="img-fluid blur-up lazyload" alt="">
        </div>
    </div>
    <div class="slider-nav image-show">
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("img/banner_truyen/toonder-comics-1.jpg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("img/banner_truyen/dragon-banner.jpeg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
        <div>
            <div class="poster-img text-end col-1">
                <img src="{{asset("img/banner_truyen/Conan-banner.jpg")}}" class="img-fluid blur-up lazyload" alt="">
                <div class="overlay-color">
                    <i class="fas fa-plus theme-color"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner -->

<!-- banner section start -->
<section class="ratio2_1 banner-style-2">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="collection-banner p-bottom p-center text-center">
                    <a href="{{route('home.shop')}}" class="banner-img">
                        <img src="{{asset("img/banner_truyen/Conan-1.jpg")}} " class="bg-img blur-up lazyload" alt="">
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
                        <img src="{{asset("img/banner_truyen/Onpiece-1.jpg")}}" class="bg-img blur-up lazyload" alt="">
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
                        <img src="{{asset("img/banner_truyen/Hotaru-1.jpg")}}" class="bg-img blur-up lazyload" alt="">
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
<!-- banner section end -->

<!-- Start Danh Sách Sản Phẩm -->
<section class="ratio_asos overflow-hidden">
    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>DANH SÁCH</h2>
                    <h5 class="theme-color">Truyện Tranh</h5>
                </div>
            </div>
        </div>

        <div class="row g-sm-4 g-3">
            @foreach($sanphams as $sanpham)
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                <img src="{{asset($sanpham->AnhBia)}}"
                                     class="w-100 bg-img blur-up lazyload" alt="">
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
                                <div class="r-price">
                                    <div class="theme-color">{{$sanpham->GiaBan}}</div>
                                </div>
                                <p class="font-light mb-sm-2 mb-0">{{$sanpham->TenSP}}</p>
                                <a href="{{route('home.detail', $sanpham->IDSanPham)}}" class="font-default">
                                    <h5>{!! $sanpham->MoTa !!}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Danh Sách Sản Phẩm -->

<!-- category section start -->
<section class="category-section ratio_40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="title title-2 text-center">
                    <h2>Our Category</h2>
                    <h5 class="text-color">Our collection</h5>
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
                            <img src="{{asset($loaisanpham->AnhBia)}}" class="bg-img blur-up lazyload"
                                 alt="category image">
                            <div class="category-content category-text-1">
                                <h3 class="theme-color" style="color: red !important;">{{$loaisanpham->TenLoai}}</h3>
{{--                                <span class="text-dark">{{$loaisanpham->MoTa}}</span>--}}
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category section end -->

<!-- Start Danh Sach TOP -->
<section class="product-slider overflow-hidden">
    <div>
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="title-3 pb-4 title-border">
                        <h2>Most Popular</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>

                    <div class="product-slider round-arrow">
                        <div>
                            <div class="row g-3">
                                @foreach($sanphams as $sanpham)
                                <div class="col-lg-12 col-md-6 col-12">
                                    <div class="product-image">
                                        <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                            <img src="{{asset($sanpham->AnhBia)}}"
                                                 class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="product-details">
                                            <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                                <h6 class="font-light">{{$sanpham->TenSP}}</h6>
                                                <h3>{!!$sanpham->MoTa!!}</h3>
                                                <h4 class="font-light mt-1"> <span
                                                        class="theme-color">${{$sanpham->GiaBan}}</span>
                                                </h4>
                                                <div class="cart-wrap">
                                                    <ul>
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Buy">
                                                            <a href="javascript:void(0)" class="addtocart-btn"
                                                               data-bs-toggle="modal" data-bs-target="#addtocart">
                                                                <i data-feather="shopping-cart"></i>
                                                            </a>
                                                        </li>

                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Quick View">
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                               data-bs-target="#quick-view">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                        </li>

                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Wishlist">
                                                            <a href="wishlist.php" class="wishlist">
                                                                <i data-feather="heart"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="title-3 pb-4 title-border">
                        <h2>Recent Popular</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>

                    <div class="product-slider round-arrow">
                        <div>
                            <div class="row g-3">
                                @foreach($sanphams as $sanpham)
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="product-image">
                                            <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                                <img src="{{asset($sanpham->AnhBia)}}"
                                                     class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-details">
                                                <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                                    <h6 class="font-light">{{$sanpham->TenSP}}</h6>
                                                    <h3>{!!$sanpham->MoTa!!}</h3>
                                                    <h4 class="font-light mt-1"> <span
                                                            class="theme-color">${{$sanpham->GiaBan}}</span>
                                                    </h4>
                                                    <div class="cart-wrap">
                                                        <ul>
                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Buy">
                                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                                   data-bs-toggle="modal" data-bs-target="#addtocart">
                                                                    <i data-feather="shopping-cart"></i>
                                                                </a>
                                                            </li>

                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Quick View">
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view">
                                                                    <i data-feather="eye"></i>
                                                                </a>
                                                            </li>

                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Wishlist">
                                                                <a href="wishlist.php" class="wishlist">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="title-3 pb-4 title-border">
                        <h2>Most Popular</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>

                    <div class="product-slider round-arrow">
                        <div>
                            <div class="row g-3">
                                @foreach($sanphams as $sanpham)
                                    <div class="col-lg-12 col-md-6 col-12">
                                        <div class="product-image">
                                            <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                                <img src="{{asset($sanpham->AnhBia)}}"
                                                     class="blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-details">
                                                <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                                    <h6 class="font-light">{{$sanpham->TenSP}}</h6>
                                                    <h3>{!!$sanpham->MoTa!!}</h3>
                                                    <h4 class="font-light mt-1"> <span
                                                            class="theme-color">${{$sanpham->GiaBan}}</span>
                                                    </h4>
                                                    <div class="cart-wrap">
                                                        <ul>
                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Buy">
                                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                                   data-bs-toggle="modal" data-bs-target="#addtocart">
                                                                    <i data-feather="shopping-cart"></i>
                                                                </a>
                                                            </li>

                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Quick View">
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                   data-bs-target="#quick-view">
                                                                    <i data-feather="eye"></i>
                                                                </a>
                                                            </li>

                                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Wishlist">
                                                                <a href="wishlist.php" class="wishlist">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Danh Muc Top -->
<style>
    .products-c .bg-size {
        background-position: center 0 !important;
    }
</style>

<!-- Start San Pham Lien Quan -->
<section class="ratio_asos overflow-hidden pb-5">
    <div class="px-0 container-fluid p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Sản Phẩm Mới Nhất</h2>
                    <h5 class="theme-color">Our Collection</h5>
                </div>
            </div>
            <div class="our-product products-c">
                @foreach($sanphammois as $sanpham )
                    <div class="col-xl-2 col-lg-2 col-6">
                        <div class="product-box">
                            <div class="img-wrapper">
                                <a href="{{route('home.detail', $sanpham->IDSanPham)}}">
                                    <img src="{{asset($sanpham->AnhBia)}}"
                                         class="w-100 bg-img blur-up lazyload" alt="">
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
                                    <div class="r-price">
                                        <div class="theme-color">{{$sanpham->GiaBan}}</div>
                                    </div>
                                    <p class="font-light mb-sm-2 mb-0">{{$sanpham->TenSP}}</p>
                                    <a href="{{route('home.detail', $sanpham->IDSanPham)}}" class="font-default">
                                        <h5>{!! $sanpham->MoTa !!}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<div id="qvmodal"></div>
<!-- End San Pham Lien Quan -->



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
                                                    <a href="product/details.html">
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
                                                    <a href="product/details.html">
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
                                                    <a href="product/details.html">
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
                                                    <a href="product/details.html">
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
@include('share.footer')


