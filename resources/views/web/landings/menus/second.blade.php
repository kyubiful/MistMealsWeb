@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/landings/secondLanding.css')}}" />
@endpush
@endonce

@extends('web.layout.master-wo-menu')
@section('content')
<section class="first-section">
  <div class="first-section-text-container">
    <img class="first-section-text-img" src="/img/landings/menus/second/first-section-text-img.svg">
    <p id="first-section-second-text">Si quieres cuidar tu rutina de alimentación pero no tienes tiempo y no sabes cómo</p>
    <a style="margin-top: 10px;" id="third-first-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/second/first-new-button.svg" alt="">
    </a>
  </div>
</section>
<section class="second-section-container">
  <img id="second-section-img-desktop" src="/img/landings/menus/first/second-section-img-desktop.png" />
  <div id="second-section-text-container">
    <div id="second-section-text">
      <p>¿Pasas el día en la oficina y no tienes tiempo de cocinar?</p>
      <p>¿Quieres llevar una rutina de alimentación sana y no sabes cómo?</p> 
      <p>¿Buscas mejorar tus hábitos alimenticios pero no sabes cocinar?</p>
    </div>
  </div>
  <img id="second-section-img-desktop-2" src="/img/landings/menus/first/second-section-img-desktop-2.png" />
  <img id="second-section-img" src="/img/landings/menus/first/second-section-img.png" />
</section>
<section class="third-section-container">
  <img id="third-section-mobile-img" src="/img/landings/menus/first/third-section-img-mobile.png"/>
  <div id="third-section">
    <p>Si tu vida laboral consume la mayor parte de tu tiempo y te deja sin energía para planear tu alimentación semanal, <span>¡no te preocupes! </span></p>
    <a style="margin-top: 10px;" id="third-second-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/second/second-new-button.svg" alt="">
    </a>
  </div>
  <img id="third-section-mobile-desktop-img" src="/img/landings/menus/first/third-section-img-desktop.png"/>
</section>
<section id="third-fourth-middle-container">
  <div id="third-fourth-middle-content">
    Beneficios de formar parte de la comunidad Mist Meals
  </div>
</section>
<section class="fourth-section">
  <p>
    <span>1</span> 
    Mejora tus hábitos alimenticios
  </p>
  <p>
    <span>2</span> 
    Mantén una rutina de alimentación sana
  </p>
  <p>
    <span>3</span>
    Administra tu tiempo sin descuidar tu salud 
  </p>
</section>
<section class="fifth-section">
  <div id="fifth-section-container">
    <p>¡Siéntete responsable de tu cuerpo!</p>
    <a style="margin-top: 10px;" id="third-third-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/second/third-new-button.svg" alt="">
    </a>
  </div>
  <img id="fifth-img-desktop" src="/img/landings/menus/first/bolsas-img-desktop.png"/>
  <img id="fifth-img-mobile" src="/img/landings/menus/first/bolsas-img-mobile.png"/>
</section>
<div class="bottom-section-container"></div>
@endsection