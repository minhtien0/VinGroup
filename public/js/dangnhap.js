// Hàm hiển thị popup khi nhấn vào "Tài khoản"
function showPopuplogin() {
    var popup = document.getElementById('loginPopup');
    popup.style.display = "flex";  // Hiển thị popup
}

// Đóng popup khi nhấn vào nút đóng
function closePopuplogin() {
    var popup = document.getElementById('loginPopup');
    popup.style.display = "none";  // Ẩn popup
}
document.querySelector('.password-eye').addEventListener('click', function () {
    const passwordField = document.querySelector('input[type="password"]');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        this.classList.add('active');
    } else {
        passwordField.type = 'password';
        this.classList.remove('active');
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const passwordEye = document.querySelector('.password-eye');
    console.log("Phần tử '.password-eye':", passwordEye);
    if (passwordEye) {
        passwordEye.addEventListener('click', function () {
            const passwordField = document.querySelector('input[type="password"]');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                this.classList.add('active');
            } else {
                passwordField.type = 'password';
                this.classList.remove('active');
            }
        });
    } else {
        console.error("Không tìm thấy phần tử '.password-eye'.");
    }
});

