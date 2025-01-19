
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
                                <div class="search-item " >
                                    <a style="display:flex;" href="/chitiet/${product.slug}/${product.id}">
                                        <img style="height:70px;width:70px;" src="/img/${product.avt}" alt="${product.name}">
                                        <p style="margin-top:25px;text-transform: uppercase;">${product.name}</p>
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
                    results.html('<p>Không Tìm Thấy Kết Quả.</p>');
                    results.show();
                }
            });
        } else {
            results.hide();
        }
    });
});
