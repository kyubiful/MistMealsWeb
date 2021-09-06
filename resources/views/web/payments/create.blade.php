@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($order) || $order->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf
      <div class="order-form-container">

      <h1>Detalles del pago</h1>

      <div class="order-form-content">
        <div class="order-inp-1">
          <p>Nombre</p> <input class="order-inp" type="text" name="name" id="" value="{{ $user->name }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Apellidos</p> <input class="order-inp" type="text" name="surname" id="" value="{{ $user->surname }}" disabled>
        </div>
        <div class="order-inp-2">
          <p>Dirección</p> <input class="order-inp" type="text" name="address" id="" value="{{ $user->address }}" disabled>
        </div>
        <div class="order-inp-3">
          <p>Número</p> <input class="order-inp" type="text" name="address_number" id="" value="{{ $user->address_number }}" disabled>
        </div>
        <div class="order-inp-3">
          <p>Piso</p> <input class="order-inp" type="text" name="address_letter" id="" value="{{ $user->address_letter }}" disabled>
        </div>
        <div class="order-inp-4">
          <p>Código postal</p> <input class="order-inp" type="text" name="cp" id="" value="{{ $user->cp }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Región</p> <input class="order-inp" type="text" name="region" id="" value="{{ $user->region }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Provincia</p> <input class="order-inp" type="text" name="province" id="" value="{{ $user->province }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Ciudad</p> <input class="order-inp" type="text" name="city" id="" value="{{ $user->city }}" disabled>
        </div>
        @if($order->invoice == 1)
        <h1>Detalles de facturación</h1>
        <div class="order-form-content">
          <div class="order-inp-2">
             <p>Dirección</p> <input class="order-inp" type="text" name="invoice_address" id="" value="{{ $user->invoice_address }}" disabled>
          </div>
          <div class="order-inp-3">
            <p>Número</p> <input class="order-inp" type="text" name="invoice_address_number" id="" value="{{ $user->invoice_address_number }}" disabled>
          </div>
          <div class="order-inp-3">
            <p>Piso</p> <input class="order-inp" type="text" name="invoice_address_letter" id="" value="{{ $user->invoice_address_letter }}" disabled>
          </div>
          <div class="order-inp-4">
            <p>Código postal</p> <input class="order-inp" type="text" name="invoice_cp" id="" value="{{ $user->invoice_cp }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>Región</p> <input class="order-inp" type="text" name="invoice_region" id="" value="{{ $user->invoice_region }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>Provincia</p> <input class="order-inp" type="text" name="invoice_province" id="" value="{{ $user->invoice_province }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>Ciudad</p> <input class="order-inp" type="text" name="invoice_city" id="" value="{{ $user->invoice_city }}" disabled>
          </div>
        </div>
        @endif
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
      </div>
    </form>
  </div>
  <div class="order-continue">
  <a href="{{url()->previous()}}">Volver</a>
    <h4>Total: {{ $order->total }}€</h4>
    {!! \App\Http\Controllers\Web\RedsysController::index($amount) !!}
  </div>
  @endif
</div>
@include('web.layout.newsletter')
@endsection