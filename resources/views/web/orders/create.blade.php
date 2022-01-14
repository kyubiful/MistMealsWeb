@extends('web.layout.master')
@section('content')
<div class="order-content">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div>
    <p>El carrito está vacío</p>
  </div>
  @else
  <div>
    <form class="order-form" method="POST" action="{{ route('web.orders.store') }}">
      @csrf
      <div class="order-form-container">

      <h1>Detalles del pedido</h1>
      <div class="order-form-content">
        @if($register == 'true')
        <div class="order-inp-1">
          <p>Nombre</p> <input class="order-inp" type="text" name="name" id="" placeholder="Nombre" value="{{ $user->name }}" required>
        </div>
        <div class="order-inp-1">
          <p>Apellidos</p> <input class="order-inp" type="text" name="surname" id="" placeholder="Apellidos" value="{{ $user->surname }}" required>
        </div>
        <div class="order-inp-2">
          <p>Dirección</p> <input class="order-inp" type="text" name="address" id="" placeholder="Dirección" value="{{ $user->address }}" required>
        </div>
        <div class="order-inp-3">
          <p>Número</p> <input class="order-inp" type="text" name="address_number" placeholder="Número" id="" value="{{ $user->address_number }}" required>
        </div>
        <div class="order-inp-3">
          <p>Piso</p> <input class="order-inp" type="text" name="address_letter" id="" placeholder="Piso" value="{{ $user->address_letter }}">
        </div>
        <div class="order-inp-4">
          <p>Código postal</p> <input class="order-inp" type="text" name="cp" id="" placeholder="Código Postal" value="{{ $user->cp }}" required>
        </div>
        <div class="order-inp-1">
          <p>Teléfono</p> <input class="order-inp" type="text" name="phone" id="" placeholder="Teléfono" value="{{ $user->phone }}" required>
        </div>
        <div class="order-inp-1">
          <p>Provincia</p> <input class="order-inp" type="text" name="province" id="" placeholder="Provincia" value="{{ $user->province }}" required>
        </div>
        <div class="order-inp-1">
          <p>Ciudad</p> <input class="order-inp" type="text" name="city" id="" placeholder="Ciudad" value="{{ $user->city }}" required>
        </div>
        @else
        <div class="order-inp-1">
          <p>Nombre</p> <input class="order-inp" type="text" name="name" id="" placeholder="Nombre" value="{{ session('user')->name }}" required>
        </div>
        <div class="order-inp-1">
          <p>Apellidos</p> <input class="order-inp" type="text" name="surname" id="" placeholder="Apellidos" value="{{ session('user')->surname }}" required>
        </div>
        <div class="order-inp-2">
          <p>Dirección</p> <input class="order-inp" type="text" name="address" id="" placeholder="Dirección" value="{{ session('user')->address }}" required>
        </div>
        <div class="order-inp-3">
          <p>Número</p> <input class="order-inp" type="text" name="address_number" placeholder="Número" id="" value="{{ session('user')->address_number }}" required>
        </div>
        <div class="order-inp-3">
          <p>Piso</p> <input class="order-inp" type="text" name="address_letter" id="" placeholder="Piso" value="{{ session('user')->address_letter }}">
        </div>
        <div class="order-inp-4">
          <p>Código postal</p> <input class="order-inp" type="text" name="cp" id="" placeholder="Código Postal" value="{{ session('user')->cp }}" required>
        </div>
        <div class="order-inp-1">
          <p>Teléfono</p> <input class="order-inp" type="text" name="phone" id="" placeholder="Teléfono" value="{{ session('user')->phone }}" required>
        </div>
        <div class="order-inp-1">
          <p>Provincia</p> <input class="order-inp" type="text" name="province" id="" placeholder="Provincia" value="{{ session('user')->province }}" required>
        </div>
        <div class="order-inp-1">
          <p>Ciudad</p> <input class="order-inp" type="text" name="city" id="" placeholder="Ciudad" value="{{ session('user')->city }}" required>
        </div>
        @endif
      </div>

      <p>
          <input type="checkbox" name="invoice_check" id="invoice_check" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><label for="invoice_check" class="invoice-check-label"> Necesito factura</label>
      </p>
      <div class="collapse" id="collapseExample">
        <div class="order-accordion-card card card-body">
          <h1>Detalles de facturación</h1>
          <div class="order-form-content">
            <div class="order-inp-2">
              <p>Dirección</p> <input class="order-inp" type="text" name="invoice_address" id="invoice_address" placeholder="Dirección" value="{{ $user->invoice_address }}">
            </div>
            <div class="order-inp-3">
              <p>Número</p> <input class="order-inp" type="text" name="invoice_address_number" id="invoice_address_number" placeholder="Número" value="{{ $user->invoice_address_number }}">
            </div>
            <div class="order-inp-3">
              <p>Piso</p> <input class="order-inp" type="text" name="invoice_address_letter" id="invoice_address_letter" placeholder="Piso" value="{{ $user->invoice_address_letter }}">
            </div>
            <div class="order-inp-4">
              <p>Código postal</p> <input class="order-inp" type="text" name="invoice_cp" id="invoice_cp" placeholder="Código Postal" value="{{ $user->invoice_cp }}">
            </div>
            <div class="order-inp-1">
              <p>NIF</p> <input class="order-inp" type="text" name="invoice_nif" id="invoice_region" placeholder="NIF" value="{{ $user->invoice_nif }}">
            </div>
            <div class="order-inp-1">
              <p>Provincia</p> <input class="order-inp" type="text" name="invoice_province" id="invoice_province" placeholder="Provincia" value="{{ $user->invoice_province }}">
            </div>
            <div class="order-inp-1">
              <p>Ciudad</p> <input class="order-inp" type="text" name="invoice_city" id="invoice_city" placeholder="Ciudad" value="{{ $user->invoice_city }}">
            </div>
          </div>
        </div>
      </div>
        @if($register == false)
        <div class="order-inp-1">
          <p>Email</p> <input class="order-inp" type="email" name="email" id="" value="{{session('email')}}" placeholder="Email" required>
        </div>
        <div style="width: 100%;">
          <div class="accordion" id="accordionExample">
            <div class="card" style="border: none;">

              <div class="card-header" id="headingOne" style="margin-left: 1%; padding: 0px;">
                <h2 class="mb-0">
                  <p class="order-payment-new-user" id="new-account-btn" style="margin-bottom: 15px; width: fit-content;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    ¿Quieres crearte una cuenta?
                  </p>
                </h2>
              </div>

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body" style="margin: 0px; margin-top: 1%; padding: 0px;">
                  <div class="order-inp-1">
                    <p>Contraseña</p> <input class="order-inp payment-password" type="password" name="password" id="" value="" >
                    <input type="hidden" class="new-account-payment-boolean" name="new_account_payment_boolean" value="false"/>
                  </div>
                  <div class="order-inp-1">
                    <p>Confirmación de contraseña</p> <input class="order-inp payment-conf-password" type="password" name="confirm_password" id="" value="" >
                  </div>
                </div>
                <p class="payment-password-error-msg" style="color: red; margin-left: 1%;"></p>
              </div>

            </div>
          </div>
        </div>
        @endif

      <table>
        <thead>
          <tr>
            <th>Cantidad</th>
            <th>Plato</th>
            <th>Precio</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        @foreach($cart->products as $i => $plato)
        <tbody>
          <tr>
            <td>
              {{ $plato->pivot->quantity }}
            </td>
            <td class="order-product-name">
              {{ $plato->nombre }} - {{ $plato->plato_peso->valor }}
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
      @if(Cookie::get('descuento') != null)
      <table class="order-paymenat-discount-table" style="width: 100% !important">
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
      <div class="order-continue">
        <a href="{{ route('web.carts.index') }}" class="order-payment-back-btn">Volver</a>
        <h4>Total:
          @if(Cookie::get('descuento')==null)
            {{ round($cart->total,2) }}€
          @elseif(Cookie::get('descuento_type')=='porcentaje')
            {{round(($cart->total*((100-Cookie::get('descuento'))/100)),2)}}€
          @elseif(Cookie::get('descuento_type')=='fijo')
            {{round($cart->total,2)-Cookie::get('descuento')}}€
          @elseif(Cookie::get('descuento_type')=='free')
            0€
          @endif
        </h4>
        <button type="submit" class="order-continue-btn">Continuar pago</button>
      </div>
    </form>
  </div>
  @endif
</div>
  @if(session()->has('message') AND session()->get('message')=='invalid cp')
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
      <p>De momento no repartimos en tu zona, pero no te preocupes, dentro de poco llegarmos a tu ciudad :)</p>
    </div>
  </div>
  @endif
@include('web.layout.newsletter')
@endsection

@push('custom-scripts')

<script type="text/javascript">

gtag('event', 'conversion', {
  'send_to': 'AW-10805779259/_5kRCIqFqoQDELu2zKAo'
});

fbq('track', 'InitiateCheckout')

</script>

@endpush
