<style>
.cart-product-content-product img {
  width: 150px;
  height: 150px;
}
.cart-plate-add-remove-button{
  background-color: #533fb8;
  color: #f9f2e1;
  width: 25px;
  height: 25px;
  transition: all 1s ease;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}
.cart-plate-add-remove-button:hover{
  background-color: #f9f2e1;
  color: #533fb8;
  }

.cart-discount-img{
  width: 200px !important;
  margin-top: -130px !important;
}

@media (max-width: 991px) {
  .cart-product-content-product img {
    width: 100px;
    height: 100px;
  }

  .cart-product-content-product span {
    width: 100%;
    text-align: end !important;
  }

  .cart-discount-img{
    margin-top: 18px !important;
    margin-bottom: 20px !important;
    width: 100% !important;
  }
}
</style>

@extends('web.layout.master')
@section('content')
<div class="cart-container">
  @if(!isset($cart) || $cart->products->isEmpty())
  <div class="empty-cart">
    <p>El carrito está vacío</p>
  </div>
  @else
  <div class="cart-products">
    <h1>Carrito</h1>
    @foreach($cart->products as $i => $plato)
      <div class="cart-product-content-product" style="margin-bottom: 10px;">
        <img src="{{ asset($plato->getUrlImage1Attribute()) }}" alt="">
        <div style="display: flex; flex-direction: column; justify-content: space-evenly;">
          <span class="cart-product-name" style="justify-content: flex-end">{{ $plato->nombre }} - {{ $plato->plato_peso->valor }}</span>
          <span class="cart-product-price" style="justify-content: flex-end"><b>{{ $plato->total }}€</b></span>
          <div style="display: flex; flex-direction: row; width: 200px; justify-content: flex-end; margin-right: 0; margin-left: auto;">
              <div style="display: flex; align-items: center;">
                <a class="cart-plate-add-remove-button" id="cart-plate-remove-button" href="{{ route('web.cart.removeOnePlate', ['plateID' => $plato->id]) }}">-</a>
                <div style="width: 25px; height: 25px; border: 1px solid #533fb8; display: flex; justify-content: center; align-items: center;">
                  <p style="text-align: center; margin-top: 2px;" id="cart-number-plates">{{ $plato->pivot->quantity }}</p>
                </div>
                <a class="cart-plate-add-remove-button" id="cart-plate-add-button" href="{{ route('web.cart.addOnePlate', ['plateID' => $plato->id]) }}">+</a>
              </div>
              <form class="cart-products-content" method="POST" action="{{ route('web.platos.carts.destroy', ['cart' => $cart->id, 'plato' => $plato->id]) }}" style="display: flex; justify-content: center; align-items: center; margin-bottom: 0px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="font-size: 15px; margin-left: 10px;">Eliminar</button>
              </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="cart-price">
    <div class="cart-price-content">
      <div>
        <div class="cart-discount-img">
        </div>
        <div class="cart-cod-desc">
          <form method="POST" action="{{ route('web.cart.discount') }}">
            @csrf
            <input type="text" name="discount_name" placeholder="Código descuento">
            <input type="submit" value="Aplicar">
          </form>
          @if(Cookie::get('descuento') != null AND Cookie::get('descuento_type') != null)
          <p>Descuento aplicado:
            @if(Cookie::get('descuento_type')=='fijo')
              {{Cookie::get('descuento')}}€
            @else
              {{Cookie::get('descuento')}}%
            @endif
            <a style="color: white;" href="{{route('web.cart.discount.remove')}}">X</a>
          </p>
          @endif
          {{Session()->get('discountMessageError')}}
        </div>
        <div class="cart-price-subtotal-content">
          <p class="cart-price-subtotal"><span>Subtotal</span><span id="cart-subtotal">{{$cart->total}}€</span></p>
          <p class="cart-price-subtotal">
            <span>Descuento</span>
            <span>
              @if(Cookie::get('descuento')!=null AND Cookie::get('descuento_type')!=null)
                @if(Cookie::get('descuento_type')=='porcentaje') -{{round(((Cookie::get('descuento')*$cart->total)/100),2)}}€
                @elseif(Cookie::get('descuento_type')=='fijo')-{{Cookie::get('descuento')}}€
                @endif
              @else
                0€
              @endif

            </span>
          </p>
          <p class="cart-price-subtotal"><span><del>Gastos de envío</del></span><span><del>4.15€</del></span></p> <!-- implementar gastos de envío -->
        </div>
        <p class="cart-price-total">
          <b>
            <span>TOTAL</span>
            <span id="cart-total">
              @if(Cookie::get('descuento')!=null AND Cookie::get('descuento_type')!=null)
                @if(Cookie::get('descuento_type')=='porcentaje')
                  {{round(($cart->total*(100-Cookie::get('descuento'))/100),2)}}€
                @elseif(Cookie::get('descuento_type')=='fijo')
                  {{round($cart->total-Cookie::get('descuento'))}}€
                @endif
              @else
                {{ round($cart->total,2) }}€
              @endif

            </span>
          </b>
        </p>
      </div>
      <div>
        <p style="margin-bottom: 30px;color: #FFCF00; font-size: 13px; font-family: 'CoreSansC35' !important; width: 333px; line-height: 18px;">*Recordarte que para conservar mejor el alimento y evitar desperdicios, necesitamos recibir los pedidos antes de las 23:59h del Domingo. Te llegarán los platos el jueves de la semana siguiente.</p>
      </div>
      @inject('cartService','App\Services\CartService')
      @if($cartService->countProducts() < 5)
      <a style="margin: auto;" class="mist_btn_disable" href="{{route('web.orders.create')}}">Tramitar pedido</a>
      <div id="cart-message-section">
        <p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>
      </div>
      @elseif($cartService->countProducts() > 14 AND Cookie::get('descuento_type')=='free')
      <a style="margin: auto;" class="mist_btn_disable" href="{{route('web.orders.create')}}">Tramitar pedido</a>
      <div id="cart-message-section">
        <p style="color: red; text-align: center;">*Máximo 14 platos para este código de descuento</p>
      </div>
      @else
      <a style="margin: auto;" class="mist_btn" href="{{ route('web.orders.create') }}">Tramitar pedido</a>
      <div id="cart-message-section">
      </div>
      @endif
      @if(session('lunch')!==null AND session('dinner')!==null)
      <a class="mist_btn" style="margin: auto; margin-top: 75px;" href="{{ url('/menu/dishes') }}">Volver al menú</a>
      @endif
    </div>
  </div>
  @endif
