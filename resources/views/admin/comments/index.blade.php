@extends('admin.layouts.app')

@section('comment')
<div class="container mt-4">

    <style>
        /* Một ít CSS tùy chỉnh */
        table thead {
            background-color: #343a40; /* Màu nền head */
            color: #ffffff;            /* Màu chữ head */
        }
        table tr td img {
            object-fit: cover;
            border-radius: 4px;
        }
        .avatar {
            width: 50px;
            height: 50px;
        }
        .img-comment {
            width: 50px;
            height: 50px;
            margin-right: 4px;
        }
        .pagination {
            justify-content: center; 
        }
    </style>

    <h2 class="mb-4">Quản lý Bình luận</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered align-middle">
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
</div>
@endsection