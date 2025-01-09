@extends('admin.layouts.app')
@section('content1')
<link rel="stylesheet" href="{{ asset('css/(admin)addcategory.css') }}">
<div class="container">
    <div>
        <div>
            <!-- Form không cần gửi toàn trang -->
            <form id="addCategoryForm">
                @csrf
                <div class="form-group">
                    <label for="item_name">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="1">Hiển thị</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="parent_id">Danh mục cha</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">Không có</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.danhmuc.category') }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Trở Lại</button>
                    </a>
                    <button type="submit" class="btn btn-primary" id="saveItemButton">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addCategoryForm').on('submit', function (e) {
            e.preventDefault(); // Ngăn form reload trang

            $.ajax({
                url: '{{ route("admin.danhmuc.store.ajax") }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        // Chuyển hướng về trang category
                        window.location.href = response.redirect_url;
                    } else {
                        alert(response.message); // Nếu có lỗi (vd: tên đã tồn tại)
                    }
                },
                error: function (xhr) {
                    alert('Tên danh mục đã tồn tại!');
                }
            });
        });
    });
</script>
@endsection