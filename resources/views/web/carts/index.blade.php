@extends('web.layout.master')
@section('content')
<div class="cart-container">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div class="cart-products">
    <h1>Carrito</h1>
    @foreach($cart->products as $i => $plato)
    <!-- <img src="{{ asset($plato->getUrlImage1Attribute()) }}" alt=""> -->
    <form class="cart-products-content" method="POST" action="{{ route('web.platos.carts.destroy', ['cart' => $cart->id, $plato->id]) }}">
      @csrf
      @method('DELETE')
      <div class="cart-product-content-product">
        <span class="cart-product-name">{{ $plato->pivot->quantity }}x {{ $plato->nombre }}</span> <span class="cart-product-price"><b>{{ $plato->total }}€</b></span><button type="submit">x</button>
      </div>
    </form>
    @endforeach
  </div>
  <div class="cart-price">
    <div class="cart-price-content">
      <div>
        <div class="cart-cod-desc">
          <input type="text" placeholder="Código descuento"><input type="submit" value="Aplicar">
        </div>
        <div class="cart-price-subtotal-content">
          <p class="cart-price-subtotal"><span>Subtotal</span><span>{{$cart->total}}€</span></p>
          <p class="cart-price-subtotal"><span>Descuento</span><span>0€</span></p>
          <p class="cart-price-subtotal"><span><del>Gastos de envío</del></span><span><del>0€</del></span></p> <!-- implementar gastos de envío -->
        </div>
        <p class="cart-price-total"><b><span>TOTAL</span><span>{{ $cart->total }}€</span></b></p>
      </div>
      @inject('cartService','App\Services\CartService')
      @if($cartService->countProducts() < 5) <a class="mist_btn_disable" href="#">Pedido mínimo de 5 platos</a>
        @else
        <a class="mist_btn" href="{{ route('web.orders.create') }}">Tramitar pedido</a>
        @endif
    </div>
  </div>
  @endif
</div>
@include('web.layout.newsletter')
@endsection