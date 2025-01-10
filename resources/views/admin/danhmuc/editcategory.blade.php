@extends('admin.layouts.app')
@section('title', 'Cập Nhật Danh Mục')
@section('content1')
<link rel="stylesheet" href="{{ asset('css/(admin)editcategory.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="container">
    <h2 class="h4 mb-4">Chỉnh Sửa Danh Mục {{ $category->name ?? $childCategory->name }}</h2>

    <!-- Nếu muốn ẩn hoàn toàn khối báo lỗi HTML, cho d-none hoặc xóa luôn -->
    @if ($errors->any())
        <div class="alert alert-danger d-none">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tương tự, ẩn nếu muốn -->
    @if (session('success'))
        <div class="alert alert-success d-none">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.danhmuc.update', $childCategory->id ?? $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Tên danh mục --}}
        <div class="form-group">
            <label for="item_name">Tên Danh Mục</label>
            <input 
                type="text" 
                class="form-control"
                id="item_name"
                name="item_name"
                value="{{ old('item_name', $childCategory->name ?? $category->name) }}"
                required
            >
        </div>

        {{-- Trạng thái --}}
        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select class="form-control" id="status" name="status" required>
                <option 
                    value="1" 
                    {{ old('status', $childCategory->trangthai ?? $category->trangthai) == 1 ? 'selected' : '' }}>
                    Hiển thị
                </option>
                <option 
                    value="0"
                    {{ old('status', $childCategory->trangthai ?? $category->trangthai) == 0 ? 'selected' : '' }}>
                    Ẩn
                </option>
            </select>
        </div>

        {{-- Danh mục cha (nếu có) --}}
        <div class="form-group">
            <label for="parent_id">Danh mục cha</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Không có</option>
                @foreach($parentCategories as $parent)
                    <option 
                        value="{{ $parent->id }}" 
                        {{ old('parent_id', $childCategory->parent_id ?? null) == $parent->id ? 'selected' : '' }}
                    >
                        {{ $parent->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer">
            <a href="{{ route('admin.danhmuc.category') }}">
                <button type="button" class="btn btn-secondary">Trở Lại</button>
            </a>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
{{-- Hiển thị popup lỗi nếu Controller trả về popupError --}}
@if(session('popupError'))
        Swal.fire({
            icon: 'error',
            title: 'Đã có lỗi',
            text: '{{ session("popupError") }}'
        });
@endif
{{-- Hiển thị popup thành công nếu Controller trả về popupSuccess --}}
@if(session('popupSuccess'))
        Swal.fire({
            icon: 'success',
            title: 'Thành Công',
            text: '{{ session("popupSuccess") }}'
        });
@endif
</script>
@endsection