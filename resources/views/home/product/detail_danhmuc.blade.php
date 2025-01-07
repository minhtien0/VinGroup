

@section('content')
<div class="product-detail">
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('images/' . $product->avt) }}" alt="{{ $product->name }}">
    <p>Giá: {{ number_format($product->price, 0, ',', '.') }}₫</p>
    <p>Màu sắc: {{ $product->color }}</p>
    <p>Dung lượng: {{ $product->gb }}</p>
</div>
@endsection