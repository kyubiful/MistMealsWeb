@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <h1>Detalles del pedido</h1>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf
      <div class="order-form-content">
        <div>
          <p>Nombre</p> <input class="order-inp-2" type="text" name="name" id="" value="{{ $user->name }}" required>
        </div>
        <div>
          <p>Apellidos</p> <input class="order-inp-2" type="text" name="surname" id="" value="{{ $user->surname }}" required>
        </div>
        <div>
          <p>Dirección</p> <input class="order-inp-2" type="text" name="address" id="" value="{{ $user->address }}" required>
        </div>
        <div>
          <p>Número</p> <input class="order-inp-1" type="text" name="address_number" id="" value="{{ $user->address_number }}" required>
        </div>
        <div>
          <p>Piso</p> <input class="order-inp-1" type="text" name="address_letter" id="" value="{{ $user->address_letter }}" required>
        </div>
        <div>
          <p>Código postal</p> <input class="order-inp-1" type="text" name="cp" id="" value="{{ $user->cp }}" required>
        </div>
        <div>
          <p>Región</p> <input class="order-inp-1" type="text" name="region" id="" value="{{ $user->region }}" required>
        </div>
        <div>
          <p>Provincia</p> <input class="order-inp-1" type="text" name="province" id="" value="{{ $user->province }}" required>
        </div>
        <div>
          <p>Ciudad</p> <input class="order-inp-1" type="text" name="city" id="" value="{{ $user->city }}" required>
        </div>
      </div>
      <table>
        <thead>
          <tr>
            <th>Plato</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
          </tr>
        </thead>
        @foreach($cart->products as $i => $plato)
        <tbody>
          <tr>
            <td class="order-product-name">
              {{ $plato->nombre }}
            </td>
            <td>
              {{ $plato->precio }}
            </td>
            <td>
              {{ $plato->pivot->quantity }}
            </td>
            <td>
              <strong>
                {{ $plato->total }}€
              </strong>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      <h4>Total: {{ $cart->total }}€</h4>
      <button type="submit">Continuar pago</button>
    </form>
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