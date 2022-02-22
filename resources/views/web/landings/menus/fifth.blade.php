@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/landings/fifthLanding.css')}}" />
@endpush
@endonce

@extends('web.layout.master-wo-menu')
@section('content')
<section class="first-section">
  <div class="first-section-text-container">
    <img class="first-section-text-img" src="/img/landings/menus/fifth/first-section-text-img.svg">
    <a id="third-first-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/fifth/first-new-button.svg">
    </a>
  </div>
</section>
<section class="second-section-container">
  <img id="second-section-img-desktop" src="/img/landings/menus/first/second-section-img-desktop.png" />
  <div id="second-section-text-container">
    <div id="second-section-text">
      <p>¿Eres extranjero y no conoces un restaurante con alimentos saludables?</p>
      <p>¿Quieres mejorar tu aspecto físico sin tener que cocinar recetas sanas?</p> 
      <p>¿Buscas alimentos que se adapten a tus necesidades?</p>
    </div>
  </div>
  <img id="second-section-img-desktop-2" src="/img/landings/menus/first/second-section-img-desktop-2.png" />
  <img id="second-section-img" src="/img/landings/menus/first/second-section-img.png" />
</section>
<section class="third-section-container">
  <img id="third-section-mobile-img" src="/img/landings/menus/first/third-section-img-mobile.png"/>
  <div id="third-section">
    <p style="margin-bottom: 20px; ">Cuida tu alimentación aunque estés lejos de casa, nos adaptamos a tus gustos y necesidades.</p>
    <p>Mist Meals es la mejor opción para ti, Te ayudamos a mejorar tu aspecto físico, tener mejor salud y comer sanamente</p>
  </div>
  <img id="third-section-mobile-desktop-img" src="/img/landings/menus/first/third-section-img-desktop.png"/>
</section>
<section id="third-fourth-middle-container">
  <div id="third-fourth-middle-content">
    ¡Comienza tu plan semanal y disfruta tus alimentos saludables como nunca!
  </div>
</section>
<section class="fourth-section">
</section>
<section class="fifth-section">
  <div id="fifth-section-container">
    <p>No te preocupes por salir a buscarlo y perderte en tu nueva ciudad, nosotros te lo llevamos hasta la puerta de tu casa en el momento que tu lo necesites.</p>
    <a id="third-second-new-button" href="{{route('web.platos')}}">
      <img src="/img/landings/menus/fifth/second-new-button.svg">
    </a>
  </div>
  <img id="fifth-img-desktop" src="/img/landings/menus/first/bolsas-img-desktop.png"/>
  <img id="fifth-img-mobile" src="/img/landings/menus/first/bolsas-img-mobile.png"/>
</section>
<div class="bottom-section-container"></div>
@endsection