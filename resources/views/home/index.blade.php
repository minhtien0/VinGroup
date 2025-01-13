<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VinGroup Mobile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/danhmuc.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<div class="top-notification">
    <p>Freeship đơn từ 45k, giảm nhiều hơn cùng <span>FREESHIP XTRA</span></p>
</div>

<body>
    @include('layouts.home.components.product-popup')
    <!-- Top notification bar -->
    @include('layouts.home.header')

    <div class="container">
        <nav class="sidebar-nav">
            <h3>Danh mục</h3>
            <ul>
                <div class="main-categories">
                    <ul>
                        @foreach ($categori as $cate)
                            <li class="category-item">

                                <a href="{{ route('category.show', $cate->name) }}">{{ $cate->name }}</a>
                            </li>

                        @endforeach
                    </ul>
                </div>


            </ul>
            <br>
            <br>
            <ul class="tien_ich">
                <h3>Tiện ích</h3>
                <li><img src="https://salt.tikicdn.com/cache/100x100/ts/upload/1e/27/a7/e2c0e40b6dc45a3b5b0a8e59e2536f23.png"
                        alt="Ưu đãi thẻ,ví"> Ưu đãi thẻ, ví</li>
                <li><img src="https://salt.tikicdn.com/cache/100x100/ts/upload/4d/a3/cb/c86b6e4f17138195c026437458029d67.png"
                        alt="Đóng tiền, nạp thẻ"> Đóng tiền, nạp thẻ</li>
                <li><img src="https://salt.tikicdn.com/cache/100x100/ts/tmp/6f/4e/41/93f72f323d5b42207ab851dfa39d44fb.png"
                        alt="Mua trước trả sau"> Mua trước trả sau</li>
                <li><img src="https://salt.tikicdn.com/cache/100x100/ts/upload/08/2f/14/fd9d34a8f9c4a76902649d04ccd9bbc5.png"
                        alt="Mua Bán Cùng Chúng TÔi"> Mua Bán Cùng Chúng Tôi</li>
            </ul>
        </nav>

        <section class="main-content">
            <!-- Carousel Section -->
            <div>
                <div class="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/samsung-s24-ultra-home-20-11.webp"
                                alt="Image 1">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/oppo-find-x8-mo-ban-home-6-12-24.jpg"
                                alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/vivo-y19s-16-12.png"
                                alt="Image 3">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/Home-matepad-pre-order.jpg"
                                alt="Image 4">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/sliding-home-iphone-16-pro-km-moi.webp"
                                alt="Image 5">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/oppo-find-x8-mo-ban-home-6-12-24.jpg"
                                alt="Image 6">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/samsung-s24-ultra-home-20-11.webp"
                                alt="Image 7">
                            <img src="https://cdn2.cellphones.com.vn/insecure/rs:fill:690:300/q:90/plain/https://dashboard.cellphones.com.vn/storage/vivo-y19s-16-12.png"
                                alt="Image 8">
                        </div>
                        <!-- Thêm nhiều carousel-item nếu cần -->
                    </div>

                    <!-- Carousel Controls -->
                    <button class="carousel-control prev" onclick="prevSlide()">❮</button>
                    <button class="carousel-control next" onclick="nextSlide()">❯</button>
                </div>
            </div>


            <!-- Quick Links -->
            <div class="quick-links">
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/wysiwyg/icon_cate/IPhone1_1.png" alt="Top Deal">
                    <span>IPhone Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/catalog/product/v/i/vivo_1.png" alt="Tiki Trading">
                    <span>ViVo Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/catalog/product/s/a/samsung_1_2.png" alt="Coupon">
                    <span>SamSung Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/catalog/product/x/i/xiaomi_1_5.png"
                        alt="Quay số trúng xu">
                    <span>Xiaomi Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/catalog/product/o/p/oppo_1_1.png"
                        alt="Hàng ngoại giá hot">
                    <span>OPPO Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="https://cdn2.cellphones.com.vn/x/media/catalog/product/r/e/realme_1_1.png"
                        alt="Cùng mẹ chăm bé">
                    <span>Realme Cũ</span>
                </div>
                <div class="quick-link-item">
                    <img src="data:image/jpeg;base64,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"
                        alt="Một sách Tiki">
                    <span>NoKia Cũ</span>
                </div>
            </div>
            <!-- topsele -->
            <div class="container1">
                <div class="top-deal-section">
                    <div class="top-deal-header">
                        <span class="top-deal-title"><i class="fas fa-thumbs-up"></i> TOP DEAL • SIÊU RẺ • NEW </span>
                        <a href="#" class="see-all">Xem tất cả</a>
                    </div>
                    <div class="product-grid">
                        @foreach($loai_New as $product)
                            <a href="{{ route('home.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                <div class="product-card">
                                    <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                    <div class="product-labels">
                                        <span class="label-auth">CHÍNH HÃNG</span>
                                    </div>
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <div class="product-price">
                                        <span
                                            class="current-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flash-sale-section">
                <!-- Flash Sale Header -->
                <div class="flash-sale-header">
                    <span class="flash-sale-title">Flash Sale</span>
                    <div class="flash-sale-timer">
                        <span class="timer-box">00</span> :
                        <span class="timer-box">30</span> :
                        <span class="timer-box">46</span>
                    </div>
                    <a href="#" class="see-all " stlye=" margin-left: 820px">Xem tất cả</a>
                </div>


                <!-- Product Grid -->
                <div class="flash-sale-product-grid">
                    <!-- Product Card Example -->
                    <div class="product-grid">
                        @foreach($loai_Sale as $product)
                            <a href="{{ route('home.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                <div class="flash-sale-product-card">
                                    <div class="discount-badge">-15%</div>
                                    <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                    <h3 class="product-title">{{ $product->name }}</h3>
                                    <div class="product-price">
                                        <span
                                            class="current-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                    </div>
                                    <div class="sale-status">Vừa mở bán</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    


                    <!-- danhsachsp -->
                </div>
            </div>
            <div class="container1">
                <div class="brand-section">
                    <!-- Header -->
                    <div class="brand-header">
                        <span class="brand-title">Thương hiệu bình dân</span>
                    </div>

                    <!-- Nút Trái/Phải cho carousel sản phẩm nằm ngoài brand-carousel -->
                    <button class="product-carousel-control product-prev" onclick="scrollProductCarousel(-1)">❮</button>
                    <button class="product-carousel-control product-next" onclick="scrollProductCarousel(1)">❯</button>
                    <!-- Product Carousel Container -->
                    <div class="brand-carousel" id="productCarousel">
                        <!-- Product Cards -->
                        <div class="product-grid">
                        @foreach($loai_Thuong as $product)
                                <a href="{{ route('home.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                    <div class="flash-sale-product-card">
                                        <div class="discount-badge">-15%</div>
                                        <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                        <h3 class="product-title">{{ $product->name }}</h3>
                                        <div class="product-price">
                                            <span
                                                class="current-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                        </div>
                                        <!-- Nội dung thay vào đây -->
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- khuyenmainoibat -->

                <div class="container1">
                    <div class="promotion-section">
                        <div class="promotion-header">
                            <span class="promotion-title">Sản Phẩm HOT</span>
                        </div>
                        <div class="product-grid">
                            @foreach($loai_Hot as $product)
                                <a href="{{ route('home.detail', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                    <div class="flash-sale-product-card">
                                        <div class="discount-badge">-15%</div>
                                        <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                        <h3 class="product-title">{{ $product->name }}</h3>
                                        <div class="product-price">
                                            <span
                                                class="current-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                        </div>
                                        <!-- Nội dung thay vào đây -->
                                    </div>
                                </a>
                            @endforeach
                        </div>
                       

                        <!-- Thêm các thẻ khác theo ý muốn -->
                    </div>
                </div>

            </div>
            <!-- footer -->
            @include('layouts.home.footer')
    </div>

    </div>

    </div>

    </div>
    </section>
</body>
<script src="{{ asset('js/carousel.js') }}"></script>
<script src="{{ asset('js/danhmuc.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>