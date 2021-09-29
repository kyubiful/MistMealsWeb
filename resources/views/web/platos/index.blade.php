@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
<div class="platos-top-background">
  <p class="platos-top-title">PLATOS</p>
</div>
<div class="platos-top-label"></div>
<div class="platos-count-container">
  <div class="platos-count-content">
    <div>
      @inject('cartService','App\Services\CartService')
      <p>Platos seleccionados (<span class="platos-count-number">{{$cartService->countProducts()}}</span>)</p>
      <p style="font-size: 13px; font-family: coresansc65 !important;">Selecciona mínimo 5 platos*</p>
    </div>
    <div>
      <a class="plates-modal-cart-btn-top" href="{{route('web.carts.index')}}">IR AL CARRITO</a>
    </div>
  </div>
</div>
<div style="display: flex; justify-content: center; flex-wrap: wrap;">
<div class="platos-container">
  @foreach($platos as $i => $plato)
  @if($plato->plato_peso->valor == 'M')
  <div class="plato-container">
    <img src="{{ asset('/'.$plato->getUrlImage1Attribute()) }}" class="plato-img" data-toggle="modal" data-target="#modal-dish-{{$i}}" alt="">
    <div class="plato-content">
      <p class="plato-price">{{ $plato->precio }}€</p>
      <p class="plato-title">{{ $plato->nombre }} - {{ $plato->plato_peso->valor }}</p>
      <div class="plato-info">
        <span class="plate-info-btn" data-toggle="modal" data-target="#modal-dish-{{$i}}">?</span>
        <span>{{ bcdiv($plato->calorias*$plato->peso/100, '1', 0) }} <b>cal</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->proteinas*$plato->peso/100, '1', 0) }} <b>P</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->carbohidratos*$plato->peso/100, '1', 0)}} <b>C</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->grasas*$plato->peso/100, '1', 0) }} <b>G</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->fibra*$plato->peso/100, '1', 0) }} <b>F</b></span>
      </div>
      <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}" class="plate_form" name="plate_form_{{$i}}">
        @csrf
        <div class="plate-quantity-container">
          <p>Cantidad</p>
          <div>
            <button type="button" class="plate-btn-less">-</button>
            <input type="number" name="plateQuantity" class="plate-quantity-display" value="1" min="0">
            <button type="button" class="plate-btn-more">+</button>
          </div>
        </div>
        <div class="plato-peso-switch-content">
          <p>Peso</p>
          <div class="plato-peso-switch-container">
            <label class="plato-peso-switch-m active">M</label>
            <label class="plato-peso-switch-l">L</label>
          </div>
        </div>
        <button class="mist_btn plato-btn" type="submit">Añadir</button>
      </form>
    </div>
  </div>
  @endif
  @endforeach
  </div>
  <div class="platos-container-l">
  @foreach($platos as $i => $plato)
  @if($plato->plato_peso->valor == 'L')
  <div class="plato-container-l">
    <img src="{{ asset('/'.$plato->getUrlImage1Attribute()) }}" class="plato-img" data-toggle="modal" data-target="#modal-dish-{{$i}}" alt="">
    <div class="plato-content">
      <p class="plato-price">{{ $plato->precio }}€</p>
      <p class="plato-title">{{ $plato->nombre }} - {{ $plato->plato_peso->valor }}</p>
      <div class="plato-info">
        <span class="plate-info-btn" data-toggle="modal" data-target="#modal-dish-{{$i}}">?</span>
        <span>{{ bcdiv($plato->calorias*$plato->peso/100, '1', 0) }} <b>cal</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->proteinas*$plato->peso/100, '1', 0) }} <b>P</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->carbohidratos*$plato->peso/100, '1', 0)}} <b>C</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->grasas*$plato->peso/100, '1', 0) }} <b>G</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->fibra*$plato->peso/100, '1', 0) }} <b>F</b></span>
      </div>
      <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}" class="plate_form" name="plate_form_{{$i}}">
        @csrf
        <div class="plate-quantity-container">
          <p>Cantidad</p>
          <div>
            <button type="button" class="plate-btn-less">-</button>
            <input type="number" name="plateQuantity" class="plate-quantity-display" value="1" min="0">
            <button type="button" class="plate-btn-more">+</button>
          </div>
        </div>
        <div class="plato-peso-switch-content-fake">
          <p>Peso</p>
          <div class="plato-peso-switch-container-fake">
            <label class="plato-peso-switch-m-fake">M</label>
            <label class="plato-peso-switch-l-fake">L</label>
          </div>
        </div>
        <button class="mist_btn plato-btn" type="submit">Añadir</button>
      </form>
    </div>
  </div>
  @endif
  @endforeach
  </div>
</div>
</div>

{{ $platos->links() }}
<!-- <div class="plates-modal">
  <div>
    <button class="plates-modal-hide">X</button>
  </div>
  <div>
    <h3>Añadido al carrito</h3>
  </div>
  <div>
    <p class="plates-modal-info-name"></p>
    <p class="plates-modal-info-price"><b></b></p>
  </div>
  <div class="plates-buttons">
    <a class="plates-modal-cart-btn" href="{{route('web.carts.index')}}">VER CARRITO</a>
  </div>
