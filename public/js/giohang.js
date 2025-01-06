// Chọn tất cả sản phẩm
function selectAllProducts(checkbox) {
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    productCheckboxes.forEach(cb => cb.checked = checkbox.checked);
}

// Cập nhật số lượng sản phẩm
// Hàm cập nhật số lượng sản phẩm
function update(id, action) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/giohang/update/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({
            action: action, // Chỉ gửi hành động (increase/decrease)
        }),
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                console.log('Số lượng cập nhật:', data.newQuantity);
                alert(data.message);
                location.reload(); // Tải lại trang để hiển thị số lượng mới
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error('Lỗi chi tiết:', error);
        });
}




// Xóa sản phẩm khỏi giỏ hàng
function removeProduct(productId) {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`/giohang/remove/${productId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // Tải lại trang để cập nhật
        }
    })
    .catch(error => console.error('Lỗi:', error));
}

// Xóa tất cả sản phẩm trong giỏ hàng
function clearCart() {
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/giohang/clear', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload(); // Tải lại trang để cập nhật
        }
    })
    .catch(error => console.error('Lỗi:', error));
}