</div>
@include('web.layout.newsletter')
  @if(session()->has('message'))
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
      <p>{{ session()->get('message') }}</p>
    </div>
  </div>
  @endif
  <script>

    let addPlateBtn = document.querySelectorAll('#cart-plate-add-button')
    let removePlateBtn = document.querySelectorAll('#cart-plate-remove-button')
    let numberPlates = document.querySelectorAll('#cart-number-plates')
    let pricePlates = document.querySelectorAll('.cart-product-price b')
    let products = document.querySelectorAll('.cart-product-content-product')
    let cartMessageSection = document.querySelector('#cart-message-section')
    let mistBtn = document.querySelector('.mist_btn')
    let mistBtnDisable = document.querySelector('.mist_btn_disable')
    let menuCartCount = document.querySelector('.menu-cart-btn p')
    let menuCartCountMobile = document.querySelector('.menu-cart-btn-mobile p')
    let totalPlates = 0
    let totalCart = document.querySelector('#cart-total')
    let subtotalCart = document.querySelector('#cart-subtotal')

    for(let i = 0; i<numberPlates.length; i++){
      totalPlates += parseInt(numberPlates[i].innerHTML)
    }

    for(let i = 0; i<addPlateBtn.length; i++){
      addPlateBtn[i].addEventListener('click', (e) => {
        e.preventDefault()

        let numberPlate = numberPlates[i]
        let productPrice = pricePlates[i]

        $.ajax({
        method: 'GET',
        url: addPlateBtn[i].href,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.status == 200) {
              if (data.link != undefined) {
                  window.location.href = data.link;
              } else {
                console.log('error')
              }
          } else if (data.status == 500) {
            numberPlate.innerHTML = parseInt(numberPlate.innerHTML) + 1
            menuCartCount.innerHTML = parseInt(menuCartCount.innerHTML) + 1
            menuCartCountMobile.innerHTML = parseInt(menuCartCountMobile.innerHTML) + 1
            productPrice.innerHTML = (parseFloat(productPrice.innerHTML.slice(0,-1).toFixed(2)) + parseFloat(data.infoPrice).toFixed(2)) + '€'
            totalCart.innerHTML = (parseFloat(totalCart.innerHTML.slice(0,-1).toFixed(2))+parseFloat(data.infoPrice).toFixed(2))+'€'
            subtotalCart.innerHTML = (parseFloat(subtotalCart.innerHTML.slice(0,-1).toFixed(2))+parseFloat(data.infoPrice).toFixed(2))+'€'
            totalPlates+=1
            if(totalPlates<5){
              cartMessageSection.innerHTML = '<p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>'
              if(mistBtn != null){
                mistBtn.classList.remove('mist_btn')
                mistBtn.classList.add('mist_btn_disable')
              }
              if(mistBtnDisable != null){
                mistBtnDisable.classList.remove('mist_btn')
                mistBtnDisable.classList.add('mist_btn_disable')
              }
            } else {
              cartMessageSection.innerHTML = ''
              if(mistBtn != null){
                mistBtn.classList.add('mist_btn')
                mistBtn.classList.remove('mist_btn_disable')
              }
              if(mistBtnDisable != null){
                mistBtnDisable.classList.add('mist_btn')
                mistBtnDisable.classList.remove('mist_btn_disable')
              }
            }
          }
      },
      error: function (a, b, c) {
          // Spinner OFF
        console.log(error)
      }
      })
    })
    }

    for(let i = 0; i<removePlateBtn.length; i++){
      removePlateBtn[i].addEventListener('click', (e) => {
        e.preventDefault()

        let numberPlate = numberPlates[i]
        let productPrice = pricePlates[i]
        let product = products[i]

        $.ajax({
        method: 'GET',
        url: removePlateBtn[i].href,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        success: function (data) {
          if (data.status == 200) {
              if (data.link != undefined) {
                  window.location.href = data.link;
              } else {
                console.log('error')
              }
          } else if (data.status == 500) {
            if(parseInt(numberPlate.innerHTML) <= 1) {
              totalPlates-=1
              product.remove()
              menuCartCount.innerHTML = parseInt(menuCartCount.innerHTML) - 1
              menuCartCountMobile.innerHTML = parseInt(menuCartCountMobile.innerHTML) - 1
              totalCart.innerHTML = (parseFloat(totalCart.innerHTML.slice(0,-1).toFixed(2))-parseFloat(data.infoPrice).toFixed(2))+'€'
              subtotalCart.innerHTML = (parseFloat(subtotalCart.innerHTML.slice(0,-1).toFixed(2))-parseFloat(data.infoPrice).toFixed(2))+'€'
              if(totalPlates<5){
                cartMessageSection.innerHTML = '<p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>'
                if(mistBtn != null){
                  mistBtn.classList.remove('mist_btn')
                  mistBtn.classList.add('mist_btn_disable')
                  mistBtn.disabled = true
                }
                if(mistBtnDisable != null){
                  mistBtnDisable.classList.remove('mist_btn')
                  mistBtnDisable.classList.add('mist_btn_disable')
                }
              } else {
                cartMessageSection.innerHTML = ''
                if(mistBtnDisable != null){
                  mistBtnDisable.classList.add('mist_btn')
                  mistBtnDisable.classList.remove('mist_btn_disable')
                }
                if(mistBtn != null){
                  mistBtn.classList.add('mist_btn')
                  mistBtn.classList.remove('mist_btn_disable')
                }
              }
            } else {
              numberPlate.innerHTML = parseInt(numberPlate.innerHTML) - 1
              productPrice.innerHTML = (parseFloat(productPrice.innerHTML.slice(0,-1).toFixed(2)) - parseFloat(data.infoPrice).toFixed(2)) + '€'
              totalPlates-=1
              menuCartCount.innerHTML = parseInt(menuCartCount.innerHTML) - 1
              menuCartCountMobile.innerHTML = parseInt(menuCartCountMobile.innerHTML) - 1
              totalCart.innerHTML = (parseFloat(totalCart.innerHTML.slice(0,-1).toFixed(2))- parseFloat(data.infoPrice).toFixed(2))+'€'
              subtotalCart.innerHTML = (parseFloat(subtotalCart.innerHTML.slice(0,-1).toFixed(2))- parseFloat(data.infoPrice).toFixed(2))+'€'
              if(totalPlates<5){
                cartMessageSection.innerHTML = '<p style="color: red; text-align: center;">*Pedido mínimo de 5 platos</p>'
                if(mistBtn != null){
                  mistBtn.classList.remove('mist_btn')
                  mistBtn.classList.add('mist_btn_disable')
                  mistBtn.disabled = true
                }
                if(mistBtnDisable != null){
                  mistBtnDisable.classList.remove('mist_btn')
                  mistBtnDisable.classList.add('mist_btn_disable')
                }
              } else {
                cartMessageSection.innerHTML = ''
                if(mistBtnDisable != null){
                  mistBtnDisable.classList.add('mist_btn')
                  mistBtnDisable.classList.remove('mist_btn_disable')
                }
                if(mistBtn != null){
                  mistBtn.classList.add('mist_btn')
                  mistBtn.classList.remove('mist_btn_disable')
                }
              }
            }
          }
      },
      error: function (a, b, c) {
          // Spinner OFF
        console.log(error)
      }
      })
    })
    }
  </script>
@endsection
