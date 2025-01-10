@extends('admin.layouts.app')

@section('lienhe')
<h1>Quản lý Liên hệ</h1>

    @if(session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
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
@endsection