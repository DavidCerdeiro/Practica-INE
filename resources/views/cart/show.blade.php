@extends('templates.master')

@section('content-center')

    @php $cart = session()->get('cart', new App\Models\Cart()) @endphp

    <h6>Productos en carrito: {{ $cart->iTotalItems }}</h6>
    @if($cart->dTotalPrice < 0)
        <h6>Precio total: 0€</h6>
    @else
        <h6>Precio total: {{ $cart->dTotalPrice }}€</h6>
    @endif

    @foreach ($cart->htItem as $product)
        <div class="col-sm-2 card card-body" style="border: none;">
            <a >
               <img src="{{ asset($product['imgUrl']) }}" class="foto-articulo" />
            </a>
            <p><strong>{{ $product['nombre'] }}</strong></p>
            <p>{{ $product['precio'] }}€</p>
            <a href="{{ route('cart.operate', [ 'operation' => 'add', 'product' => $product['id']]) }}" class="boton-carrito">+</a>
            <p> Elementos en el carrito: {{ $product['cantidad'] }}</p>
            <a href="{{ route('cart.operate', [ 'operation' => 'remove', 'product' => $product['id']]) }}" class="boton-carrito">-</a>
            <a href="{{ route('cart.operate', [ 'operation' => 'removeAll', 'product' => $product['id']]) }}">Eliminar del carro</a>
        </div>
    @endforeach
@endsection