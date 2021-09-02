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
@include('web.layout.newsletter')
@endsection