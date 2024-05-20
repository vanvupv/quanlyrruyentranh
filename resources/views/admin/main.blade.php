@include('share.admin.header')

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('share.admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('share.admin.nav')
            <!-- / Navbar -->
            <!-- Content -->
            <div id="page-container">
                <div class="container">
                    @yield('content')
                </div>
            </div>
            <!-- / Content -->
        </div>
        <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<!-- End Layout -->
@include('share.admin.footer')

