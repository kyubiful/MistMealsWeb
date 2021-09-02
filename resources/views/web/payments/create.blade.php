@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($order) || $order->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <h1>Detalles del pago</h1>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf

      <div class="order-form-content">
        <div>
          <p>Nombre</p> <input class="order-inp-2" type="text" name="name" id="" value="{{ $user->name }}" disabled>
        </div>
        <div>
          <p>Apellidos</p> <input class="order-inp-2" type="text" name="surname" id="" value="{{ $user->surname }}" disabled>
        </div>
        <div>
          <p>Dirección</p> <input class="order-inp-2" type="text" name="address" id="" value="{{ $user->address }}" disabled>
        </div>
        <div>
          <p>Número</p> <input class="order-inp-1" type="text" name="address_number" id="" value="{{ $user->address_number }}" disabled>
        </div>
        <div>
          <p>Piso</p> <input class="order-inp-1" type="text" name="address_letter" id="" value="{{ $user->address_letter }}" disabled>
        </div>
        <div>
          <p>Código postal</p> <input class="order-inp-1" type="text" name="cp" id="" value="{{ $user->cp }}" disabled>
        </div>
        <div>
          <p>Región</p> <input class="order-inp-1" type="text" name="region" id="" value="{{ $user->region }}" disabled>
        </div>
        <div>
          <p>Provincia</p> <input class="order-inp-1" type="text" name="province" id="" value="{{ $user->province }}" disabled>
        </div>
        <div>
          <p>Ciudad</p> <input class="order-inp-1" type="text" name="city" id="" value="{{ $user->city }}" disabled>
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
        @foreach($order->products as $i => $plato)
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
      <h4>Total: {{ $order->total }}€</h4>
    </form>
  </div>
  {!! \App\Http\Controllers\Web\RedsysController::index($amount) !!}
  @endif
</div>
@include('web.layout.newsletter')
@endsection