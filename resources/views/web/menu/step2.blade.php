@extends('web.layout.master')
@section('content')

<div id="target-{{ $user->objetivo->id }}">

  <section class="profile_info style_1" style="background-color: #000000; height: 620px; padding-top: 80px;">
    <div class="container-fluid st2-top-container">
      <div class="row align-items-center st2-top-container2">
        <div class="tag-clain" style="z-index: 2;">
          @if($user->objetivo->id == 1)
          <img class="mp-image-desktop" src="/img/mealplan/clain_dobetter.png">
          <img class="mp-image-mobile" src="/img/mealplan/targett_1.png">
          @elseif($user->objetivo->id == 2)
          <img class="mp-image-desktop" src="/img/mealplan/clain_focuson.png">
          <img class="mp-image-mobile" src="/img/mealplan/targett_2.png">
          @else
          <img class="mp-image-desktop" src="/img/mealplan/clain_muscleup.png">
          <img class="mp-image-mobile" src="/img/mealplan/targett_3.png">
          @endif
        </div>
        <div class="dishes-top-content">
          <img class="ymp-img" src="/img/mealplan/your_meal_plan.png">

          <div class="description">
            <span class="cal-number">{{ $user->calorias_propuestas }}</span>
            <span class="cal-text">Calorías diarias para lograr tu objetivo.</span>
          </div>

          <div class="text">Más abajo encontrarás nuestra propuesta de menú para ti, basada en tu frecuencia de deporte y tus datos personales.</div>

          <div class="pdf-form">
            <form method="POST" action="{{ route('web.menu.mail') }}" id="pdfMenu" target="_blank">
              @csrf
              <input type="email" name="email" class="form-control cu_input" placeholder="Email" value="{{ str_contains($user->email, '@') ? $user->email : '' }}" required>
              <button type="submit" class="cu_btn animate_btn text-white">Descargar PDF</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <section>
    <div id="accordion">
      @foreach($lunch as $i => $el)
      <div class="card">
        <div class="card-header" id="heading{{ $i }}">
          <h5 class="mb-0">
            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
              <div class="day-title">Día <b>{{ $i+1 }}</b></div>
              <div class="day-info">
                <span class="menu2-span-130" id="day-info-cal-{{$i+1}}">{{ round($lunch[$i]->calorias*($lunch[$i]->peso/100) + $dinner[$i]->calorias*($dinner[$i]->peso/100), 0) }} <b>Calorías</b></span>
                <span class="menu2-span-130" id="day-info-proteinas-{{$i+1}}">{{ round($lunch[$i]->plato_info_nutricional->proteinas*($lunch[$i]->peso/100) + $dinner[$i]->plato_info_nutricional->proteinas*($dinner[$i]->peso/100), 1) }} <b>Proteinas</b></span>
                <span class="menu2-span-190" id="day-info-hidratos-{{$i+1}}">{{ round($lunch[$i]->plato_info_nutricional->carbohidratos*($lunch[$i]->peso/100) + $dinner[$i]->plato_info_nutricional->carbohidratos*($dinner[$i]->peso/100), 1) }} <b>Carbohidratos</b></span>
                <span class="menu2-span-130" id="day-info-grasas-{{$i+1}}">{{ round($lunch[$i]->plato_info_nutricional->grasas*($lunch[$i]->peso/100) + $dinner[$i]->plato_info_nutricional->grasas*($dinner[$i]->peso/100), 1) }} <b>Grasas</b></span>
                <span class="menu2-span-130" id="day-info-fibra-{{$i+1}}">{{ round($lunch[$i]->plato_info_nutricional->fibra*($lunch[$i]->peso/100) + $dinner[$i]->plato_info_nutricional->fibra*($dinner[$i]->peso/100), 1) }} <b>Fibra</b></span>
                <div class="open-carousel-img-container">
                  <div class="open-carousel-img"></div>
                </div>
              </div>
            </button>
          </h5>
        </div>
        @if($i==0)
        <div id="collapse{{ $i }}" class="collapse show" aria-labelledby="heading{{ $i }}" data-parent="#accordion">
        @elseif($i!=0)
        <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#accordion">
        @endif
          <div class="card-body">
            <div class="container">
              <div class="slider-container">
                @foreach($lunchDishes as $x => $dishes)
                @if($lunch[$i]->id == $lunchDishes[$x]->id)
                <div class="day-lunch active" id="day-lunch-{{$i+1}}" data-id="{{$x+1}}">
                  @else
                  <div class="day-lunch" id="day-lunch-{{$i+1}}" data-id="{{$x+1}}">
                    @endif
                    <div class="left-dish">
                      <div class="dish-title">
                        <p class="title">COMIDA</p>
                        <!-- <p class="name">{{ $dishes->nombre }}</p> -->
                      </div>
                      <div class="dish-photo">
                        <img src="{{ asset($dishes->getUrlImage1Attribute()) }}" alt="{{ $dishes->nombre }}" data-toggle="modal" data-target="#modal-dish-lunch-{{ $x }}">
                      </div>
                    </div>
                    <div class="right-dish">
                      <div class="dish-text">
                        <!-- <p class="title">COMIDA</p> -->
                        <p class="dish-price">{{ $dishes->precio}}€</p>
                        <p class="name">{{ $dishes->nombre }} - {{ $dishes->plato_peso->valor }}</p>
                      </div>
                      <div class="dish-info">
                        <span>
                          <p>{{ round($dishes->calorias*($dishes->peso/100), 0) }}</p> <b>CAL</b>
                        </span>
                        <span>
                          <p>{{ round($dishes->plato_info_nutricional->proteinas*($dishes->peso/100), 1) }}</p> <b>P</b>
                        </span>
                        <span>
                          <p>{{ round($dishes->plato_info_nutricional->carbohidratos*($dishes->peso/100), 1) }}</p> <b>C</b>
                        </span>
                        <span>
                          <p>{{ round($dishes->plato_info_nutricional->grasas*($dishes->peso/100), 1) }}</p> <b>G</b>
                        </span>
                        <span>
                          <p>{{ round($dishes->plato_info_nutricional->fibra*($dishes->peso/100), 1) }}</p> <b>F</b>
                        </span>
                      </div>

                      <div class="menu-buttons">
                        <button class="menu-next-btn-lunch-{{$i+1}}"><img class="menu-next-img" src="/img/menu/nextback.svg"></button>
                        <button class="menu-back-btn-lunch-{{$i+1}}"><img class="menu-back-img" style="transform: rotate(180deg);" src="/img/menu/nextback.svg"></button>
                        <div>
                          <form method="POST" class="plate_form_menu" action="{{ route('web.platos.carts.store', [$dishes->id]) }}">
                            @csrf
                            <input type="hidden" name="plateQuantity" value="1" />
                            <button class="plato-menu-btn" type="submit"><span>+</span>
                              <p class="mp-mobile-hidden">Añadir</p>
                            </button>
                          </form>
                          <form method="POST" class="plate_form_menu_remove" action="{{ route('web.platos.carts.remove', [$dishes->id]) }}">
                            @csrf
                            <input type="hidden" name="plateQuantity" value="1" />
                            <button class="plato-menu-btn-remove" type="submit"><span>-</span>
                              <p class="mp-mobile-hidden">Quitar</p>
                            </button>
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>

                  @endforeach

                </div>

                <div class="slider-container">
                  @foreach($dinnerDishes as $y => $dishes)

                  @if($dinner[$i]->id == $dinnerDishes[$y]->id)
                  <div class="day-dinner active" id="day-dinner-{{$i+1}}" data-id="{{$y+1}}">
                    @else
                    <div class="day-dinner" id="day-dinner-{{$i+1}}" data-id="{{$y+1}}">
                      @endif
                      <div class="left-dish">
                        <div class="dish-title">
                          <p class="title">CENA</p>
                          <!-- <p class="name">{{ $dishes->nombre }}</p> -->
                        </div>
                        <div class="dish-photo">
                          <img src="{{ asset($dishes->getUrlImage1Attribute()) }}" alt="{{ $dishes->nombre }}" data-toggle="modal" data-target="#modal-dish-dinner-{{ $y }}">
                        </div>
                      </div>
                      <div class="right-dish">
                        <div class="dish-text">
                          <!-- <p class="title">CENA</p> -->
                          <p class="dish-price">{{ $dishes->precio }}€</p>
                          <p class="name">{{ $dishes->nombre }} - {{ $dishes->plato_peso->valor }}</p>
                        </div>
                        <div class="dish-info">
                          <span>
                            <p>{{ round($dishes->calorias*($dishes->peso/100), 0) }}</p> <b>CAL</b>
                          </span>
                          <span>
                            <p>{{ round($dishes->plato_info_nutricional->proteinas*($dishes->peso/100), 1) }}</p> <b>P</b>
                          </span>
                          <span>
                            <p>{{ round($dishes->plato_info_nutricional->carbohidratos*($dishes->peso/100), 1) }}</p> <b>C</b>
                          </span>
                          <span>
                            <p>{{ round($dishes->plato_info_nutricional->grasas*($dishes->peso/100), 1) }}</p> <b>G</b>
                          </span>
                          <span>
                            <p>{{ round($dishes->plato_info_nutricional->fibra*($dishes->peso/100), 1) }}</p> <b>F</b>
                          </span>
                        </div>

                        <div class="menu-buttons">
                          <button class="menu-next-btn-dinner-{{$i+1}}"><img class="menu-next-img" src="/img/menu/nextback.svg" alt="" srcset=""></button>
                          <button class="menu-back-btn-dinner-{{$i+1}}"><img class="menu-back-img" style="transform: rotate(180deg);" src="/img/menu/nextback.svg" alt="" srcset=""></button>
                          <div>
                            <form method="POST" class="plate_form_menu" action="{{ route('web.platos.carts.store', [$dishes->id]) }}">
                              @csrf
                              <input type="hidden" name="plateQuantity" value="1" />
                              <button class="plato-menu-btn" type="submit"><span>+</span>
                                <p class="mp-mobile-hidden">Añadir</p>
                              </button>
                            </form>
                            <form method="POST" class="plate_form_menu_remove" action="{{ route('web.platos.carts.remove', [$dishes->id]) }}">
                              @csrf
                              <input type="hidden" name="plateQuantity" value="1" />
                              <button class="plato-menu-btn-remove" type="submit"><span>-</span>
                                <p class="mp-mobile-hidden">Quitar</p>
                              </button>
                            </form>
                          </div>
                        </div>

                      </div>
                    </div>

                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        </div>
  </section>

  @include('web.layout.newsletter')

  @foreach($lunchDishes as $i => $el)
  <div id="modal-dish-lunch-{{ $i }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="border: none">
          <div class=""></div>
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
                          <img class="w-100 d-block" src="{{ asset(asset($el->getUrlImage1Attribute())) }}" alt="{{ $el->nombre }}_1">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="{{ asset($el->getUrlImage2Attribute()) }}" alt="{{ $el->nombre }}_2">
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
                                <p>{{ round($el->plato_info_nutricional->calorias, 1)* ($el->peso/100) }} Cal</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.protein')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->proteinas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1)* ($el->peso/100) }}g</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.fats')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->grasas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->grasas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->grasas, 1)* ($el->peso/100) }}g</p>
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
                                <p>{{ round($el->plato_info_nutricional->carbohidratos, 1)* ($el->peso/100) }}g</p>
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
                                <p>{{ round($el->plato_info_nutricional->fibra, 1)* ($el->peso/100) }}g</p>
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

  @foreach($dinnerDishes as $i => $el)
  <div id="modal-dish-dinner-{{ $i }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="border: none">
          <div class=""></div>
          <h3 class="col-lg-5 col-sm-11">{{ $el->nombre }}</h3>
          <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="row dish-card-fdirection">
                  <div class="col-8 col-sm-6 dish-img-card">
                    <div id="dish-dinner-carousel-{{ $i }}" class="carousel slide" data-ride="carousel" data-interval="false" data-pause="false" data-keyboard="true">
                      <div class="carousel-inner dish-carousel-menu">
                        <div class="carousel-item active">
                          <img class="w-100 d-block" src="{{ asset(asset($el->getUrlImage1Attribute())) }}" alt="{{ $el->nombre }}_1">
                        </div>
                        <div class="carousel-item">
                          <img class="w-100 d-block" src="{{ asset($el->getUrlImage2Attribute()) }}" alt="{{ $el->nombre }}_2">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#dish-dinner-carousel-{{ $i }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#dish-dinner-carousel-{{ $i }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      <ol class="carousel-indicators">
                        <li data-target="#dish-dinner-carousel-1" data-slide-to="1" class="active"></li>
                        <li data-target="#dish-dinner-carousel-2" data-slide-to="2" class=""></li>
                      </ol>
                    </div>
                  </div>
                  <div class="col-4 col-sm-6 product_description_iner dish-img-card">
                    <div class="nav nav-tabs" role="tablist" style="justify-content: left">
                      <a class="nav-item nav-link active dish-card-menu" data-toggle="tab" href="#nav_nutritional_dinner_{{ $i }}" role="tab" aria-controls="nav_nutritional_dinner_{{ $i }}" aria-selected="false">Nutricional </a>
                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_description_dinner_{{ $i }}" role="tab" aria-controls="nav_description_dinner_{{ $i }}" aria-selected="true">Ingredientes</a>
                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_recipe_dinner_{{ $i }}" role="tab" aria-controls="nav_description_dinner_{{ $i }}" aria-selected="true">Modo de empleo</a>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="nav_nutritional_dinner_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
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
                                <p>{{ round($el->plato_info_nutricional->calorias, 1)* ($el->peso/100) }} Cal</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.protein')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->proteinas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->proteinas, 1)* ($el->peso/100) }}g</p>
                              </div>
                              <div class="single_additional_info">
                                <h5>@lang('admin.page.plato.info_nutritional.fats')</h5>
                                <!-- <p>{{ round(($el->plato_info_nutricional->grasas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                <p>{{ round($el->plato_info_nutricional->grasas, 1) }}g</p>
                                <p>{{ round($el->plato_info_nutricional->grasas, 1)* ($el->peso/100) }}g</p>
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
                                <p>{{ round($el->plato_info_nutricional->carbohidratos, 1)* ($el->peso/100) }}g</p>
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
                                <p>{{ round($el->plato_info_nutricional->fibra, 1)* ($el->peso/100) }}g</p>
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
                      <div class="tab-pane fade" id="nav_description_dinner_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
                        <div class="row justify-content-center">
                          <div class="col-lg-12 dish-ingredients-text">
                            <p><b>Ingredientes:</b> {{ $el->ingredientes }}</p>
                            <p><b>Contiene:</b> {{ $el->plato_alergeno->count() ? implode(", ", $el->plato_alergeno->pluck('nombre')->all()) : '-' }}</p>
                            <p><b>Etiquetas:</b> {{ $el->plato_etiqueta->count() ? implode(", ", $el->plato_etiqueta->pluck('nombre')->all()) : '-' }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav_recipe_dinner_{{ $i }}" role="tabpanel" style="padding-top: 20px;">
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

</div>
@endsection
