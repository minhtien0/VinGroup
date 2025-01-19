// Chọn tất cả sản phẩm
function selectAllProducts(checkbox) {
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    productCheckboxes.forEach(cb => {
        cb.checked = checkbox.checked;
    });
    calculateTotal(); // Tính lại tổng tiền khi chọn tất cả
}
// Gắn sự kiện change vào checkbox để tính lại tổng tiền
function calculateTotal() {
    const productCheckboxes = document.querySelectorAll('.product-checkbox');
    let total = 0;

    productCheckboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            const price = parseFloat(checkbox.dataset.price); // Lấy giá từ data-price
            const quantity = parseInt(checkbox.dataset.quantity); // Lấy số lượng từ data-quantity
            total += price * quantity; // Tính tổng giá sản phẩm (giá x số lượng)
        }
    });

    // Hiển thị tổng tiền
    document.getElementById('total-price').textContent = total.toLocaleString() + 'đ'; // Định dạng số
}

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
                location.reload(); // Tải lại trang để hiển thị số lượng mới
            } else {
            }
        })
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
            location.reload(); // Tải lại trang để cập nhật
        }
    })
    
}
