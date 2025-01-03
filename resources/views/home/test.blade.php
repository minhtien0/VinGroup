@extends('layouts.home.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Test</title>
</head>
<body>
    <h1>Chào mừng!</h1>
    <ul>
        @foreach($sp as $product)
        <li>
            {{ $product->name }} - {{ number_format($product->price) }} VNĐ - {{ $product->color }} - 
            {{ $product->gb }} GB - {{ $product->category_name }}- <img src="{{ asset('img/' . $product->avt) }}"  width="100">
        <a href="{{ route('home.detail', $product->id) }}">Sửa</a>
        </li>
        @endforeach
    </ul>
    
</body>
@include('layouts.home.policy')
</html>
@endsection
