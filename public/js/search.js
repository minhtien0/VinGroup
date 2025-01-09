
  //thanh tim kiem
  $(document).ready(function () {
    $('#search-input').on('keyup', function () {
        let keyword = $(this).val();
        let results = $('#search-results');

        if (keyword.length >= 2) {
            $.ajax({
                url: '/search-ajax',
                type: 'GET',
                data: { keyword: keyword },
                success: function (response) {
                    results.empty();

                    if (response.length > 0) {
                        response.forEach(product => {
                            results.append(`
                                <div class="search-item">
                                    <a href="/san-pham/${product.slug}">
                                        <img src="/images/${product.avt}" alt="${product.name}">
                                    </a>
                                </div>
                            `);
                        });
                        results.show();
                    } else {
                        results.html('<p>Không tìm thấy sản phẩm nào.</p>');
                        results.show();
                    }
                },
                error: function () {
                    results.html('<p>Có lỗi xảy ra, vui lòng thử lại.</p>');
                    results.show();
                }
            });
        } else {
            results.hide();
        }
    });
});
