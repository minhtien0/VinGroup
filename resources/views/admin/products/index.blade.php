@extends('admin.layouts.app')

@section('content1')
<div class="container mt-4">
    <style>
        /* CSS thêm khung */
        table {
            border-collapse: collapse; /* Loại bỏ khoảng cách giữa các ô */
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ccc; /* Màu và kiểu khung */
        }
        th {
            background-color: #343a40; /* Màu nền tiêu đề */
            color: white; /* Màu chữ tiêu đề */
            text-align: center;
            padding: 10px;
        }
        td {
            text-align: center; /* Canh giữa văn bản */
            padding: 10px; /* Khoảng cách trong ô */
        }
        img {
            border: 1px solid #ccc; /* Khung cho ảnh */
            padding: 2px;
            border-radius: 4px; /* Bo góc cho ảnh */
        }
        .btn {
            padding: 5px 10px;
            margin: 2px;
        }
        .btn-danger {
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .btn-danger:hover {
            background-color: #ff1a1a;
        }
        .btn-warning {
            background-color: #ffc107;
            color: black;
            border: none;
            border-radius: 4px;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>

    <h2 class="mb-4">Quản lý Sản phẩm</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    {{-- Thanh tìm kiếm --}}
    <form action="{{ route('products.index') }}" method="GET" class="mb-3" style="max-width:400px;">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm sản phẩm..."
                   value="{{ $search ?? '' }}">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>
    
    {{-- Nút thêm sản phẩm --}}
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Thêm sản phẩm</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Màu</th>
                <th>GB</th>
                <th>Số lượng</th>
                <th>Danh mục cha</th>
                <th>Danh mục con</th>
                <th>Loại</th>
                <th>Slug</th>
                <th>Trạng thái</th>
                <th>Ảnh phụ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $prod)
                <tr>
                    <td>{{ $prod->id }}</td>
                    <td>
                        @if($prod->avt)
                            <img src="{{ asset('img/'.$prod->avt) }}" alt="Avatar" width="50" height="50">
                        @endif
                    </td>
                    <td>{{ $prod->name }}</td>
                    <td>{{ $prod->price }}</td>
                    <td>{{ $prod->color }}</td>
                    <td>{{ $prod->gb }}</td>
                    <td>{{ $prod->soluong }}</td>
                    <td>{{ $prod->categori }}</td>
                    <td>{{ $prod->categori_child }}</td>
                    <td>{{ $prod->loai }}</td>
                    <td>{{ $prod->slug }}</td>
                    <td>
                        @if($prod->trangthai == 1)
                            <span class="badge bg-success">Hiển thị</span>
                        @else
                            <span class="badge bg-secondary">Ẩn</span>
                        @endif
                    </td>
                    <td>
                        @foreach($prod->images as $img)
                            <img src="{{ asset('img/'.$img->img) }}" alt="Ảnh phụ" width="40" height="40">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $prod->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('products.destroy', $prod->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection