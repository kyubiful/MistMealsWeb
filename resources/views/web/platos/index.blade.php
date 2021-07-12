@extends('web.layout.master')
@section('content')
<div style="background-color: #000000; padding-top: 80px;">
  @foreach($platos as $i => $plato)
    <img src="{{ asset($plato->getUrlImage1Attribute()) }}" alt="">
    <p>{{ $plato->nombre }} </p>
    <div>
      <span>{{ $plato->calorias}} <b>cal</b></span>
      <span>{{ $plato->plato_info_nutricional->proteinas }} <b>P</b></span>
      <span>{{ $plato->plato_info_nutricional->carbohidratos }} <b>C</b></span>
      <span>{{ $plato->plato_info_nutricional->grasas }} <b>G</b></span>
      <span>{{ $plato->plato_info_nutricional->fibra }} <b>F</b></span>
    </div>
    <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}">
      @csrf
      <button type="submit">Añadir al carrito</button>
    </form>
  @endforeach
</div>
@endsection