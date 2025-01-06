@extends('layouts.home.header')
@section('content')
<link rel="stylesheet" href="{{ asset('css/giohang.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<div class="gh-container">
    <h1 class="cart-title">GIỎ HÀNG</h1>
    <div class="cart-content-tong">
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
                        <button onclick="clearCart()" class="clear-cart-btn">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="cart-item-luot">
                    <!-- Sản Phẩm -->
                    @foreach($cartItems as $item)
                        <div class="cart-item row">
                            <div class="product-info wide-column">
                                <input type="checkbox" class="product-checkbox" data-id="{{ $item->id }}">
                                <!-- Hiển thị hình ảnh -->
                                @if ($item->images->isNotEmpty())
                                    <img src="{{ asset('img/' . $item->images->first()->img) }}" alt="Hình ảnh sản phẩm">
                                @else
                                    <img src="{{ asset('img/default.jpg') }}" alt="Hình ảnh mặc định">
                                @endif
                                <div class="name">{{ $item->product->name }}</div>
                            </div>
                            <div class="price column">{{ number_format($item->product->price) }}đ</div>
                            <div class="quantity-control column">
                                <button onclick="update({{ $item->id }}, 'decrease')" class="btn-quantity">-</button>
                                <input type="number" value="{{ $item->soluong }}" min="1" readonly class="quantity-input">
                                <button onclick="update({{ $item->id }}, 'increase')" class="btn-quantity">+</button>
                            </div>
                            <div class="price column">{{ number_format($item->product->price * $item->soluong) }}đ</div>
                            <div class="column">
                                <button onclick="removeProduct({{ $item->id }})" class="delete-btn">
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
                <p>Tổng tiền thanh toán: <strong id="total-price">{{ number_format($totalPrice) }}đ</strong></p>
                <a href="#" class="summary-button">Mua Hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/giohang.js') }}"></script>