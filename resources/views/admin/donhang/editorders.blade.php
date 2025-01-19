@extends('admin.layouts.app')
@section('title', 'Cập Nhật Đơn Hàng')
@section('content1')
<link rel="stylesheet" href="{{ asset('css/(admin)editorders.css') }}">

<div class="container">
    <h2 class="h4 mb-3">Chỉnh sửa đơn hàng {{$order->id}} </h2>

    <!-- Hiển thị thông báo lỗi nếu có -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form chỉnh sửa đơn hàng -->
    <form action="{{ route('admin.donhang.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">Tên Khách Hàng</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                value="{{ $order->khachhang }}" required>
        </div>
        <div class="form-group">
            <label for="payment_status">Trạng Thái Thanh Toán</label>
            <select class="form-control" id="payment_status" name="payment_status" required>
                <option value="1" {{ $order->trangthai == 1 ? 'selected' : '' }}>Đã thanh toán</option>
                <option value="0" {{ $order->trangthai == 0 ? 'selected' : '' }}>Chờ thanh toán</option>
            </select>
        </div>
        <div class="form-group">
            <label for="order_status">Trạng Thái Đơn Hàng</label>
            <select class="form-control" id="order_status" name="order_status" required>
                <option value="Đang Vận Chuyển" {{ $order->trangthaidonhang == 'Đang Vận Chuyển' ? 'selected' : '' }}>Đang Vận Chuyển</option>
                <option value="Đang Vận Chuyển" {{ $order->trangthaidonhang == 'Đang Vận Chuyển' ? 'selected' : '' }}>Đang Giao Hàng</option>
                <option value="Hoàn thành" {{ $order->trangthaidonhang == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="Đã hủy" {{ $order->trangthaidonhang == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>
        <div class="form-group">
            <label for="note">Ghi Chú Đơn Hàng</label>
            <textarea class="form-control" id="note" name="note">{{ $order->ghichu }}</textarea>
        </div>
      
        
        <button type="submit" class="btn btn-success">Cập Nhật Đơn Hàng</button>
    </form>
</div>

@endsection