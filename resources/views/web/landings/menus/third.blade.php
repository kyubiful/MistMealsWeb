@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/landings/thirdLanding.css')}}" />
@endpush
@endonce

@extends('web.layout.master-wo-menu')
@section('content')
<section class="first-section">
  <div class="first-section-text-container">
    <img class="first-section-text-img" src="/img/landings/menus/third/first-section-text-img.svg"/>
    <a style="margin-top: 10px;" id="third-first-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/third/first-new-button.svg" alt="">
    </a>
  </div>
</section>
<section class="second-section-container">
  <img id="second-section-img-desktop" src="/img/landings/menus/first/second-section-img-desktop.png" />
  <div id="second-section-text-container">
    <div id="second-section-text">
      <p>¿Buscas una manera rápida, sencilla y económica de alimentarte sanamente?</p>
      <p>¿Agotado de no saber que comprar al hacer la compra para preparar tus alimentos?</p> 
      <p>¿Quieres comer sanamente sin la necesidad de pasar horas en la cocina?</p>
    </div>
  </div>
  <img id="second-section-img-desktop-2" src="/img/landings/menus/first/second-section-img-desktop-2.png" />
  <img id="second-section-img" src="/img/landings/menus/first/second-section-img.png" />
</section>
<section class="third-section-container">
  <img id="third-section-mobile-img" src="/img/landings/menus/first/third-section-img-mobile.png"/>
  <div id="third-section">
    <p>Olvídate de gastar tu dinero en ingredientes que no sabes cómo usar, invierte tu dinero en nuestro plan semanal de alimentos que se adaptan a tus necesidades y gustos</p>
    <a style="margin-top: 10px;" id="third-second-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/third/second-new-button.svg">
    </a>
  </div>
  <img id="third-section-mobile-desktop-img" src="/img/landings/menus/first/third-section-img-desktop.png"/>
</section>
<section id="third-fourth-middle-container">
  <div id="third-fourth-middle-content">
    ¡Disfruta de los beneficios que Mist Meals tiene para ti!
  </div>
</section>
<section class="fourth-section">
  <p>
    <span>1</span> 
    Alimentos que se adaptan a tus necesidades
  </p>
  <p>
    <span>2</span> 
    Ahorro en tu cartera
  </p>
  <p>
    <span>3</span>
    Recibe los alimentos a la puerta de tu casa 
  </p>
</section>
<section class="fifth-section">
  <div id="fifth-section-container">
    <p>¡Sientete responsable de tu cuerpo!</p>
    <a style="margin-top: 10px;" id="third-third-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/third/third-new-button.svg">
    </a>
  </div>
  <img id="fifth-img-desktop" src="/img/landings/menus/first/bolsas-img-desktop.png"/>
  <img id="fifth-img-mobile" src="/img/landings/menus/first/bolsas-img-mobile.png"/>
</section>
<div class="bottom-section-container"></div>
@endsection