@include('layouts.home.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang web của tôi')</title>
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <script src="{{ asset('js/category.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="dual-banner-carousel">
    <div class="banner-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVuPybVvIp-eSRhCcx-sh2oJxZDLlXZXltAQ&s" alt="iPhone 14 Series">
    </div>
    <div class="banner-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKq5sm5waWWASo8LjkIN_X7fa_2RPchE23vQ&s" alt="iPhone 13 Series">
    </div>
    <div class="banner-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAC0xfcwCnFdvSmEy1bf0OSvm2f1K4ERjCkQ&s" alt="iPhone 12 Series">
    </div>
    <div class="banner-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA4YH-lpAGdtyF1K_wEVRJqO0MWYVRZiiGdA&s" alt="iPhone 11 Series">
    </div>
</div>

<div class="category-nav">
    <!-- Category Tabs -->
    <div class="tabs">
        <button class="tab active" data-category="iphone-16">IPHONE 16 SERIES</button>
        <button class="tab" data-category="iphone-15">IPHONE 15 SERIES</button>
        <button class="tab" data-category="iphone-14">IPHONE 14 SERIES</button>
        <button class="tab" data-category="iphone-13">IPHONE 13 SERIES</button>
        <button class="tab" data-category="iphone-12">IPHONE 12 SERIES</button>
        <button class="tab" data-category="iphone-11">IPHONE 11 SERIES</button>
    </div>
</div>

<div class="product-filter-page">
    <!-- Sidebar Filters -->
    <div class="filter-sidebar">
      <h4>Bộ lọc tìm kiếm</h4>
      <div class="filter-section">
        <h5>Mức giá</h5>
        <div>
          <label><input type="radio" name="price" value="all" checked> Tất cả</label><br>
          <label><input type="radio" name="price" value="7-13"> Từ 7 - 13 triệu</label><br>
          <label><input type="radio" name="price" value="13-20"> Từ 13 - 20 triệu</label><br>
          <label><input type="radio" name="price" value="20+"> Trên 20 triệu</label>
        </div>
        <input type="range" min="11990000" max="46990000" step="100000" id="price-range">
        <p>11.990.000đ - 46.990.000đ</p>
      </div>
      <div class="filter-section">
        <h5>Dung lượng ROM</h5>
        <button>128 GB</button>
        <button>256 GB</button>
        <button>512 GB</button>
        <button>1 TB</button>
      </div>
      <div class="filter-section">
        <h5>Kết nối</h5>
        <button>NFC</button>
      </div>
      <div class="product-sort">
        <label for="sort">Sắp xếp theo:</label>
        <select id="sort">
          <option value="popular">Nổi bật</option>
          <option value="price-asc">Giá thấp - Cao</option>
          <option value="price-desc">Giá cao - Thấp</option>
        </select>
      </div>
    </div>
    

    <!-- Product Grid -->
    <div class="product-grid">
      <div class="product-list">
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_16_pro_max_bda3030b4b.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_16_f27848b783.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_15_plus_80a37cdce5.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_14_48a46d1684.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_11_3d0cd738fd.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>    
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://cdn2.fptshop.com.vn/unsafe/150x0/filters:quality(100)/iphone_14_48a46d1684.png" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://via.placeholder.com/150" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div class="product-card">
          <img src="https://via.placeholder.com/150" alt="Product">
          <h5>iPhone 16 Pro Max 256GB</h5>
          <p class="price">33.990.000 đ <span class="discount">Giảm 1.000.000 đ</span></p>
          <div class="variants">
            <button>128 GB</button>
            <button>256 GB</button>
            <button>512 GB</button>
            <button>1 TB</button>
          </div>
          <button class="compare-btn">So sánh</button>
        </div>
        <div id="content-area">
    <!-- Nội dung sẽ thay đổi -->
    <p>Đây là nội dung ban đầu đây nè .</p>
</div>

<!-- Nút bấm -->
<button onclick="changeContent()">Cập nhật nội dung</button>
        <!-- Thêm sản phẩm tương tự -->
      </div>
    </div>
  </div>
</body>
</html>
@include('layouts.home.footer')
@include('layouts.home.components.product-popup')