@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/global/global-plates-plate.css')}}" />
@endpush
@endonce

@if(empty($style))
  {{$style = ''}}
@endif
@if(empty($class))
  {{$class = ''}}
@endif

@if($plato->plato_peso->valor == 'M')
<div class="global-plates-plate-container-m {{$class}}" style="{{$style}}">
@elseif($plato->plato_peso->valor == 'L')
<div class="global-plates-plate-container-l {{$class}}" style="{{$style}}">
@endif
  <div class="global-plates-plate-img">
    <img src="{{ asset($plato->getUrlImage1Attribute()) }}" class="plato-img" data-toggle="modal" data-target="#modal-dish-{{$plato->id}}" alt="">
  </div>
  <div class="global-plates-plate-price-name">
    <p class="global-plates-plate-price">{{ $plato->precio }}€</p>
    <p class="global-plates-plate-name">{{ $plato->nombre }}</p>
    <div class="global-plates-plate-name-info-nutri">
      <span class="" data-toggle="modal" data-target="#modal-dish-{{$plato->id}}">?</span>
      <span>{{ bcdiv($plato->calorias*$plato->peso/100, '1', 0) }} <b>cal</b></span>
      <span>{{ bcdiv($plato->plato_info_nutricional->proteinas*$plato->peso/100, '1', 0) }} <b>P</b></span>
      <span>{{ bcdiv($plato->plato_info_nutricional->carbohidratos*$plato->peso/100, '1', 0)}} <b>C</b></span>
      <span>{{ bcdiv($plato->plato_info_nutricional->grasas*$plato->peso/100, '1', 0) }} <b>G</b></span>
      <span>{{ bcdiv($plato->plato_info_nutricional->fibra*$plato->peso/100, '1', 0) }} <b>F</b></span>
    </div>
    <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}" class="plate_form" name="plate_form_{{$plato->id}}">
      @csrf
      <div class="global-plates-plate-quantity">
        <p>Cantidad</p>
        <div style="display: flex; align-content: center; align-items: center; flex-direction: row; width: 80px; justify-content: space-evenly;">
          <button type="button" class="plate-btn-less">-</button>
          <input type="number" name="plateQuantity" class="plate-quantity-display" value="1" min="0">
          <button type="button" class="plate-btn-more">+</button>
        </div>
      </div>
      <div class="global-plates-plate-weight">
        <p>Tamaño</p>
        <div class="globa-plates-plate-weight-btn-container">
          @if($plato->plato_peso->valor == 'M')
          <label class="global-plates-plate-weight-btn-m active">M</label>
          @else
          <label class="global-plates-plate-weight-btn-m">M</label>
          @endif
          @if($plato->plato_peso->valor == 'L')
          <label class="global-plates-plate-weight-btn-l active">L</label>
          @else
          <label class="global-plates-plate-weight-btn-l">L</label>
          @endif
        </div>
      </div>
      <x-global-primary-button class="plato-btn" name="AÑADIR" type="button"/>
    </form>
  </div>
</div>
