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
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVuPybVvIp-eSRhCcx-sh2oJxZDLlXZXltAQ&s"
        alt="iPhone 14 Series">
    </div>
    <div class="banner-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKq5sm5waWWASo8LjkIN_X7fa_2RPchE23vQ&s"
        alt="iPhone 13 Series">
    </div>
    <div class="banner-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAC0xfcwCnFdvSmEy1bf0OSvm2f1K4ERjCkQ&s"
        alt="iPhone 12 Series">
    </div>
    <div class="banner-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSA4YH-lpAGdtyF1K_wEVRJqO0MWYVRZiiGdA&s"
        alt="iPhone 11 Series">
    </div>
  </div>


  <div class="danhmuc-container">
  @foreach ($childCategories as $child)
    <div class="danhmuc-seri" style="text-transform: uppercase;" data-category="iphone-14">
      {{$child->name}}
    </div>
  @endforeach
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

    <div class="container">
      <div>
        <div class="product-list">
          @foreach ($products as $product)
        <a style="text-decoration:none;" href="{{ route('home.detail', ['slug' => $product->slug, 'id' => $product->id]) }}"><div class="product-item">
        <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
        <h2>{{ $product->name }}</h2>
        <p>Giá: {{ number_format($product->price) }} VNĐ</p>
        </div></a>
      @endforeach
        </div>
      </div>
    </div> 
  </div>
</body>

</html>
@include('layouts.home.footer')
@include('layouts.home.components.product-popup')