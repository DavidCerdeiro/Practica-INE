<header class="jumbotron text-left cabecera">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Todo Juegazos</h1>
      <form class="d-flex form-inline">
        <input type="text" class="form-control" placeholder="Buscar">
        <button type="submit" class="button" style="margin-left:10px;">Buscar</button>
      </form>
      <div class="d-flex justify-content-end">
        @if(Auth::check())
          <a href="{{ route('dashboard') }}" class="link">{{ Auth::user()->name }}</a>
          <a href="{{route('user.logout') }}" class="link">X</a>
        @else
          <a href="{{ route('login') }}" class="link">Autenticación</a>
        @endif
        <a href=" {{ route('cart.show') }}">
          <img src="{{ asset('img/carrito.png') }}" class="carrito">
          @php $var2 = session()->get('cart', new App\Models\Cart()) @endphp
          @if($var2->iTotalItems > 0)
          <p class="numproductos">Productos en carro: {{ $var2->iTotalItems }}</p>
          @endif
        </a>
      </div>
    </div>
</header>