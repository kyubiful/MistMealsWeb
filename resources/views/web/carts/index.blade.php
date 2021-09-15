@extends('web.layout.master')
@section('content')
<div class="cart-container">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div class="empty-cart">
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
        <span class="cart-product-name">{{ $plato->pivot->quantity }}x {{ $plato->nombre }} - {{ $plato->plato_peso->valor }}</span> <span class="cart-product-price"><b>{{ $plato->total }}€</b></span><button type="submit">x</button>
      </div>
    </form>
    @endforeach
  </div>
  <div class="cart-price">
    <div class="cart-price-content">
      <div>
        <div class="cart-cod-desc">
          <form method="POST" action="{{ route('web.cart.discount') }}">
            @csrf
            <input type="text" name="discount_name" placeholder="Código descuento">
            <input type="submit" value="Aplicar">
          </form>
          @if(Cookie::get('descuento')!=null)
          <p>Descuento aplicado: {{Cookie::get('descuento')}}% <a style="color: white;" href="{{route('web.cart.discount.remove')}}">X</a></p>
          @endif
          {{Session()->get('discountMessageError')}}
        </div>
        <div class="cart-price-subtotal-content">
          <p class="cart-price-subtotal"><span>Subtotal</span><span>{{$cart->total}}€</span></p>
          <p class="cart-price-subtotal"><span>Descuento</span><span>-@if(Cookie::get('descuento')==null)0€ @else {{(Cookie::get('descuento')*$cart->total)/100}}€ @endif</span></p>
          <p class="cart-price-subtotal"><span><del>Gastos de envío</del></span><span><del>4,15€</del></span></p> <!-- implementar gastos de envío -->
        </div>
        <p class="cart-price-total"><b><span>TOTAL</span><span>@if(Cookie::get('descuento')==null){{ $cart->total }}€ @else {{($cart->total)*((100-Cookie::get('descuento'))/100)}}€ @endif</span></b></p>
      </div>
      @inject('cartService','App\Services\CartService')
      @if($cartService->countProducts() < 5)
      <a style="margin: auto;" class="mist_btn_disable" href="#">Tramitar pedido</a>
      <p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>
      @elseif($cartService->countProducts() > 8)
      <a style="margin: auto;" class="mist_btn_disable" href="#">Tramitar pedido</a>
      <p style="color: red; text-align: center;">*Pedido máximo de 8 platos</p>
      @else
      <a style="margin: auto;" class="mist_btn" href="{{ route('web.orders.create') }}">Tramitar pedido</a>
      @endif
      @if(session('lunch')!==null AND session('dinner')!==null)
      <a class="mist_btn" style="margin: auto; margin-top: 75px;" href="{{ url('/menu/dishes') }}">Volver al menú</a>
      @endif
    </div>
  </div>
  @endif
</div>
@include('web.layout.newsletter')
  @if(session()->has('message'))
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
      <p>{{ session()->get('message') }}</p>
    </div>
  </div>
  @endif
@endsection
