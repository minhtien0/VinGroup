@extends('layouts.home.app')
@section('dssanpham')
<title>contact</title>
@endsection
@section('content')
@endsection
@section('content')
<body__dssanpham>

    <div class="gh-container">
        <!-- Cart Title -->
        <h1 class="cart-title">GIỎ HÀNG</h1>
        <div class="cart-content-tong">

            <div class="cart-left">
                <!-- Cart Item Section -->
                <div class="cart-item-header cart-item-oke">
                    <div class="product-info"><span><input type="checkbox" checked> Tất cả (1 sản phẩm)</span></div>
                    <span>Đơn giá</span>
                    <span>Số lượng</span>
                    <span>Thành tiền</span>
                    <div class="delete">
                        <i class="fas fa-trash-alt"></i>
                    </div>

                </div>
                <div>
                    <div class="cart-item-luot">
                        <div class="cart-item">
                            <div class="cart-item-body cart-iten-oke">
                                <div class="product-info">
                                    <div><input type="checkbox" checked></div>
                                    <div class="product-details">
                                        <img src="https://th.bing.com/th/id/OIP.1ztSnnRS89F9JUotXsSgJAHaHa?w=194&h=194&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                                            alt="Product Image">
                                        <div class="name">Adapter Sạc Anker 511 Charger Nano 3 30W 1 Cổng Type-C
                                            A2147Adapter Sạc Anker 511 Charger Nano 3 30W 1 Cổng Type-C A2147</div>
                                        <div class="variant">Misty Blue</div>
                                    </div>
                                </div>
                                <div class="price">
                                    241.000đ <span class="discount-price">500.000đ</span>
                                </div>
                                <div class="quantity-control">
                                    <div style="display: flex; align-items: center; gap: 5px;">
                                        <button onclick="decreaseValue(this)"
                                            style="padding:8px; font-size:13px; border-radius: 5px;">-</button>
                                        <input type="text" value="1" style="width: 40px; text-align: center;" readonly>
                                        <button onclick="increaseValue(this)"
                                            style="padding:8px; font-size:13px; border-radius: 5px;">+</button>
                                    </div>
                                </div>
                                <div class="price">241.000đ</div>
                                <div class="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </div>
                            <!-- ///////////////// -->



                        </div>
                        <div class="cart-right">
                            <div class="summary">
                                <div class="discount-info">
                                    <i class="fas fa-tag"></i>
                                    <a href="#">Thêm Voucher</a>
                                </div>
                                <div class="summary-content1" style="border-bottom: 1px solid #e0e0e0;">
                                    <div>
                                        <p>Tổng tiền hàng</p>
                                        <p>Giảm giá trực tiếp</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <p>500.000đ</p>
                                        <p>-259.000đ</p>
                                    </div>
                                </div>
                                <div class="summary-content2">
                                    <div>
                                        <p class="total">Tổng tiền thanh toán</p>
                                        <p class="savings">Tiết kiệm</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <p class="total">241.000đ</p>
                                        <p class="savings">259.000đ</p>
                                    </div>
                                </div>
                                <a href="#" class="summary-button">Mua Hàng (1)</a>
                            </div>
                        </div>
                    </div>

                </div>
</body__dssanpham>

<script src="{{ asset('js/giohang.js') }}"></script>

@endsection