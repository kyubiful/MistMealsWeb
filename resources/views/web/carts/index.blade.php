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
          <p class="cart-price-subtotal"><span>Gastos de envío</span><span>3,50€</span></p> <!-- implementar gastos de envío -->
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
<section class="subscribe_form_section section_padding parallaxie stay-alert" style="background-color: #FF810C;">
  <div class="container wow fadeInUp" data-wow-duration="1s">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div class="section_tittle ">
          <div>
            <h2 class="d-inline-flex" style="color: #F9F2E1"><span>¡Mantente alerta!</span></h2>
          </div>
          <div>
            <p class="d-inline-flex description c4">Suscríbete a nuestra newsletter y entérate de todas las noticias en relación a nuestro movimiento, que hará que cambie la forma en la que te alimentes día a día...</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-12">
        <form action="https://mistmeals.us1.list-manage.com/subscribe/post?u=bcef03a2016fd98bf6181e989&amp;id=9c3cb16e3e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
          <div class="form-row justify-content-center">
            <div class="col-xl-3 col-sm-4 wow fadeInDown pr-0" data-wow-delay=".5s">
              <input type="email" class="form-control cu_input" name="EMAIL" id="mce-EMAIL" placeholder="Déjanos tu email" required>
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bcef03a2016fd98bf6181e989_9c3cb16e3e" tabindex="-1" value=""></div>
            </div>
            <div class="col-xl-2 col-sm-4 wow fadeInDown pl-0" data-wow-delay=".7s">
              <button type="submit" class="cu_btn animate_btn text-white">Suscríbete</button>
            </div>
          </div>
          <div class="form-row justify-content-center">
            <div class="col-lg-4 mt-3 wow fadeInDown" data-wow-delay=".7s">
              <div class="custom-control custom-checkbox single_contact_form">
                <input type="checkbox" class="custom-control-input" id="customControl" required>
                <label class="custom-control-label" for="customControl" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection