@include('share.header')
<body class="theme-color4 light ltr">

@include('share.nav')

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
<!-- -->
@include('share.breadcrumb')

<!-- Shop Section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 category-side col-md-4">
                <div class="category-option">
                    <div class="button-close mb-3">
                        <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                    </div>
                    <div class="accordion category-name" id="accordionExample">
                        <!-- Start Danh Mục -->
                        <div class="accordion-item category-rating">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix">
                                    Danh Mục
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne">
                                <div class="accordion-body category-scroll">
                                    <ul class="category-list">
                                        @foreach($loaisanphams as $loaisanpham)
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct1{{$loaisanpham->id}}" name="categories"
                                                           type="checkbox" onchange="filterByCatory()"
                                                           value="{{$loaisanpham->tenloai}}"
                                                           @if(in_array($loaisanpham->id,explode(',',$q_options))) checked @endif >
                                                    <label class="form-check-label">{{$loaisanpham->tenloai}}</label>
                                                    <p class="font-light">({{$loaisanpham->count}})</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Start Giá bán -->
                        <div class="accordion-item category-price">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour"> Giá Tiền </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse show"
                                 aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="price">
                                        <div class="row p-0 m-0">
                                            <div class="price-content p-0 m-0">
                                                <div class="d-flex flex-column">
                                                    <div class="price-max py-2">
                                                        <label for="max-price" class="text_title">Giá Lớn Nhất</label>
                                                        <input type="number" min="0" class="form-control" id="max-price" name="max-price" value="{{$max_price}}">
                                                    </div>
                                                    <div class="price-min py-2">
                                                        <label for="min-price" class="text_title">Giá Nhỏ Nhất</label>
                                                        <input type="number" min="0" class="form-control" id="min-price" name="min-price" value="{{$min_price}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="sub-price" class="btn btn-danger">Áp dụng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="category-product col-lg-9 col-12 ratio_30">
                <div class="row g-4">
                    <!-- label and featured section -->
                    <div class="col-md-12">
                        <ul class="short-name">

                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="filter-options">
                            <div class="select-options">
                                <div class="page-view-filter">
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="orderby" id="orderby" onchange="submitOrderByForm()">
                                            <option value="-1" @if($orderBy || $orderBy == "-1") selected @endif>Default</option>
                                            <option value="asc" @if($orderBy == "asc") selected @endif>Price, Low To High</option>
                                            <option value="desc" @if($orderBy == "desc") selected @endif>Price, High To Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="dropdown select-featured">
                                    <select class="form-select" name="size" id="pagesize" onchange="submitPageForm()">
                                        <option value="8" @if($page || $page == "8") selected @endif>8 Products Per Page</option>
                                        <option value="12" @if($page == "12") selected @endif>12 Products Per Page</option>
                                        <option value="24" @if($page == "24") selected @endif>24 Products Per Page</option>
                                        <option value="28" @if($page == "28") selected @endif>28 Products Per Page</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid-options d-sm-inline-block d-none">
                                <ul class="d-flex">
                                    <li class="two-grid">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset("assets/images/svg/grid-2.svg")}}" class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                    <li class="three-grid d-md-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset("assets/images/svg/grid-3.svg")}}" class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                    <li class="grid-btn active d-lg-inline-block d-none">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset("assets/images/svg/grid.svg")}}" class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                    <li class="list-btn">
                                        <a href="javascript:void(0)">
                                            <img src="{{asset("assets/images/svg/list.svg")}}" class="img-fluid blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Start Prodcut -->
                <div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
                    @foreach($sanphams as $sanpham)
                    <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="{{route('home.detail', $sanpham->id)}}">
                                        <img src="{{asset("assets/images/product/front/$sanpham->anhbia")}}"
                                             class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
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
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{$sanpham->tensanpham}}</span>
                                    <ul class="rating mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-price">
                                    <a href="{{route('home.detail', $sanpham->id)}}" class="font-default">
                                        <h5 class="ms-0">{{$sanpham->tensanpham}}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">Cupiditate Minus</span>
                                        <p class="font-light">{!! $sanpham->mota !!}</p>
                                    </div>
                                    <h3 class="theme-color">${{$sanpham->giaban}}</h3>
                                    <button class="btn listing-content">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Start Panigation -->
                <div class="navigation d-flex" style="justify-content: center; padding: 24px">
                    {{ $sanphams->links() }}
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Subscribe Section Start -->
<section class="subscribe-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="subscribe-details">
                    <h2 class="mb-3">Subscribe Our News</h2>
                    <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                        and fantastic Products.</h6>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                <div class="subsribe-input">
                    <div class="input-group">
                        <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                        <button class="btn btn-solid-default" type="button">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subscribe Section End -->

