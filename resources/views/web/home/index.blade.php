@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
  @if(Cookie::get('newsletterpopup')!=1)
    <!-- <x-web-home-popup-discount/> -->
  @endif
  @if(session()->has('popupCp2') AND session()->get('popupCp2')==2 AND Cookie::get('popupCpEnd') == false)
  <section class="home-popup-container">
    <div class="home-popup-content">
      <button class="home-popup-btn">X</button>
      <h2>¡BIENVENID@S!</h2>
      <p>Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==2)
      <p style="font-size: 13px; margin-top: 5px;">¡Llegamos hasta allí!</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==3)
      <p style="font-size: 13px; line-height: inherit; margin-bottom:10px; margin-top: 5px;">¡Vaya! Hasta ahí de momento no llegamos, si quieres puedes registrarte y te avisaremos por email cuando estemos por allí ;)</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
    </div>
  </section>
  @endif

  <section class="home-popup-container2 home-popup-hidden">
    <div class="home-popup-content">
      <button class="home-popup-btn2">X</button>
      <h2>¡BIENVENID@S!</h2>
      <p>Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
      <form method="POST" action="{{route('web.verifyCP')}}" class="home-popup-form">
        @csrf
        <input type="number" name="cp" id="" placeholder="00000">
        <button type="submit">Verificar</button>
      </form>
      <p style="font-size: 10px;">*no enviamos a islas, Ceuta y Melilla</p>
    </div>
  </section>

  <x-web-home-top-banner/>
  <x-web-home-cocinamos/>
  <x-web-home-best-plates :platos="$platos"/>
  <x-web-home-sodexo-cobee-banner/>
  <x-web-home-carousel/>
  <x-web-home-eativism/>
  <x-web-home-how-work/>
  <x-web-home-menus :objetivo="$objetivo" />
  <x-web-home-cp-time-verify/>
  <x-web-home-stop-dietism/>
  <x-web-home-revolution/>
  <x-global-newsletter/>

  @if(session()->has('message') AND session()->get('message')=='success')
  <x-web-home-message>
    <x-slot name="titulo">¡PEDIDO RECIBIDO!</x-slot>
    <x-slot name="mensaje">Hemos recibido tu pedido, en breves recibirás un email de confirmación ;)</x-slot>
  </x-web-home-message>
  @endif
  @if(session()->has('message')=='error' AND session()->get('message')=='error')
  <x-web-home-message>
    <x-slot name="titulo">¡ERROR!</x-slot>
   <x-slot name="mensaje">Ha habído un problema a la hora de realizar el pago, por favor intentelo de nuevo</x-slot>
  </x-web-home-message>
  @endif

  @endsection
