@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-cp-time-verify.css')}}" />
@endpush
@endonce

<section class="web-home-cp-time-verify">
  <h2 class="web-home-cp-time-verify-title">Si pido hoy ¿cuándo me llegará?</h2>
  <p class="web-home-cp-time-verify-text">Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
  <form class="web-home-cp-time-verify-form">
    <input class="web-home-cp-time-verify-form-text" type="number" placeholder="Código postal"/>
    <input class="web-home-cp-time-verify-form-submit" type="submit" value="Comprobar"/>
  </form>
</section>
