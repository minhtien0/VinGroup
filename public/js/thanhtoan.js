document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const totalPriceElement = document.getElementById('total-price');
    const form = document.querySelector('form[action="{{ route(\'thanhtoan\') }}"]');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', calculateTotal);
    });

    form.addEventListener('submit', function (e) {
        const selected = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (!selected) {
            e.preventDefault();
            alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        }
    });

    function calculateTotal() {
        let total = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const priceElement = checkbox.closest('.cart-item').querySelector('.price');
                if (priceElement) {
                    const productPrice = parseInt(priceElement.textContent.replace(/\D/g, ''), 10);
                    if (!isNaN(productPrice)) {
                        total += productPrice;
                    }
                }
            }
        });

        if (totalPriceElement) {
            totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);
        }
    }

    // Tính tổng ngay khi tải trang nếu có sản phẩm đã được chọn trước đó
    calculateTotal();
});
