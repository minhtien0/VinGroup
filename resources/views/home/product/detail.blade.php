

@section('content')
<div class="product-detail">
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('images/' . $product->avt) }}" alt="{{ $product->name }}">
    <p>Giá: {{ number_format($product->price) }} VNĐ</p>
    <p>Màu: {{ $product->color }}</p>
    <p>Bộ nhớ: {{ $product->gb }} GB</p>
    <p>Mô tả: {{ $product->loai }}</p>
</div>
@endsection
