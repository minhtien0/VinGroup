@extends('admin.layouts.app')
@section('content1')
<link rel="stylesheet" href="{{ asset('css/(admin)orders.css') }}">
<div class="header-bottom d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Danh Sách Đơn Hàng</h1>
    <form action="{{ route('admin.donhang.orders') }}" method="GET" class="form-inline">
        <div class="form-group mr-2">
            <select name="trangthai" id="filter-status" class="form-control">
                <option value="">TT Thanh toán</option>
                <option value="1" {{ request('trangthai') == '1' ? 'selected' : '' }}>Đã thanh toán</option>
                <option value="0" {{ request('trangthai') == '0' ? 'selected' : '' }}>Chờ thanh toán</option>
            </select>
        </div>
        <div class="form-group mr-2">
            <select name="trangthaidonhang" id="filter-order-status" class="form-control">
                <option value="">TT Đơn hàng</option>
                <option value="Đang Vận Chuyển" {{ request('trangthaidonhang') == 'Đang Vận Chuyển' ? 'selected' : '' }}>Đang Vận Chuyển</option>
                <option value="Đang Giao Hàng" {{ request('trangthaidonhang') == 'Đang Giao Hàng' ? 'selected' : '' }}>Đang Giao Hàng</option>
                <option value="Hoàn thành" {{ request('trangthaidonhang') == 'Hoàn thành' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="Đã hủy" {{ request('trangthaidonhang') == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>
        <div class="form-group mr-2">
            <label for="selected_date" class="mr-2">Ngày Tạo</label>
            <input type="date" name="selected_date" id="selected_date" class="form-control"
                value="{{ request('selected_date') }}">
        </div>
        <button type="submit" class="btn btn-primary">Lọc</button>
        <a href="{{ route('admin.donhang.orders') }}" class="btn btn-secondary ml-2">Bỏ lọc</a>
    </form>

</div>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày tạo đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Trạng thái Thanh toán</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Ghi chú đơn hàng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->time }}</td>
                        <td>{{ $order->khachhang }}</td>
                        <td>{{ $order->trangthai }}</td>
                        <td>{{ $order->trangthaidonhang }}</td>
                        <td>{{$order->sanpham}}</td>
                        <td>{{$order->soluong}}</td>
                        <td>{{ $order->ghichu }}</td>
                        <td style="color: #007BFF">
                            <a href="{{ route('admin.donhang.orders.edit', $order->id) }}"
                                class="btn btn-warning btn-sm">Sửa</a> |
                            <form action="{{ route('admin.donhang.orders.destroy', $order->id)}}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <!-- <tr>
                                                    <td colspan="8" class="text-center">Không có đơn hàng nào</td>
                                                </tr> -->
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection