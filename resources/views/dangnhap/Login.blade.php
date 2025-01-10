<script src="{{ asset('js/dangnhap.js') }}" defer></script>

<div id="loginPopup" class="popup-overlay-login" style="display: {{ session('login_error') ? 'flex' : 'none' }};">
    <div class="login-popup-content">
        <span class="login-close-btn" onclick="closePopuplogin()">&times;</span>
        <h2>Đăng nhập</h2>
        <form action="{{ route('dangnhap.Login') }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Email/Số điện thoại" value="{{ old('login') }}" required />
            @error('login')
                <p class="error-message" style="color: red;">{{ $message }}</p>
            @enderror

            <div class="password-field">
                <input type="password" name="password" placeholder="Mật khẩu" required />
                <i class="fas fa-eye password-eye"></i>
                @error('password')
                    <p class="error-message" style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="login-button">ĐĂNG NHẬP</button>

            <div class="user-info">
            @if (session('login_error'))
                <p class="error-message" style="color: red;">{{ session('login_error') }}</p>
            @endif

            @if (session('success'))
                <p class="success-message" style="color: green;">{{ session('success') }}</p>
            @endif
        </form>

        <div class="options">
            <a href="#">Quên mật khẩu</a>
            <span>HOẶC</span>
            <a href="#">Đăng nhập với SMS</a>
        </div>
        <div class="social-login">
            <button class="social-btn fb-btn"><i class="fab fa-facebook-f"></i> Facebook</button>
            <button class="social-btn google-btn"><i class="fab fa-google"></i> Google</button>
        </div>
        <div class="new-user">
            <p>Đăng ký tài khoản? <a href="javascript:void(0)" onclick="DKopenPopup(); closePopup('loginPopup');">Đăng
                    ký</a></p>
        </div>
        @if (session('user'))
        <span>Chào, {{ session('user')->name }}</span>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline;">
                Đăng xuất
            </button>
        </form>
    @endif
</div>
    </div>
</div>
<!-- <link rel="stylesheet" href="{{asset('css/dangky.css')}}"> -->
<!-- <script src="{{ asset('js/dangky.js') }}"></script> -->