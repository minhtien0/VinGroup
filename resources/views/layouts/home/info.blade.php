@include('layouts.home.header')
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Thông Tin Website - VinGroup Mobile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #0066cc;
            color: white;
            padding: 15px 30px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        header p {
            margin: 5px 0 0;
            font-size: 14px;
        }

        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 24px;
            color: #0066cc;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .section p {
            margin-bottom: 15px;
        }

        .highlight {
            color: #0066cc;
            font-weight: bold;
        }

        .social-links a {
            text-decoration: none;
            color: #0066cc;
            margin-right: 15px;
        }

        footer {
            background-color: #f8f8f8;
            padding: 20px 30px;
            text-align: center;
            color: #666;
            font-size: 14px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>VinGroup Mobile</h1>
        <p>Nơi hội tụ những sản phẩm công nghệ đỉnh cao</p>
    </header>

    <!-- Main Content -->
    <main>
        <!-- About Us Section -->
        <div class="section">
            <h2>Về Chúng Tôi</h2>
            <p>
                <span class="highlight">VinGroup Mobile</span> là đơn vị hàng đầu trong lĩnh vực cung cấp và phân phối các sản phẩm công nghệ như điện thoại, máy tính bảng, và phụ kiện. Chúng tôi tự hào mang đến cho khách hàng những sản phẩm chất lượng nhất và dịch vụ chăm sóc khách hàng chuyên nghiệp.
            </p>
        </div>

        <!-- Mission Section -->
        <div class="section">
            <h2>Sứ Mệnh Của Chúng Tôi</h2>
            <p>
                Với mục tiêu <span class="highlight">"Dẫn đầu công nghệ - Kiến tạo tương lai"</span>, chúng tôi không ngừng cải tiến và đổi mới để mang đến cho khách hàng những sản phẩm hiện đại và trải nghiệm mua sắm tuyệt vời.
            </p>
        </div>

        <!-- Social Media Links -->
        <div class="section social-links">
            <h2>Kết Nối Với Chúng Tôi</h2>
            <p>Hãy theo dõi chúng tôi qua các kênh mạng xã hội:</p>
            <a href="https://facebook.com/vingroup" target="_blank">Facebook</a>
            <a href="https://twitter.com/vingroup" target="_blank">Twitter</a>
            <a href="https://instagram.com/vingroup" target="_blank">Instagram</a>
            <a href="https://youtube.com/vingroup" target="_blank">YouTube</a>
        </div>
    </main>

    <!-- Footer -->
    @include('layouts.home.footer')
</body>
</html>
