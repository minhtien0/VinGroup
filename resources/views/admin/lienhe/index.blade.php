@extends('admin.layouts.app')

@section('lienhe')
<div class="container mt-4">

    <style>
        /* CSS tùy chỉnh */
        body {
            background-color: black
            color: white; /* Màu chữ mặc định */
        }
        .container {
            background-color: #a305a3; /* Nền trắng cho nội dung */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #ffffff; /* Màu chữ trắng */
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd; /* Viền bảng */
        }
        table thead {
            background-color: #343a40; /* Màu nền tiêu đề */
            color: #ffffff; /* Màu chữ tiêu đề */
        }
        th, td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }
        table tbody td {
            color: #27ae60; /* Màu chữ xanh */
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9; /* Nền dòng lẻ */
        }
        table tbody tr:nth-child(even) {
            background-color: #ffffff; /* Nền dòng chẵn */
        }
        table tbody tr:hover {
            background-color: #f1f1f1; /* Hiệu ứng hover */
        }
        button {
            background-color: #e74c3c; /* Nút đỏ */
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c0392b; /* Đổi màu khi hover */
        }
        .huuthach{
            color: white;
            text-align: center;
        }
    </style>

    <h2 class="huuthach">Quản lý Liên hệ</h2>

    @if(session('success'))
        <div style="color: #27ae60; font-weight: bold;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SĐT</th>
                <th>Nội dung</th>
                <th>Thời gian</th>
                <th>Khách hàng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <form action="{{ route('lienhe.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>{{ $contact->id }}</td>
                        <td>
                            <input type="text" name="name" value="{{ old('name', $contact->name) }}" required>
                        </td>
                        <td>
                            <input type="text" name="sdt" value="{{ old('sdt', $contact->sdt) }}" required>
                        </td>
                        <td>
                            <textarea name="noidung" required>{{ old('noidung', $contact->noidung) }}</textarea>
                        </td>
                        <td>
                            <input type="datetime-local" name="thoigian" 
                                value="{{ old('thoigian', \Carbon\Carbon::parse($contact->thoigian)->format('Y-m-d\TH:i')) }}" required>
                        </td>
                        <td>
                            <input type="text" name="khachhang" value="{{ old('khachhang', $contact->khachhang) }}" required>
                        </td>
                        <td>
                            <button type="submit">Cập nhật</button>
                    </form>
                    <form action="{{ route('lienhe.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa liên hệ này?');">Xóa</button>
                    </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
