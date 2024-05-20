@include('share.header')

@php
    $errorsArray = [
        'email' => null,
        'password' => null,
    ];
@endphp

@if ($errors->any())
    @php
    $errorsArray = [
        'email' => $errors->first('username'),
        'password' => $errors->first('password'),
    ];
    @endphp
@endif

<!-- Form đăng nhập và các phần khác -->
<div id="header">
    <div class="container-fluid p-2">
        <div class="row justify-content-between p-0 m-0">
            <div class="logo col-2">
                <a href="">
                    <img class="w-100" src="./img/fahasa-logo.png" alt="" />
                </a>
            </div>
            <div class="phanhoi col-auto">
                <a style="text-decoration: none; color: black" href=""
                >Phản hồi và trợ giúp</a
                >
            </div>
        </div>
    </div>
</div>
<!-- Form Dang Nhap -->
<div id="form-login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <form id="loginForm" class="loginForm" action="{{route('login.store')}}" method="POST">
                    @include('share.error')
                    <div>
                        <h2 class="text-center mb-4 text-format">Đăng Nhập</h2>
                        <div class="mb-3 username">
                            <div style="display: flex; justify-content: space-between">
                                <label for="username" class="form-label text-format"
                                >Tên đăng nhập</label
                                >
                            </div>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="form-control text-format"
                                placeholder="Tên Tài Khoản..."
                                autocomplete="new-telephone"
                            />
                            <div type="error-span" class="error-span">
                                <span role="status" style="color: red">@if($errorsArray['email']) {{$errorsArray['email']}}  @endif</span>
                             </div>
                        </div>
                    </div>

                    <div class="mb-3 password">
                        <label for="password" class="form-label text-format"
                        >Mật khẩu</label
                        >
                        <div class="input-group">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control text-format"
                                placeholder="Mật Khẩu..."
                                autocomplete="new-password"
                                value=""
                            />
                            <span
                                class="input-group-text password-toggle-btn"
                                id="togglePassword"
                            >
                    <i class="bi bi-eye-slash"></i>
                  </span>
                        </div>
                        <div type="error" class="error" style="display: block !important;">
                            <span role="status" style="color: red">@if($errorsArray['password']) {{$errorsArray['password']}}  @endif</span>
                        </div>
                    </div>

                    <div style="display: flex">
                        <a class="a-Login" style="text-decoration: none" href=""
                        >Quên mật khẩu</a
                        >
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary btn-block css-load"
                        id="loginBtn"
                    >
                        Đăng Nhập

                        <div
                            style="
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%) !important;
                    width: 18px;
                    height: 18px;
                  "
                            id="loginLoading"
                            class="spinner-border css-120zvcm-DivContainer"
                        ></div>
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<div
    class="content-ten p-3"
    style="border-top: 0.5px solid rgba(22, 24, 35, 0.12); margin-top: 24px"
>
    <div style="display: flex; justify-content: center; margin-top: 8px">
        <div>Do you have a account?</div>
        <a href="{{route('register')}}" style="text-decoration: none" class="a-Login">
            <span>Sign up</span>
        </a>
    </div>
</div>
@include('share.footer')
