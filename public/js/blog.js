// Lấy tất cả các nút next-button
document.querySelectorAll('.next-button').forEach(button => {
    button.addEventListener('click', function () {
        // Lấy category ID từ thuộc tính data-category-id
        const categoryId = this.dataset.categoryId;

        // Gửi request đến API để lấy sản phẩm
        fetch(`/featured-products/${categoryId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Products:', data.products); // Debug dữ liệu

                // Tìm .pagination (chính là thẻ cha chứa nút next-button này)
                const pagination = this.closest('.pagination');
                if (!pagination) {
                    console.error('Không tìm thấy .pagination');
                    return;
                }

                // Container hiển thị sản phẩm chính là thẻ nằm ngay TRƯỚC .pagination
                const container = pagination.previousElementSibling;
                if (!container) {
                    console.error('Không tìm thấy container nằm trước .pagination');
                    return;
                }

                // Nếu bạn vẫn muốn giữ logic xóa .blog-main khác thì dùng như cũ:
                const blogRightColumn = this.closest('.oppo');
                const tim = blogRightColumn?.querySelector('.blog-main');
                if (!tim) {
                    console.warn('Không tìm thấy .blog-main trong .oppo');
                }

                const blogCategoryMain = this.closest('.blog-category-main');
                const timkiem = blogCategoryMain?.querySelector('.blog-main');
                if (!timkiem) {
                    console.warn('Không tìm thấy .blog-main trong .blog-category-main');
                }

                // Xóa nội dung cũ
                container.innerHTML = '';
                if (tim) tim.innerHTML = '';
                if (timkiem) timkiem.innerHTML = '';

                // Thêm sản phẩm mới
                data.products.forEach(product => {
                    const productHtml = `
                        <div class="blogleft-review">
                            <img src="/images/${product.avt}" alt="${product.name}">
                            <div class="review-content">
                                <h3>${product.name}</h3>
                                <p>${product.tieude || 'Chưa có tiêu đề'}</p>
                                <p>${product.noidung || 'Chưa có nội dung'}</p>
                            </div>
                        </div>
                    `;
                    container.innerHTML += productHtml;
                });
            })
            .catch(error => console.error('Lỗi khi lấy sản phẩm:', error));
    });
});
