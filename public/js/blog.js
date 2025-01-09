document.getElementById('next-button').addEventListener('click', function () {
    const categoryId = this.dataset.categoryId; // Lấy ID danh mục từ data attribute

    fetch(`/featured-products/${categoryId}`)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('featured-products');
            container.innerHTML = ''; // Xóa sản phẩm cũ

            // Thêm sản phẩm mới
            data.products.forEach(product => {
                const productHtml = `
                    <div class="blogleft-review">
                        <img src="/images/${product.avt}" alt="${product.name}">
                        <div class="review-content">
                            <h3>${product.name}</h3>
                            <p>${product.tieude || ''}</p>
                            <p>${product.noidung || ''}</p>
                        </div>
                    </div>
                `;
                container.innerHTML += productHtml;
            });
        })
        .catch(error => console.error('Error fetching featured products:', error));
});
