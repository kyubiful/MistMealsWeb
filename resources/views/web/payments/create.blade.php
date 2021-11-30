@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($order) || $order->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf
      <div class="order-form-container">

      <h1>Detalles del pago</h1>

      <div class="order-form-content">
        <div class="order-inp-1">
          <p>Nombre</p> <input class="order-inp" type="text" name="name" id="" value="{{ $user->name }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Apellidos</p> <input class="order-inp" type="text" name="surname" id="" value="{{ $user->surname }}" disabled>
        </div>
        <div class="order-inp-2">
          <p>Dirección</p> <input class="order-inp" type="text" name="address" id="" value="{{ $user->address }}" disabled>
        </div>
        <div class="order-inp-3">
          <p>Número</p> <input class="order-inp" type="text" name="address_number" id="" value="{{ $user->address_number }}" disabled>
        </div>
        <div class="order-inp-3">
          <p>Piso</p> <input class="order-inp" type="text" name="address_letter" id="" value="{{ $user->address_letter }}" disabled>
        </div>
        <div class="order-inp-4">
          <p>Código postal</p> <input class="order-inp" type="text" name="cp" id="" value="{{ $user->cp }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Teléfono</p> <input class="order-inp" type="text" name="phone" id="" value="{{ $user->phone }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Provincia</p> <input class="order-inp" type="text" name="province" id="" value="{{ $user->province }}" disabled>
        </div>
        <div class="order-inp-1">
          <p>Ciudad</p> <input class="order-inp" type="text" name="city" id="" value="{{ $user->city }}" disabled>
        </div>
        @if($order->invoice == 1)
        <h1>Detalles de facturación</h1>
        <div class="order-form-content">
          <div class="order-inp-2">
             <p>Dirección</p> <input class="order-inp" type="text" name="invoice_address" id="" value="{{ $user->invoice_address }}" disabled>
          </div>
          <div class="order-inp-3">
            <p>Número</p> <input class="order-inp" type="text" name="invoice_address_number" id="" value="{{ $user->invoice_address_number }}" disabled>
          </div>
          <div class="order-inp-3">
            <p>Piso</p> <input class="order-inp" type="text" name="invoice_address_letter" id="" value="{{ $user->invoice_address_letter }}" disabled>
          </div>
          <div class="order-inp-4">
            <p>Código postal</p> <input class="order-inp" type="text" name="invoice_cp" id="" value="{{ $user->invoice_cp }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>NIF</p> <input class="order-inp" type="text" name="invoice_nif" id="" value="{{ $user->invoice_nif }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>Provincia</p> <input class="order-inp" type="text" name="invoice_province" id="" value="{{ $user->invoice_province }}" disabled>
          </div>
          <div class="order-inp-1">
            <p>Ciudad</p> <input class="order-inp" type="text" name="invoice_city" id="" value="{{ $user->invoice_city }}" disabled>
          </div>
        </div>
        @endif
      </div>
      <table>
        <thead>
          <tr>
            <th>Cantidad</th>
            <th>Plato</th>
            <th>Precio</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        @foreach($order->products as $i => $plato)
        <tbody>
          <tr>
            <td>
              {{ $plato->pivot->quantity }}
            </td>
            <td class="order-product-name">
              {{ $plato->nombre }}
            </td>
            <td>
              {{ $plato->precio }}
            </td>
            <td>
              <strong>
                {{ $plato->total }}€
              </strong>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      @if(Cookie::get('descuento')!=null)
      <table class="order-paymenat-discount-table">
        <tr>
          <td style="background-color: #533fb8; color: #F9F2E1;">
            <b>Descuento</b>
          </td>
          <td style="">
            @if(Cookie::get('descuento_type')=='porcentaje')
              -{{round((($cart->total)*((Cookie::get('descuento'))/100)),2)}}€
            @elseif(Cookie::get('descuento_type')=='fijo')
              -{{Cookie::get('descuento')}}€
            @elseif(Cookie::get('descuento_type')=='free')
              -{{$cart->total}}€
            @endif
          </td>
        </tr>
      </table>
      @endif
      </div>
    </form>
  </div>
  <div class="order-continue">
  <a href="{{ route('web.orders.create') }}">Volver</a>
    <h4 class="payment-amount">Total:
      @if(Cookie::get('descuento_type')!='free')
        {{$amount}}€
      @else
        0€
      @endif
    </h4>
    @if(Cookie::get('descuento_type') != 'free')
    {!! \App\Http\Controllers\Web\RedsysController::index($amount) !!}
    @else
    <a class="payment-btn-submit" id="btn_submit" name="btn_submit" href="{{route('web.holded.free')}}">Realizar pedido</a>
    @endif
  </div>
  @endif
</div>
@include('web.layout.newsletter')
@endsection
@push('custom-scripts')

<script type="text/javascript">
  paymentBtnSubmit = document.querySelector('.payment-btn-submit')
  paymentAmount = document.querySelector('.payment-amount')

  console.log(paymentBtnSubmit)

  let amount = paymentAmount.innerHTML
  amount = amount.split(" ")
  amount = parseInt(amount[1].split("€")[0])

  paymentBtnSubmit.addEventListener('click', () => {

    var callback = function () {
      if (typeof(url) != 'undefined') {
        window.location = url;
      }
    };
    gtag('event', 'conversion', {
        'send_to': 'AW-10805779259/-VV7CIHKiYQDELu2zKAo', 'value': amount,
        'currency': 'EUR',
        'transaction_id': '',
        'event_callback': callback
    });

    fbq('track', 'Purchase', {
      'value': amount,
      'currency': 'EUR'
    })

  })
</script>

@endpush