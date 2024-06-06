@include('share.header')

<body class="theme-color4 light ltr">
<!-- Start Navigation -->
@include('share.nav')

<!-- Start Breadcrumb -->
@include('share.breadcrumb')

<!-- Start Cart -->
<section class="cart-section section-b-space">
  <div>
      Tao don hang thanh cong
  </div>
</section>


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
</script>

@include('share.footer')

