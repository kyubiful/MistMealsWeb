@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/landings/fourthLanding.css')}}" />
@endpush
@endonce

@extends('web.layout.master-wo-menu')
@section('content')
<section class="first-section">
  <div class="first-section-text-container">
    <img class="first-section-text-image" src="/img/landings/menus/fourth/top-text.svg"/>
    <a id="third-first-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/fourth/first-new-button.svg" alt="">
    </a>
  </div>
</section>
<section class="second-section-container">
  <img id="second-section-img-desktop" src="/img/landings/menus/first/second-section-img-desktop.png" />
  <div id="second-section-text-container">
    <div id="second-section-text">
      <p>¿Necesitas un restaurante saludable que se adapte a tus bolsillos?</p>
      <p>¿Practicas algún deporte y quieres completarlo con una buena alimentación?</p> 
      <p>¿Prefieres pasar tu tiempo libre fuera de la cocina?</p>
    </div>
  </div>
  <img id="second-section-img-desktop-2" src="/img/landings/menus/first/second-section-img-desktop-2.png" />
  <img id="second-section-img" src="/img/landings/menus/first/second-section-img.png" />
</section>
<section class="fifth-section">
  <div id="fifth-section-container">
    <p>Configura tu plan semanal y rellena un pequeño formulario, elige tus platos según tus gustos y necesidades y completa tu pedido! Comer saludable nunca fue tan sencillo y delicioso</p>
    <a id="third-second-new-button" href="{{ route('web.platos')}}">
      <img src="/img/landings/menus/fourth/second-new-button.svg">
    </a>
  </div>
  <img id="fifth-img-desktop" src="/img/landings/menus/first/bolsas-img-desktop.png"/>
  <img id="fifth-img-mobile" src="/img/landings/menus/first/bolsas-img-mobile.png"/>
</section>
<div class="bottom-section-container"></div>
@endsection