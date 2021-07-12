@extends('web.layout.master')
@section('content')
<div style="background-color: #000000; padding-top: 100px;">
@if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
@else
  <h1>Order Details</h1>
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
        <td>
          <img src="{{ asset($plato->getUrlImage1Attribute()) }}" alt="">
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
  <form method="POST" action="{{ route('web.orders.store') }}">
    @csrf
    <button type="submit">Pagar</button>
  </form>
@endif
</div>
@endsection