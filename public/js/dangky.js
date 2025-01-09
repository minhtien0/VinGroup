function DKopenPopup() {
    console.log("Mở popup đăng ký và tạo mã Gacha");

    // Hiển thị popup
    const popup = document.getElementById('DKpopup-overlay');
    if (!popup) {
        console.error("Không tìm thấy popup với id 'DKpopup-overlay'.");
        return;
    }
    popup.style.display = 'flex';

    // Tạo mã Gacha
    const gachaCode = generateGachaCode();
    console.log("Mã Gacha tạo ra:", gachaCode);

    // Cập nhật mã Gacha hiển thị
    const gachaCodeDisplay = document.getElementById('gacha-code');
    if (gachaCodeDisplay) {
        gachaCodeDisplay.textContent = gachaCode; // Gắn mã Gacha vào thẻ <strong>
    } else {
        console.error("Không tìm thấy phần tử #gacha-code để hiển thị mã Gacha.");
    }

    // Gắn mã Gacha vào input để so sánh
    const gachaInput = document.getElementById('gacha-input');
    if (gachaInput) {
        gachaInput.dataset.generatedCode = gachaCode; // Lưu mã vào thuộc tính `data-generated-code`
    } else {
        console.error("Không tìm thấy phần tử #gacha-input.");
    }
}

function DKclosePopup() {
    const popup = document.getElementById('DKpopup-overlay');
    if (popup) {
        popup.style.display = 'none';
    } else {
        console.error("Không tìm thấy popup với id 'DKpopup-overlay' để đóng.");
    }
}

function generateGachaCode() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let gachaCode = '';
    for (let i = 0; i < 8; i++) {
        gachaCode += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return gachaCode;
}

function validateGacha() {
    const gachaCode = document.getElementById('gacha-code').textContent;
    const gachaInput = document.getElementById('gacha-input').value;

    if (gachaCode === gachaInput) {
        alert('Mã Gacha hợp lệ! Đang gửi thông tin đăng ký...');
        document.getElementById('register-form').submit(); // Gửi form có ID "register-form"
    } else {
        alert('Mã Gacha không hợp lệ. Vui lòng thử lại!');
    }
}


