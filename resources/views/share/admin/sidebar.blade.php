<!-- Side Bar -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin')}}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
              <span class="app-brand-logo demo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100">
                              <path fill="#9c27b0" d="M16 3H6c-1.1 0-1.99.9-1.99 2L4 19c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4 14H6V7h6v10zm-2-5h2v2h-2v-2z"/>
                            </svg>
                        </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2"> Quản Lý Bán Hàng </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Đầu Sách -->
        <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboards"> Quản Lý Đầu Sách </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item active">
                    <a href="{{route('sanpham')}}"
                      class="menu-link">
                        <div data-i18n="CRM">Danh sách Đầu Sách</div>
                        <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('sanpham.add')}}" class="menu-link">
                        <div data-i18n="Analytics">Thêm Đầu Sách</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Đầu Sách -->

        <!-- Thể Loại -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-window-maximize"></i>
                <div data-i18n="Layouts">Thể Loại</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('theloai')}}" class="menu-link">
                        <div data-i18n="Without menu">Thể Loại</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Thể Loại -->

        <!-- Tác Giả -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-flip-to-front"></i>
                <div data-i18n="Front Pages">Tác Giả</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('tacgia')}}"
                       class="menu-link">
                        <div data-i18n="Landing">Tác Giả</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Tác Giả -->

        <!-- Nhà Xuất Bản -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file-document-multiple-outline"></i>
                <div data-i18n="Front Pages">Nhà Xuất Bản</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('nhaxuatban')}}"
                       class="menu-link">
                        <div data-i18n="Landing">Nhà Xuất Bản</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Nhà Xuất Bản -->
        <!-- Nhà Xuất Bản -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-geo-alt"></i>
                <div data-i18n="Front Pages">Vị trí</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('vitri')}}"
                       class="menu-link" >
                        <div data-i18n="Landing">Vị trí</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Vị trí -->

        <!-- Quản Lý Order -->
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text"> Quản Lý Đơn Hàng </span>
        </li>
        <!-- Order -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Account Settings"> Quản Lý Đơn Hàng </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('order')}}" class="menu-link">
                        <div data-i18n="Account"> Đơn Hàng </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Quản Lý Order -->

        <!-- Quản Lý Độc Giả -->
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text"> Quản Lý Độc Giả </span>
        </li>
        <!-- Độc Giả -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Account Settings">Quản Lý Khách Hàng</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('khachhang')}}" class="menu-link">
                        <div data-i18n="Account">Khách Hàng</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Độc Giả -->
        <!-- / Quản Lý Độc Giả -->

        <!-- Quản Lý Khuyến Mại -->
        <li class="menu-header fw-medium mt-4">
            <span class="menu-header-text"> Quản Lý Khuyến Mại </span>
        </li>
        <!-- Khuyến Mại -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Account Settings">Quản Lý Khuyến Mại </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('khuyenmai')}}" class="menu-link">
                        <div data-i18n="Account"> Khuyến Mại </div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Khuyến Mại -->
        <!-- / Quản Lý Khuyến Mại -->

        <!-- Hóa Đơn -->
        <li class="menu-header fw-medium mt-4"><span class="menu-header-text">Quản Lý Hóa Đơn</span></li>
        <!-- Hóa Đơn -->
        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-receipt"></i>
                <div data-i18n="Extended UI">Hóa Đơn</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Perfect Scrollbar">Danh Sách Hóa Đơn</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Hóa Đơn -->

        <!-- Quản Lý Phân Quyền -->
        <li class="menu-header fw-medium mt-4"><span class="menu-header-text">Phân Quyền</span></li>
        <!-- Quyền -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-form-select"></i>
                <div data-i18n="Form Elements">Quản Lý Quyền</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('permission_role')}}" class="menu-link">
                        <div data-i18n="Basic Inputs">Danh Sách Quyền</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('permission_setting')}}" class="menu-link">
                        <div data-i18n="Input groups">Cài Đặt Quyền</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- / Quyền -->

        <!-- Cài Đặt Chung -->
        <li class="menu-header fw-medium mt-4"><span class="menu-header-text">Cài Đặt Chung</span></li>
        <li class="menu-item">
            <a href=""
               target="_blank" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-lifebuoy"></i>
                <div data-i18n="Support">Setting</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route("logout")}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-file-document-multiple-outline"></i>
                <div data-i18n="Documentation">Logout</div>
            </a>
        </li>
    </ul>
</aside>




