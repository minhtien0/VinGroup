<script src="{{ asset('js/dangky.js') }}" defer></script>
<div id="DKpopup-overlay" class="DKpopup-overlay" style="display: none;">
    <div class="DKpopup">
        <span class="DKclose-btn" onclick="DKclosePopup()">&times;</span>
        <h2>Đăng Ký Tài Khoản</h2>
        <form id="register-form" action="{{ route('dangnhap.dangky') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Tên đăng nhập:</label>
    <input type="text" id="name" name="name" placeholder="Tên đăng nhập" required><br>
    <label for="email">Email:</label>
    <input type="gmail" id="gmail" name="gmail" placeholder="Nhập email" required><br>
    <label for="SDT">Số điện thoại:</label>
    <input type="text" id="SDT" name="SDT" placeholder="Nhập số điện thoại" required><br>
    <label for="address">Địa chỉ:</label>
    <input type="text" id="address" name="address" placeholder="Nhập địa chỉ" required><br>
    <label for="gioitinh">Giới tính:</label>
    <select id="gioitinh" name="gioitinh" required>
        <option value="male">Nam</option>
        <option value="female">Nữ</option>
    </select><br>
    <label for="avt">Tải ảnh đại diện:</label>
    <input type="file" id="avt" name="avt" accept="image/*"><br>
    <label for="password">Mật khẩu:</label>
    <input type="text" id="password" name="password" placeholder="Nhập mật khẩu" required><br>
    <label for="password_confirmation">Nhập lại mật khẩu:</label>
    <input type="text" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required><br>
    <p>Mã Gacha của bạn là: <strong id="gacha-code">Đang tạo...</strong></p>
    <input type="text" id="gacha-input" name="gacha_input" placeholder="Nhập mã Gacha của bạn" required><br>
    <button type="submit">Đăng Ký</button>
</form>

    </div>
</div>