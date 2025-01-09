@extends('admin.layouts.app')

@section('comment')
<div class="container mt-4">

    <style>
        .container {
            background-color: #b612b3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        table thead {
            background-color: #343a40;
            color:white; /* Đổi màu chữ thành xanh */
            text-align: center;
        }
        th, td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }
        table tbody td {
            color: #618a0a; /* Đổi màu chữ nội dung thành xanh */
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }
        table tbody tr:hover td {
            background-color: #f1f1f1;
        }
        .avatar, .img-comment {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .btn {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .btn-danger {
            background-color: #e74c3c;
            color: #ffffff;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .badge {
            font-size: 90%;
            padding: 5px 8px;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .alert {
            border-radius: 4px;
        }
        .mb-4{
            display: block;
            margin: 0 auto;
            text-align: center;
        }
    </style>

    <h2 class="mb-4">Quản lý Bình luận</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Time</th>
                <th>Content</th>
                <th>Rate</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Trạng thái</th>
                <th>Ảnh bình luận</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        @forelse($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>
                    @if($comment->avt)
                        <img src="{{ asset('img/'.$comment->avt) }}" 
                             alt="Avatar" 
                             class="avatar">
                    @endif
                </td>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->time }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->rate }}</td>
                <td>{{ $comment->khachhang }}</td>
                <td>{{ $comment->sanpham }}</td>
                <td>
                    @if($comment->trangthai == 1)
                        <span class="badge bg-success">Hiển thị</span>
                    @else
                        <span class="badge bg-secondary">Ẩn</span>
                    @endif
                </td>
                <td>
                    @if(!empty($comment->images))
                        @foreach($comment->images as $imgCmt)
                            <img src="{{ asset('img/'.$imgCmt->img) }}"
                                 alt="Bình luận"
                                 class="img-comment">
                        @endforeach
                    @endif
                </td>
                <td>
                    <form action="{{ route('comments.destroy', $comment->id) }}" 
                          method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');">
                            Xoá
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="11">Không có bình luận nào</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{-- Nếu có phân trang
    <div class="pagination">
        {{ $comments->links() }}
    </div>
</div> --}}
@endsection
