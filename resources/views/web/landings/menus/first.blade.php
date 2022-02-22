@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/landings/firstLanding.css')}}" />
@endpush
@endonce

@extends('web.layout.master-wo-menu')
@section('content')
<section class="first-section">
  <div class="first-section-text-container">
    <img class="first-section-text-image" style="margin-bottom: 10px;" src="/img/landings/menus/first/first-section-text.svg">
    <p id="first-section-second-text">Si buscas disciplina en tu alimentación de manera rápida y sencilla <span id="second">¡No busques más!</span></p>
    <a id="third-first-new-button" href="{{route('web.platos')}}">
      <img style="margin-top: 10px;" src="/img/landings/menus/first/first-new-button.svg">
    </a>
  </div>
</section>
<section class="second-section-container">
  <img id="second-section-img-desktop" src="/img/landings/menus/first/second-section-img-desktop.png" />
  <div id="second-section-text-container">
    <div id="second-section-text">
      <p>¿No sabes que comer después de tus entrenamientos?</p>
      <p>¿Quieres ser más disciplinado con tus alimentos y no sabes cómo?</p> 
      <p>¿Quieres alimentarte sanamente y complementar tu rutina de ejercicios?</p>
    </div>
  </div>
  <img id="second-section-img-desktop-2" src="/img/landings/menus/first/second-section-img-desktop-2.png" />
  <img id="second-section-img" src="/img/landings/menus/first/second-section-img.png" />
</section>
<section class="third-section-container">
  <img id="third-section-mobile-img" src="/img/landings/menus/first/third-section-img-mobile.png"/>
  <div id="third-section">
    <p>Nosotros <span>te ayudamos a complementar tu rutina de cuidado personal</span> de manera balanceada y fácil</p>
    <a id="third-second-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/first/second-new-button.svg">
    </a>
  </div>
  <img id="third-section-mobile-desktop-img" src="/img/landings/menus/first/third-section-img-desktop.png"/>
</section>
<section id="third-fourth-middle-container">
  <div id="third-fourth-middle-content">
    ¡Deja atrás tus problemas culinarios con 4 sencillos pasos!
  </div>
</section>
<section class="fourth-section">
  <p>
    <span>1</span> 
    Elige tu objetivo de alimentación
  </p>
  <p>
    <span>2</span> 
    Configura tu plan semanal
  </p>
  <p>
    <span>3</span>
    Escoge tus platos
  </p>
  <p>
    <span>4</span> 
    Completa tu pedido
    </p>
</section>
<section class="fifth-section">
  <div id="fifth-section-container">
    <p>Regístrate y recibe tu pedido hasta la puerta de tu casa</p>
    <a style="margin-top: 5px;" id="third-third-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/first/third-new-button.svg" alt="">
    </a>
  </div>
  <img id="fifth-img-desktop" src="/img/landings/menus/first/bolsas-img-desktop.png"/>
  <img id="fifth-img-mobile" src="/img/landings/menus/first/bolsas-img-mobile.png"/>
</section>
<div class="bottom-section-container"></div>
@endsection