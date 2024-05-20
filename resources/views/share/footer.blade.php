<!-- Start Footer -->
<footer class="footer-sm-space mt-5">
    <div class="main-footer m-0">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-contact">
                        <div class="brand-logo">
                            <a href="index.htm" class="footer-logo float-start">
                                <img src="{{asset("assets/images/fahasa-logo.png")}}" class="f-logo img-fluid blur-up lazyload" alt="logo">
                            </a>
                        </div>
                        <ul class="contact-lists" style="clear:both;">
                            <li>
                                <span><b>phone:</b> <span class="font-light"> +123456789</span></span>
                            </li>
                            <li>
                                    <span><b>Address:</b><span class="font-light"> Hanoi, VietNam</span></span>
                            </li>
                            <li>
                                <span><b>Email:</b><span class="font-light"> vu@gmail.com </span></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>About us</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="{{route('home')}}" class="font-dark">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">Shop</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">About Us</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Blog</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>New Categories</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">Latest Shoes</a>
                                </li>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">Branded Jeans</a>
                                </li>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">New Jackets</a>
                                </li>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">Colorfull Hoodies</a>
                                </li>
                                <li>
                                    <a href="{{route('home.shop')}}" class="font-dark">Shiner Goggles</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-links">
                        <div class="footer-title">
                            <h3>Get Help</h3>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li>
                                    <a href="#" class="font-dark">Your Orders</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Your Account</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Track Orders</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Your Wishlist</a>
                                </li>
                                <li>
                                    <a href="#" class="font-dark">Shopping FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                    <div class="footer-newsletter">
                        <h3>Let’s stay in touch</h3>
                        <div class="form-newsletter">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control color-4" placeholder="Your Email Address">
                                <span class="input-group-text" id="basic-addon4"><i
                                        class="fas fa-arrow-right"></i></span>
                            </div>
                            <p class="font-dark mb-0">Keep up to date with our latest news and special offers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-12">
                    <p class="mb-0 font-dark text-center">© 2023</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

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
<!-- -->

        <!-- -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
        <script src="{{ asset('assets/js/slick/slick-animation.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>
        <script src="{{ asset('assets/js/price-filter.js') }}"></script>
        <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/js/filter.js') }}"></script>
        <script src="{{ asset('assets/js/newsletter.js') }}"></script>
        <script src="{{ asset('assets/js/cart_modal_resize.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <!-- -->
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="{{asset('/assets/js/validate-custom/login.js')}}"></script>
        <!--  -->
        <script>
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip()
            });
        </script>
    </body>
</html>


