@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/thanks/web-thanks-you-page.css')}}" />
@endpush
@push('custom-scripts')
  <script src="{{asset( 'js/web/thanks/web-thanks-page.js' )}}"></script>
@endpush
@endonce
@extends('web.layout.master')
@section('content')
  <div class="thanks-top-banner">
    <h2>¡Gracias por su compra!</h2>
  </div>
  <div class="thanks-text-container">
    <h3>Acabamos de recibir su pedido</h3>
    <p>¡Nos ponemos manos a la obra!</p>
    <p>En unos instantes recibirás un correo con la información de su pedido.</p>
    <p class="thanks-delivery-day"></p>
  </div>
  <x-global-newsletter/>
  <form style="display: none;" action="{{route('web.deliveryDayCP')}}" method="POST" class="thanks-delivery-hidden-form">
    <input type="number" name="cp" value="28017" />
  </form>
@endsection
