<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="{{ asset('css/giohang.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('js/giohang.js') }}" defer></script>
</head>
<body>
    @include('layouts.home.header')

    <div class="gh-container">
        <h1 class="cart-title">GIỎ HÀNG</h1>
        <div class="cart-content-tong">
            <form action="{{ route('thanhtoan') }}" method="POST">
                @csrf
                <div class="cart-left">
                    @if($cartItems->isEmpty())
                        <p>Giỏ hàng của bạn trống!</p>
                    @else
                        <!-- Header -->
                        <div class="cart-item-header row">
                            <div class="product-info wide-column">
                                <input type="checkbox" id="select-all" onclick="selectAllProducts(this)">
                                <span>Tất cả ({{ $cartItems->count() }} sản phẩm)</span>
                            </div>
                            <div class="column"><span>Đơn giá</span></div>
                            <div class="column"><span>Số lượng</span></div>
                            <div class="column"><span>Thành tiền</span></div>
                            <div class="column">
                                <button type="button" onclick="clearCart()" class="clear-cart-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="cart-item-luot">
                            <!-- Sản Phẩm -->
                            @foreach($cartItems as $item)
                                <div class="cart-item row">
                                    <div class="product-info wide-column">
                                        <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="product-checkbox" data-id="{{ $item->id }}" data-price="{{ $item->product->price }}" data-quantity="{{ $item->soluong }}" onchange="calculateTotal()">
                                        <!-- Hiển thị hình ảnh -->
                                        @if (!empty($item->product->avt))
                                            <img src="{{ asset('img/' . $item->product->avt) }}" alt="{{ $item->product->name }}">
                                        @else
                                            <img src="{{ asset('img/default.jpg') }}" alt="Hình ảnh mặc định">
                                        @endif
                                        <div class="name">{{ $item->product->name }}</div>
                                    </div>
                                    <div class="price column">{{ number_format($item->product->price) }}đ</div>
                                    <div class="quantity-control column">
                                        <button type="button" onclick="update({{ $item->id }}, 'decrease')" class="btn-quantity">-</button>
                                        <input type="number" value="{{ $item->soluong }}" min="1" readonly class="quantity-input">
                                        <button type="button" onclick="update({{ $item->id }}, 'increase')" class="btn-quantity">+</button>
                                    </div>
                                    <div class="price column">{{ number_format($item->product->price * $item->soluong) }}đ</div>
                                    <div class="column">
                                        <button type="button" onclick="removeProduct({{ $item->id }})" class="delete-btn">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Hiển thị phân trang -->
                        <div class="pagination">
                            {{ $cartItems->links() }}
                        </div>
                    @endif
                </div>
                <!-- Sidebar -->
                <div class="cart-left">
                    <div class="giohangsummary">
                        <p>Tổng tiền thanh toán: <strong id="total-price">0đ</strong></p>
                        <button type="submit" class="summary-button">Thanh toán</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>

    @include('layouts.home.footer')
</body>
</html>
