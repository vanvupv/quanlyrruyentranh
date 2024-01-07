@include('share.head')
<body>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-4">
            <form id="loginForm" action="{{route('register.store')}}" method="POST">
                @method('POST')
                @include('share.error')
                <div>
                    <h2 class="text-center mb-4">Đăng Nhập</h2>
                    <div class="mb-3 username">
                        <div style="display: flex; justify-content: space-between">
                            <label for="username" class="form-label">Tên người dùng</label>
                        </div>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="Tên người dùng..."
                            autocomplete="new-telephone"
                        />
                        <div type="error" class="error">
                            <span role="status"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-3 username">
                    <div style="display: flex; justify-content: space-between">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                    </div>
                    <input
                        type="email"
                        id="username"
                        name="username"
                        class="form-control"
                        placeholder="Tên Tài Khoản..."
                        autocomplete="new-telephone"
                    />
                    <div type="error" class="error">
                        <span role="status"></span>
                    </div>
                </div>

                <div class="mb-3 password">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <div class="input-group">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
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
                    <div type="error" class="error">
                        <span role="status"></span>
                    </div>
                </div>

                <div class="mb-3 password">
                    <label for="password" class="form-label">Nhập Lại Mật khẩu</label>
                    <div class="input-group">
                        <input
                            type="password"
                            id="re-password"
                            name="re-password"
                            class="form-control"
                            placeholder="Nhập Lại Mật Khẩu..."
                            autocomplete="re-password"
                            value=""
                        />
                        <span
                            class="input-group-text password-toggle-btn"
                            id="re-togglePassword"
                        >
                  <i class="bi bi-eye-slash"></i>
                </span>
                    </div>
                    <div type="error" class="error">
                        <span role="status"></span>
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
                    Đăng Ký

                    <div
                        style="
                  position: absolute;
                  top: 50%;
                  transform: translateY(-50%);
                  width: 18px;
                  height: 18px;
                "
                        id="loginLoading"
                        class="spinner-border css-120zvcm-DivContainer"
                    ></div>
                </button>
                @csrf
            </form>
            <div style="display: flex; justify-content: center; margin-top: 8px">
                <div>Do you have a account?</div>
                <a
                    href="{{route('login')}}"
                    style="text-decoration: none"
                    class="a-Login"
                >
                    <span>Sign in</span>
                </a>
            </div>
        </div>
    </div>
</div>
@include('share.footer')


