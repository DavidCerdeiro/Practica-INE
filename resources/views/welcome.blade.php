@extends('templates.master')

@section('content-center')
<div class="row">
    <div class="col-sm-10">
        <div class="row">
            <h2>Ofertas de juegazos</h2>
            @foreach ($aProduct_offering as $product)
            @php
                $var = $product->price - ($product->price * ($product->discountPercent / 100));
                 $var = round($var, 2);
            @endphp
            <div class="col-sm-2 card card-body" style="border: none;">
                <a href="product/{{ $product->id }}">
                    <img src="{{ $product->imgUrl }}" class="foto-articulo" />
                </a>
                <p><strong>{{ $var }}€</strong></p>
                <p><del>{{ $product->price }}€</del> - {{ $product->discountPercent }}% de descuento</p>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h2>Juegazos nuevos</h2>
            @foreach ($aProduct_new as $product)
            <div class="col-sm-2 card card-body" style="border: none;">
                <a href="product/{{ $product->id }}">
                    <img src="{{ $product->imgUrl }}" class="foto-articulo" />
                </a>
                @if($product->hasDiscount()) <!-- Assuming you have a hasDiscount method -->
                @php
                    $var = $product->price - ($product->price * ($product->discountPercent / 100));
                    $var = round($var, 2);
                @endphp
                <p><strong>{{ $var }}€</strong></p>
                <p><del>{{ $product->price }}€</del> - {{ $product->discountPercent }}% de descuento</p>
                @else
                <p><strong>{{ $product->price }}€</strong></p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('content-right')
<div class="col-sm-2" style="background-color: #BCB9C1;">
    <h6>Lo más vendidos en juegos</h6>
    <ol class="numbered-list">
        <li class="numero">
            <a href="product/{{ $product->id }}">
                <img src="img/acunity.jpg" class="foto-derecha">
            </a>
        </li>
        <li class="numero">
            <a href="product/{{ $product->id }}">
                <img src="img/card-000005.jpg" class="foto-derecha">
            </a>
        </li>
        <li class="numero">
            <a href="product/{{ $product->id }}">
                <img src="img/skyrim.jpg" class="foto-derecha">
            </a>
        </li>
        <li class="numero">
            <a href="product/{{ $product->id }}">
                <img src="img/gtavi.jpg" class="foto-derecha">
            </a>
        </li>
        <li class="numero">
            <a href="product/{{ $product->id }}">
                <img src="img/starfield.jpg" class="foto-derecha">
            </a>
        </li>
    </ol>
    <button type="submit" class="button" style="margin-left: 10px;">Ver más juegos</button>
</div>
@endsection
