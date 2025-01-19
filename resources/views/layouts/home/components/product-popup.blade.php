<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VinGroup Moblie</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
  .popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.popup-content {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  text-align: center;
  max-width: 400px;
  width: 100%;
}

.hidden {
  display: none;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  background: transparent;
  border: none;
  font-size: 18px;
  cursor: pointer;
}
</style>
<div id="product-popup" class="popup-overlay hidden">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup('product-popup')">&times;</span>
        <h2>Khuyến mãi đặc biệt</h2>
        @if (isset($hotProduct) && $hotProduct)
            <p>{{ $hotProduct->name }}</p>
            <img src="{{ asset('img/' . $hotProduct->avt) }}" alt="{{ $hotProduct->name }}">
            <p>Giá: {{ number_format($hotProduct->price) }} VNĐ</p>
            <a href="{{ route('home.detail', ['slug' => $hotProduct->slug, 'id' => $hotProduct->id]) }}" class="popup-btn">Xem chi tiết</a>
        @else
            <p>Không có sản phẩm nào thuộc danh mục 'Hót'.</p>
        @endif
    </div>
</div>

<script src="{{ asset('js/carousel.js') }}"></script>