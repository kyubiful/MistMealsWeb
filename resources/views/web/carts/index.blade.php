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
      <div class="cart-product-content-product" style="margin-bottom: 10px;">
        <img src="{{ asset($plato->getUrlImage1Attribute()) }}" style="width: 200px; height: 200px;" alt="">
        <span class="cart-product-name">{{ $plato->nombre }} - {{ $plato->plato_peso->valor }}</span>
        <span class="cart-product-price"><b>{{ $plato->total }}€</b></span>
        <a href="{{ route('web.cart.removeOnePlate', ['plateID' => $plato->id]) }}">-</a>
          <input type="number" value="{{ $plato->pivot->quantity }}">
          <a href="{{ route('web.cart.addOnePlate', ['plateID' => $plato->id]) }}">+</a>
        </form>
        <form class="cart-products-content" method="POST" action="{{ route('web.platos.carts.destroy', ['cart' => $cart->id, 'plato' => $plato->id]) }}">
          @csrf
          @method('DELETE')
          <button type="submit">x</button>
        </form>
      </div>
    @endforeach
  </div>
  <div class="cart-price">
    <div class="cart-price-content">
      <div>
        <div class="cart-discount-img">
        </div>
        <div class="cart-cod-desc">
          <form method="POST" action="{{ route('web.cart.discount') }}">
            @csrf
            <input type="text" name="discount_name" placeholder="Código descuento">
            <input type="submit" value="Aplicar">
          </form>
          @if(Cookie::get('descuento') != null AND Cookie::get('descuento_type') != null)
          <p>Descuento aplicado:
            @if(Cookie::get('descuento_type')=='fijo')
              {{Cookie::get('descuento')}}€
            @else
              {{Cookie::get('descuento')}}%
            @endif
            <a style="color: white;" href="{{route('web.cart.discount.remove')}}">X</a>
          </p>
          @endif
          {{Session()->get('discountMessageError')}}
        </div>
        <div class="cart-price-subtotal-content">
          <p class="cart-price-subtotal"><span>Subtotal</span><span>{{$cart->total}}€</span></p>
          <p class="cart-price-subtotal">
            <span>Descuento</span>
            <span>
              @if(Cookie::get('descuento')!=null AND Cookie::get('descuento_type')!=null)
                @if(Cookie::get('descuento_type')=='porcentaje') -{{round(((Cookie::get('descuento')*$cart->total)/100),2)}}€
                @elseif(Cookie::get('descuento_type')=='fijo')-{{Cookie::get('descuento')}}€
                @endif
              @else
                0€
              @endif

            </span>
          </p>
          <p class="cart-price-subtotal"><span><del>Gastos de envío</del></span><span><del>4.15€</del></span></p> <!-- implementar gastos de envío -->
        </div>
        <p class="cart-price-total">
          <b>
            <span>TOTAL</span>
            <span>
              @if(Cookie::get('descuento')!=null AND Cookie::get('descuento_type')!=null)
                @if(Cookie::get('descuento_type')=='porcentaje')
                  {{round(($cart->total*(100-Cookie::get('descuento'))/100),2)}}€
                @elseif(Cookie::get('descuento_type')=='fijo')
                  {{round($cart->total-Cookie::get('descuento'))}}€
                @endif
              @else
                {{ round($cart->total,2) }}€
              @endif

            </span>
          </b>
        </p>
      </div>
      <div>
        <p style="margin-bottom: 30px;color: #FFCF00; font-size: 13px; font-family: 'CoreSansC35' !important; width: 333px; line-height: 18px;">*Recordarte que para conservar mejor el alimento y evitar desperdicios, necesitamos recibir los pedidos antes de las 23:59h del Domingo. Te llegarán los platos el jueves de la semana siguiente.</p>
      </div>
      @inject('cartService','App\Services\CartService')
      @if($cartService->countProducts() < 5)
      <a style="margin: auto;" class="mist_btn_disable" href="#">Tramitar pedido</a>
      <p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>
      @elseif($cartService->countProducts() > 14 AND Cookie::get('descuento_type')=='free')
      <a style="margin: auto;" class="mist_btn_disable" href="#">Tramitar pedido</a>
      <p style="color: red; text-align: center;">*Máximo 14 platos para este código de descuento</p>
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