</div> -->

  @foreach($platos as $i => $el)
  <div id="modal-dish-{{ $i }}" class="platos-info-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="border: none">
          <div class="col-lg-6 plate-modal-zero"></div>
          <h3 class="col-lg-5 col-sm-11">{{ $el->nombre }}</h3>
          <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="row dish-card-fdirection">
                  <div class="col-8 col-sm-6 dish-img-card">
                    <div id="dish-lunch-carousel-{{ $i }}" class="carousel slide" data-ride="carousel" data-interval="false" data-pause="false" data-keyboard="true">
                      <div class="carousel-inner dish-carousel-menu">
                        <div class="carousel-item active">
                          <img class="w-100 d-block" src="{{ asset('/'.$el->getUrlImage1Attribute()) }}" alt="{{ $el->nombre }}_1">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="{{ asset('/'.$el->getUrlImage2Attribute()) }}" alt="{{ $el->nombre }}_2">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#dish-lunch-carousel-{{ $i }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#dish-lunch-carousel-{{ $i }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      <ol class="carousel-indicators">
                        <li data-target="#dish-lunch-carousel-1" data-slide-to="1" class="active"></li>
                        <li data-target="#dish-lunch-carousel-2" data-slide-to="2" class=""></li>
                      </ol>
                    </div>
                  </div>
                  <div class="col-4 col-sm-6 product_description_iner dish-img-card">
                    <div class="nav nav-tabs" role="tablist" style="justify-content: left">
                      <a class="nav-item nav-link active dish-card-menu" data-toggle="tab" href="#nav_nutritional_lunch_{{ $i }}" role="tab" aria-controls="nav_nutritional_lunch_{{ $i }}" aria-selected="false">Nutricional </a>
                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_description_lunch_{{ $i }}" role="tab" aria-controls="nav_description_lunch_{{ $i }}" aria-selected="true">Ingredientes</a>
                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_recipe_lunch_{{ $i }}" role="tab" aria-controls="nav_description_lunch_{{ $i }}" aria-selected="true">Modo de empleo</a>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="nav_nutritional_lunch_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
                        <div class="row justify-content-center">
                          <div class="col-lg-12">
                            <div class="additional_info">
                              <div class="single_additional_info title">
                                <!-- <h5>@lang('admin.page.plato.serving')</h5> -->
                                <h5></h5>
                                <!-- <p>{{ sprintf(trans('admin.page.plato.per_%s'), $el->plato_peso->peso) }}</p> -->
                                <p>@lang('admin.page.plato.per_100')</p>
                                <p>Por plato</p>

                              </div>
                              <!-- <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.energy')</h5>
                                                                        <p>{{ round(($el->plato_info_nutricional->energia / 100) * $el->plato_peso->peso, 1) }}kJ</p>
                                                                        <p>{{ round($el->plato_info_nutricional->energia, 1) }}kJ</p>
                                                                    </div> -->
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.calories')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->calorias / 100) * $el->plato_peso->peso, 1) }} Cal</p> -->
                                <p>{{ round($el->plato_info_nutricional->calorias, 1) }} Cal</p>
                                <p>{{ round($el->plato_info_nutricional->calorias, 1) * ($el->peso/100) }} Cal</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.protein')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->proteinas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1) * ($el->peso/100) }}g</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.fats')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->grasas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->grasas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->grasas, 1) * ($el->peso/100) }}g</p>
                              </div>
                              <!-- <div class="single_additional_info">
                                                                        <h5 class="sat-az-left">@lang('admin.page.plato.info_nutritional.satured')</h5>
                                                                        <p>{{ round(($el->plato_info_nutricional->saturadas / 100) * $el->plato_peso->peso, 1) }}g</p>
                                                                        <p>{{ round($el->plato_info_nutricional->saturadas, 1) }}g</p>
                                                                    </div> -->
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.carbo')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->carbohidratos / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->carbohidratos, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->carbohidratos, 1) * ($el->peso/100) }}g</p>
                              </div>
                              <!-- <div class="single_additional_info">
                                                                        <h5 class="sat-az-left">@lang('admin.page.plato.info_nutritional.sugars')</h5>
                                                                        <p>{{ round(($el->plato_info_nutricional->azucar / 100) * $el->plato_peso->peso, 1) }}g</p>
                                                                        <p>{{ round($el->plato_info_nutricional->azucar, 1) }}g</p>
                                                                    </div> -->
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.fibre')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->fibra / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->fibra, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->fibra, 1) * ($el->peso/100) }}g</p>
                              </div>
                              <!-- <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.sodium')</h5>
                                                                        <p>{{ round(($el->plato_info_nutricional->sodio / 100) * $el->plato_peso->peso, 1) }}mg</p>
                                                                        <p>{{ round($el->plato_info_nutricional->sodio, 1) }}mg</p>
                                                                    </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav_description_lunch_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
                        <div class="row justify-content-center">
                          <div class="col-lg-12 dish-ingredients-text">
                            <p><b>Ingredientes:</b> {{ $el->ingredientes }}</p>
                            <p><b>Contiene:</b> {{ $el->plato_alergeno->count() ? implode(", ", $el->plato_alergeno->pluck('nombre')->all()) : '-' }}</p>
                                                                <p><b>Etiquetas:</b> {{ $el->plato_etiqueta->count() ? implode(", ", $el->plato_etiqueta->pluck('nombre')->all()) : '-' }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav_recipe_lunch_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
                        <div class="row justify-content-center">
                          <div class="col-lg-12">
                            <p class="dish-recipe-text"><b>Modo de empleo:</b> {{$el->receta}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="border: none">
        </div>
      </div>
    </div>
  </div>
  @endforeach
@include('web.layout.newsletter')
@endsection
