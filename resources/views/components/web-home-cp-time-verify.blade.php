@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-cp-time-verify.css')}}" />
@endpush
@push('custom-scripts')
  <script src="{{asset( 'js/web/home/web-home-cp-time-verify.js' )}}"></script>
@endpush
@endonce

<section class="web-home-cp-time-verify">
  <h2 class="web-home-cp-time-verify-title">Si pido hoy ¿cuándo me llegará?</h2>
  <p class="web-home-cp-time-verify-text">Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
  <form action="{{route('web.deliveryDayCP')}}" method="POST" class="web-home-cp-time-verify-form">
    @csrf
    <input class="web-home-cp-time-verify-form-text" type="number" placeholder="Código postal" name="cp"/>
    <input class="web-home-cp-time-verify-form-submit" type="submit" value="Comprobar"/>
  </form>
  <p class="web-home-cp-time-verify-message"></p>
</section>
