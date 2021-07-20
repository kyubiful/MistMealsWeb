@extends('web.layout.master')
@section('content')
<div style="background-color: #000000; padding-top: 100px;">
  @if(!isset($order) || $order->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <h1>Detalles del pago</h1>
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
  <h4>Total: {{ $order->total }}€</h4>
  <form method="POST" action="https://sis-t.redsys.es:25443/sis/realizarPago">
    @csrf
    <input type="hidden" name="Ds_SignatureVersion" value="{{$Ds_SignatureVersion}}">
    <input type="hidden" name="Ds_MerchantParameters" value="{{$Ds_MerchanParameters}}">
    <input type="hidden" name="Ds_Signature" value="{{$Ds_Signature}}">
    <button type="submit">Pagar</button>
  </form>
  @endif
</div>
@endsection