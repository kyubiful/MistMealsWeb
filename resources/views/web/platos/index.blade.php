@extends('web.layout.master')
@section('content')
<div class="platos-top-background">
  <p class="platos-top-title">PLATOS</p>
</div>
<div class="platos-top-label"></div>
<div class="platos-container">
  @foreach($platos as $i => $plato)
  <div class="plato-container">
    <img src="{{ asset($plato->getUrlImage1Attribute()) }}" class="plato-img" alt="">
    <div class="plato-content">
      <p class="plato-title">{{ $plato->nombre }} </p>
      <div class="plato-info">
        <span>{{ bcdiv($plato->calorias, '1', 0) }} <b>cal</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->proteinas, '1', 0) }} <b>P</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->carbohidratos, '1', 0)}} <b>C</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->grasas, '1', 0) }} <b>G</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->fibra, '1', 0) }} <b>F</b></span>
      </div>
      <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}">
        @csrf
        <button class="mist_btn plato-btn" type="submit">Añadir</button>
      </form>
    </div>
  </div>
  @endforeach
</div>

{{ $platos->links() }}

@if(Cookie::get('infoName') AND Cookie::get('infoPrice'))
<div class="plates-modal">
  <div>
    <button class="plates-modal-hide">X</button>
  </div>
  <div>
    <h3>Añadido al carrito</h3>
  </div>
  <div>
    <p class="plates-modal-info-name">{{Cookie::get('infoName')}}</p>
    <p class="plates-modal-info-price"><b>{{Cookie::get('infoPrice')}}€</b></p>
  </div>
  <div class="plates-buttons">
    <a class="plates-modal-cart-btn" href="{{route('web.carts.index')}}">VER CARRITO</a>
  </div>
</div>
@endif

@include('web.layout.newsletter')
@endsection