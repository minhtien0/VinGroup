@extends('admin.layouts.app')

@section('content3')
<h2 class="mb-4">Sửa sản phẩm</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
        @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Tên sản phẩm</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Giá</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Màu (color)</label>
        <input type="text" name="color" class="form-control"
               value="{{ old('color', $product->color) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">GB (dung lượng)</label>
        <input type="number" name="gb" class="form-control"
               value="{{ old('gb', $product->gb) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Số lượng</label>
        <input type="number" name="soluong" class="form-control"
               value="{{ old('soluong', $product->soluong) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Danh mục cha</label>
        <select name="categori" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($categories as $cate)
                <option value="{{ $cate->id }}"
                    {{ old('categori', $product->categori) == $cate->id ? 'selected' : '' }}>
                    {{ $cate->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Danh mục con</label>
        <select name="categori_child" class="form-select" required>
            <option value="">-- Chọn --</option>
            @foreach($childCategories as $child)
                <option value="{{ $child->id }}"
                    {{ old('categori_child', $product->categori_child) == $child->id ? 'selected' : '' }}>
                    {{ $child->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Loại</label>
        <input type="text" name="loai" class="form-control"
               value="{{ old('loai', $product->loai) }}">
    </div>

    {{-- slug tạo tự động --}}

    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="trangthai" class="form-select">
            <option value="1" {{ old('trangthai', $product->trangthai) == 1 ? 'selected' : '' }}>Hiển thị</option>
            <option value="0" {{ old('trangthai', $product->trangthai) == 0 ? 'selected' : '' }}>Ẩn</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Ảnh đại diện (avt)</label>
        <input type="file" name="avt" class="form-control">
        @if($product->avt)
            <div class="mt-2">
                <img src="{{ asset('img/'.$product->avt) }}" alt="" width="80">
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Ảnh chi tiết (chọn nhiều)</label>
        <input type="file" name="more_img[]" class="form-control" multiple>
        @if(!empty($images))
            <div class="mt-2">
                @foreach($images as $img)
                    <img src="{{ asset('img/'.$img->img) }}" alt="" width="80" style="object-fit:cover; margin-right:5px;">
                @endforeach
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
</form>
@endsection