<div id="qvmodal"></div>

<!-- Start Form Filter -->
<form id="formFilter" method="GET">
        <input type="hidden" id="pagenumber" name="pagenumber" value="{{$page}}">
    <input type="hidden" id="min_price" name="minprice" value="{{$min_price}}">
    <input type="hidden" id="max_price" name="maxprice" value="{{$max_price}}">
    <input type="hidden" id="order" name="order" value="{{$orderBy}}">
    <input type="hidden" id="brands" name="brands" value="">
    <input type="hidden" id="categories" name="categories" value="{{$q_options}}">
</form>
<!-- End Form Filter -->





<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });
</script>



<script>

    const filterByCatory = (catory) => {
        let catories = "";
        $("input[name='categories']:checked").each(function () {
            if (catories === "") {
                catories += this.value;
            } else {
                catories += "," + this.value;
            }
        });
        $('#categories').val(catories);
        console.log(catories);

        // Gọi removeEmpty và truyền submitForm làm callback
        removeEmpty(submitForm);
    }

    function removeEmpty(callback) {
        // Xử lý loại bỏ trống
        $('#formFilter input').each(function () {
            if ($(this).val() === '') {
                $(this).removeAttr('name');
            }
        });

        // Gọi hàm callback sau khi xử lý xong
        if (callback && typeof callback === 'function') {
            callback();
        }
    }

    function submitForm() {
        $('#formFilter').submit();
    }
</script>


<script>
    $('#sub-price').click(function (e) {
        e.preventDefault();
        let min_price = $('input[name=min-price]').val();
        let max_price = $('input[name=max-price]').val();
        console.log(typeof min_price);
        if(parseInt(max_price) < parseInt(min_price)) {
            console.log(">>> Sai ");
            // console.log($('.error[name=error]'));
            let errorElement = $('div.error[name=error]');
            if (errorElement.length > 0) {
                errorElement.text("Giá trị nhập không thỏa mãn");
            } else {
                console.log("Không tìm thấy phần tử 'div.error[name=error]'");
            }

            $('div.error[name=error]').addClass('bg-danger').text("Giá trị nhập không thỏa mãn");
        }
        else {
            $('#max_price').val(max_price);
            $('#min_price').val(min_price);

            removeEmpty(submitForm);
        }
    })

    //
    function submitOrderByForm() {
        // Lấy giá trị đã chọn
        let selectedValue = $('#orderby').val();

        // Thêm thuộc tính selected cho option đã chọn
        $('#orderby option[value="' + selectedValue + '"]').prop('selected', true);
        $('#order').val(selectedValue);
        // Gửi form
        removeEmpty(submitForm);
    }

    //
    function submitPageForm() {
        // Lấy giá trị đã chọn
        let selectedValue = $('#pagesize').val();

        // Thêm thuộc tính selected cho option đã chọn
        // $('#pagesize option[value="' + selectedValue + '"]').prop('selected', true);
        $('#pagenumber').val(selectedValue);
        // Gửi form
        removeEmpty(submitForm);
    }
</script>

@include('share.footer')

