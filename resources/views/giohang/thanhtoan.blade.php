<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="{{ asset('css/thanhtoan.css') }}">
    <script src="{{ asset('js/thanhtoan.js') }}" defer></script>
</head>

<body>
    @include('layouts.home.header')

    <div class="checkout-container">
        <h2>Thanh toán</h2>
        <form action="{{ route('xulythanhtoan') }}" method="POST">
            @csrf
            <!-- Hiển thị mã đơn hàng -->
            <div class="order-code">
                <p><strong>Mã đơn hàng:</strong> {{ $randomOrderCode }}</p>
                <input type="hidden" name="randomOrderCode" value="{{ $randomOrderCode }}">
            </div>

            <!-- Hiển thị sản phẩm trong giỏ hàng -->
            <div class="cart-items">
                <h3>Sản phẩm trong giỏ hàng</h3>
                @foreach ($selectedItems as $item)
                    <div class="cart-item">
                        @if (!empty($item->product->avt))
                            <img src="{{ asset('img/' . $item->product->avt) }}" alt="{{ $item->product->name }}">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" alt="Hình ảnh mặc định">
                        @endif
                        <p><strong>Sản phẩm:</strong> {{ $item->product->name }}</p>
                        <p><strong>Giá:</strong> {{ number_format($item->product->price) }}đ</p>
                        <p><strong>Số lượng:</strong> {{ $item->soluong }}</p>
                        <p><strong>Thành tiền:</strong> {{ number_format($item->product->price * $item->soluong) }}đ</p>
                    </div>
                @endforeach
            </div>

            <!-- Nhập địa chỉ giao hàng -->
            <div class="address">
                <h3>Địa chỉ giao hàng</h3>
                <input type="text" name="address" value="{{ $user->address }}" placeholder="Nhập địa chỉ mới" required>
            </div>

            <!-- Áp dụng voucher -->
            <div class="voucher">
                <h3>Áp dụng voucher</h3>
                <select name="voucher_id">
                    <option value="">Không áp dụng</option>
                    @foreach ($vouchers as $voucher)
                        <option value="{{ $voucher->id }}">{{ $voucher->code }} - Giảm {{ number_format($voucher->discount) }}đ</option>
                    @endforeach
                </select>
            </div>
            <!-- Thêm Ô Nhập Ghi Chú -->
            <div class="note">
                <h3>Ghi chú</h3>
                <textarea name="ghichu" rows="4" placeholder="Ghi chú">{{ old('ghichu') }}</textarea>
            </div>

            <div class="total">
                <h3>Tổng tiền:
                    {{ number_format($selectedItems->sum(function ($item) {
                        return $item->product->price * $item->soluong;
                    })) }}đ
                </h3>
            </div>

            <!-- Nút thanh toán -->
            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </form>
    </div>

    @include('layouts.home.footer')
</body>

</html>
