@extends('templates.master')

@section('content-center')
<div class="row">
<div class="card card-body" style="border: none;">
    <img src="{{ asset($product->imgUrl) }}" class="foto-articulo" />
    @php
        $var = $product->price - ($product->price * ($product->discountPercent / 100));
        $var = round($var, 2);
    @endphp
    <h2>{{$product->name}}</h2>
    @if(isset($product->Company()->first()->name))
    <h5>Desarrollado por {{$product->Company()->first()->name}}</h5>
    @else 
    <h5> Desarrollado por una empresa anónima</h5>
    @endif
    <text>{{$product->description}}</text>
    <p><strong>{{ $var }}€</strong></p>
    <p><del>{{ $product->price }}€</del> - {{ $product->discountPercent }}% de descuento</p>
    <a class="btn btn-primary" href= " {{ route('cart.add', $product->id) }} " style="padding: 10px 20px;"> Añadir al carro </a>
</div>
</div>
@endsection
