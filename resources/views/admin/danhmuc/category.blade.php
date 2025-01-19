@extends('admin.layouts.app')
@section('content1')
<link rel="stylesheet" href="{{ asset('css/(admin)category.css') }}">
<div class="header-bottom d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Danh Sách Danh Mục</h1>
    <div>
        <button type="button" class="btn btn-primary" onclick="window.location.href='/admin/danhmuc/addcategory'">
            Thêm Danh Mục
        </button>
    </div>
</div>
<div class="container-fluid">
    <div class="search-box">
    <input type="text" id="search-input" class="form-control" placeholder="Nhập tên danh mục" style="width:20%">
        <button><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg></i></button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Trạng Thái</th>
                    <th>Danh Mục Cha</th>
                    <th>Ngày Tạo</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody id="category-table-body">
            @foreach($categories as $category)
    <tr class="{{ $category->trangthai == 0 ? 'hidden' : '' }}">
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->trangthai == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
        <td>Không có</td> <!-- Đây là danh mục cha, không có danh mục cha -->
        <td>{{ $category->time }}</td>
        <td>
            <a href="{{ route('admin.danhmuc.category.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a> |
            <form action="{{ route('admin.danhmuc.category.destroy', $category->id)}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </td>
    </tr>
@endforeach

@foreach($childCategories as $child)
    <tr class="{{ $child->trangthai == 0 ? 'hidden' : '' }}">
        <td>{{ $child->id }}</td>
        <td>{{ $child->name }}</td>
        <td>{{ $child->trangthai == 1 ? 'Hiển thị' : 'Ẩn' }}</td>
        <!-- Lấy tên danh mục cha bằng cách sử dụng bảng categori -->
        @php
            $parentCategory = DB::table('categori')->where('id', $child->parent_id)->first();
        @endphp
        <td>{{ $parentCategory ? $parentCategory->name : 'Không có' }}</td>
        <td>{{ $child->created_at }}</td>
        <td>
            <a href="{{ route('admin.danhmuc.category.edit', $child->id) }}" class="btn btn-warning btn-sm">Sửa</a> |
            <form action="{{ route('admin.danhmuc.category.destroy', $child->id)}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#search-input').on('input', function () {
            const searchValue = $(this).val(); // Lấy giá trị từ ô tìm kiếm

            $.ajax({
                url: '{{ route("admin.danhmuc.category.search") }}',
                type: 'GET',
                data: { search: searchValue },
                success: function (response) {
                    $('#category-table-body').html(response.html); // Cập nhật danh sách
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error); // In ra lỗi để debug
                    alert('Có lỗi xảy ra khi tìm kiếm.');
                }
            });
        });

        // Kiểm tra nếu có thông báo lỗi từ server
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: '{{ session('error') }}',
            });
        @endif
        // Kiểm tra nếu có thông báo thành công
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: '{{ session('success') }}',
            });
        @endif
    });
</script>
@endsection