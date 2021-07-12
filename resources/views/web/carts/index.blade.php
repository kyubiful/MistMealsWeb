
@extends('web.layout.master')
@section('content')
<div style="background-color: #000000; padding-top: 100px;">
@if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
@else
  <h1>Carrito</h1>
  <a href="{{ route('web.orders.create') }}">Tramitar pedido</a>
  @foreach($cart->products as $i => $plato)
  <img src="{{ asset($plato->getUrlImage1Attribute()) }}" alt="">
  <p>{{ $plato->nombre }} </p>
  <div>
    <span>{{ $plato->calorias}} <b>cal</b></span>
    <span>{{ $plato->plato_info_nutricional->proteinas }} <b>P</b></span>
    <span>{{ $plato->plato_info_nutricional->carbohidratos }} <b>C</b></span>
    <span>{{ $plato->plato_info_nutricional->grasas }} <b>G</b></span>
    <span>{{ $plato->plato_info_nutricional->fibra }} <b>F</b></span>
  </div>
  <div>
    <p>{{ $plato->pivot->quantity }} añadidos ({{ $plato->total }}€)</p>
  </div>
  <form method="POST" action="{{ route('web.platos.carts.destroy', ['cart' => $cart->id, $plato->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Quitar del carrito</button>
  </form>
  @endforeach
  <p>Total: {{ $cart->total }}€</p>
@endif
</div>
@endsection