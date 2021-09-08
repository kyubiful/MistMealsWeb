@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf
      <div class="order-form-container">

      <h1>Detalles del pedido</h1>
      <div class="order-form-content">
        <div class="order-inp-1">
          <p>Nombre</p> <input class="order-inp" type="text" name="name" id="" value="{{ $user->name }}" required>
        </div>
        <div class="order-inp-1">
          <p>Apellidos</p> <input class="order-inp" type="text" name="surname" id="" value="{{ $user->surname }}" required>
        </div>
        <div class="order-inp-2">
          <p>Dirección</p> <input class="order-inp" type="text" name="address" id="" value="{{ $user->address }}" required>
        </div>
        <div class="order-inp-3">
          <p>Número</p> <input class="order-inp" type="text" name="address_number" id="" value="{{ $user->address_number }}" required>
        </div>
        <div class="order-inp-3">
          <p>Piso</p> <input class="order-inp" type="text" name="address_letter" id="" value="{{ $user->address_letter }}">
        </div>
        <div class="order-inp-4">
          <p>Código postal</p> <input class="order-inp" type="text" name="cp" id="" value="{{ $user->cp }}" required>
        </div>
        <div class="order-inp-1">
          <p>Teléfono</p> <input class="order-inp" type="text" name="phone" id="" value="{{ $user->phone }}" required>
        </div>
        <div class="order-inp-1">
          <p>Provincia</p> <input class="order-inp" type="text" name="province" id="" value="{{ $user->province }}" required>
        </div>
        <div class="order-inp-1">
          <p>Ciudad</p> <input class="order-inp" type="text" name="city" id="" value="{{ $user->city }}" required>
        </div>
      </div>

      <p>      
          <input type="checkbox" name="invoice_check" id="invoice_check" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><label for="invoice_check" class="invoice-check-label"> Necesito factura</label>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="order-accordion-card card card-body">
          <h1>Detalles de facturación</h1>
          <div class="order-form-content">
            <div class="order-inp-2">
              <p>Dirección</p> <input class="order-inp" type="text" name="invoice_address" id="invoice_address" value="{{ $user->invoice_address }}">
            </div>
            <div class="order-inp-3">
              <p>Número</p> <input class="order-inp" type="text" name="invoice_address_number" id="invoice_address_number" value="{{ $user->invoice_address_number }}">
            </div>
            <div class="order-inp-3">
              <p>Piso</p> <input class="order-inp" type="text" name="invoice_address_letter" id="invoice_address_letter" value="{{ $user->invoice_address_letter }}">
            </div>
            <div class="order-inp-4">
              <p>Código postal</p> <input class="order-inp" type="text" name="invoice_cp" id="invoice_cp" value="{{ $user->invoice_cp }}">
            </div>
            <div class="order-inp-1">
              <p>Región</p> <input class="order-inp" type="text" name="invoice_region" id="invoice_region" value="{{ $user->invoice_region }}">
            </div>
            <div class="order-inp-1">
              <p>Provincia</p> <input class="order-inp" type="text" name="invoice_province" id="invoice_province" value="{{ $user->invoice_province }}">
            </div>
            <div class="order-inp-1">
              <p>Ciudad</p> <input class="order-inp" type="text" name="invoice_city" id="invoice_city" value="{{ $user->invoice_city }}">
            </div>
          </div>
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
      </div>
      <div class="order-continue">
        <a href="{{url()->previous()}}">Volver</a>
        <h4>Total: {{ $cart->total }}€</h4>
        <button type="submit">Continuar pago</button>
      </div>
    </form>
  </div>
  @endif
</div>
  @if(session()->has('message') AND session()->get('message')=='invalid cp')
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
      <p>De momento no repartimos en tu zona, pero no te preocupes, dentro de poco llegarmos a tu ciudad :)</p>
    </div>
  </div>
  @endif
@include('web.layout.newsletter')
@endsection