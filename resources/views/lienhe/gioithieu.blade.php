<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - Công ty Bán Điện Thoại</title>
    <link rel="stylesheet" href="{{ asset('css/gioithieu.css') }}">
</head>
<body>
    <!-- Header -->
    @include('layouts.home.header')

    <div class="gt-container">
        <div class="gt-tabs">
            <ul>
                <li class="active">Giới thiệu chung</li>
            </ul>
        </div>

        <div class="gt-content">
            <div class="gt-section">
                <h1>Công ty Vin Group</h1>

                <h2>Lĩnh vực kinh doanh</h2>
                <p>Chuyên cung cấp các sản phẩm điện thoại di động chính hãng, đa dạng thương hiệu 
                như <em>Iphone, Apple, Samsung, Xiaomi, OPPO</em>... </p>
                <h2>Tầm nhìn và sứ mệnh</h2>
                <p>
                Chúng tôi luôn hướng đến việc đem lại những sản phẩm chất lượng cao 
                với giá cả cạnh tranh, cùng dịch vụ chăm sóc khách hàng tận tâm. 
                Phương châm <strong>"Khách hàng là trọng tâm"</strong> giúp công ty không ngừng 
                nâng cao chất lượng phục vụ, đem đến trải nghiệm mua sắm tốt nhất.
                </p>
                <h2>Các chính sách</h2>
                <ul>
                <li>
                    <strong>Chính sách bảo hành:</strong> Bảo hành chính hãng tối thiểu 12 tháng 
                    và hỗ trợ đổi trả theo quy định.
                </li>
                <li>
                    <strong>Chính sách đổi trả:</strong> Đổi trả trong vòng 7 ngày nếu sản phẩm lỗi do nhà sản xuất.
                </li>
                <li>
                    <strong>Chính sách vận chuyển:</strong> Giao hàng toàn quốc, miễn phí vận chuyển nội thành 
                    cho hóa đơn trên 1 triệu.
                </li>
                <li>
                    <strong>Chính sách thanh toán:</strong> Thanh toán bằng tiền mặt khi nhận hàng (COD), 
                    chuyển khoản hoặc ví điện tử.
                </li>
            </ul>
            </div>
            <div class="gt-contact">
                <h2>Liên hệ</h2>
                <p>Địa chỉ: Số 193, Đường Phan Xích Long, Phường 2, Quận Phú Nhuận, TP. Hồ Chí Minh</p>
                <p>Điện thoại: <span class="highlight">0999099090</span></p>
                <p>Email: <span class="highlight">vingroup@gmail.com</span></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.home.footer')
</body>
</html>
