@extends('layouts.main-layout')

@section('content')
    <h1>Products</h1>   
    <a href="{{route('product.home')}}">PRODUCT</a>
    <br>
    <a href="{{ route('product.create') }}">CREATE NEW PRODUCT</a>
    @foreach ($categories as $category)
        <h2>{{ $category -> name }}</h2>
        <ul>
            @foreach ($category -> products as $product)
                <li>
                    [{{ $product -> code }}] {{ $product -> name }}
                    - {{ $product -> typology -> name }}
                    - DIGITAL: 
                    {{ $product -> typology -> digital ? "YES" : "NO" }}
                    ----
                    <a href="{{route('product.delete', $product)}}">DELETE</a>
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection