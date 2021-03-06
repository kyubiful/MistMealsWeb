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
                            {!! Form::open(['method' => 'GET', 'route' => ['web.menu.pdf'], 'id' => 'pdfMenu', 'target' => '_blank']) !!}
                            <input type="email" name="email" class="form-control cu_input" placeholder="Email" value="{{ str_contains($user->email, '@') ? $user->email : '' }}" required>
                            <button type="submit" class="cu_btn animate_btn text-white">Descargar PDF</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div id="accordion">
                @foreach($lunch as $i => $el)

                    <div class="card">
                        <div class="card-header" id="heading{{ $i }}">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                    <div class="day-title">Día <b>{{ $i+1 }}</b></div>
                                    <div class="day-info">
                                        <span>{{ round($lunch[$i]->calorias + $dinner[$i]->calorias, 0) }} <b>Calorías</b></span>
                                        <span>{{ $lunch[$i]->plato_info_nutricional->proteinas + $dinner[$i]->plato_info_nutricional->proteinas }} <b>Proteinas</b></span>
                                        <span>{{ $lunch[$i]->plato_info_nutricional->carbohidratos + $dinner[$i]->plato_info_nutricional->carbohidratos }} <b>Carbohidratos</b></span>
                                        <span>{{ $lunch[$i]->plato_info_nutricional->grasas + $dinner[$i]->plato_info_nutricional->grasas }} <b>Grasas</b></span>
                                        <span>{{ $lunch[$i]->plato_info_nutricional->fibra + $dinner[$i]->plato_info_nutricional->fibra }} <b>Fibra</b></span>
                                        <div class="open-carousel-img-container">
                                          <div class="open-carousel-img"></div>
                                        </div>
                                    </div>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse{{ $i }}" class="collapse" aria-labelledby="heading{{ $i }}" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container">
                                    <div class="day-lunch">
                                        <div class="left-dish">
                                            <div class="dish-title">
                                                <p class="title">COMIDA</p>
                                                <!-- <p class="name">{{ $lunch[$i]->nombre }}</p> -->
                                            </div>
                                            <div class="dish-photo">
                                                <img src="{{ $lunch[$i]->getUrlImage1Attribute() }}" alt="{{ $lunch[$i]->nombre }}" data-toggle="modal" data-target="#modal-dish-lunch-{{ $i }}">
                                            </div>
                                        </div>
                                        <div class="right-dish">
                                            <div class="dish-text">
                                                <!-- <p class="title">COMIDA</p> -->
                                                <p class="name">{{ $lunch[$i]->nombre }}</p>
                                            </div>
                                            <div class="dish-info">
                                                <span>{{ round($lunch[$i]->calorias, 0) }} <b>CAL</b></span>
                                                <span>{{ $lunch[$i]->plato_info_nutricional->proteinas }} <b>P</b></span>
                                                <span>{{ $lunch[$i]->plato_info_nutricional->carbohidratos }} <b>C</b></span>
                                                <span>{{ $lunch[$i]->plato_info_nutricional->grasas }} <b>G</b></span>
                                                <span>{{ $lunch[$i]->plato_info_nutricional->fibra }} <b>F</b></span>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="day-dinner">
                                        <div class="left-dish">
                                            <div class="dish-title">
                                                <p class="title">CENA</p>
                                                <!-- <p class="name">{{ $dinner[$i]->nombre }}</p> -->
                                            </div>
                                            <div class="dish-photo">
                                                <img src="{{ $dinner[$i]->getUrlImage1Attribute() }}" alt="{{ $dinner[$i]->nombre }}" data-toggle="modal" data-target="#modal-dish-dinner-{{ $i }}">
                                            </div>
                                        </div>
                                        <div class="right-dish">
                                            <div class="dish-text">
                                                <!-- <p class="title">CENA</p> -->
                                                <p class="name">{{ $dinner[$i]->nombre }}</p>
                                            </div>
                                            <div class="dish-info">
                                                <span>{{ round($dinner[$i]->calorias, 0) }} <b>CAL</b></span>
                                                <span>{{ $dinner[$i]->plato_info_nutricional->proteinas }} <b>P</b></span>
                                                <span>{{ $dinner[$i]->plato_info_nutricional->carbohidratos }} <b>C</b></span>
                                                <span>{{ $dinner[$i]->plato_info_nutricional->grasas }} <b>G</b></span>
                                                <span>{{ $dinner[$i]->plato_info_nutricional->fibra }} <b>F</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </section>

        <section class="subscribe_form_section section_padding parallaxie stay-alert-visible mar-0" style="background-color: #FF810C;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <div class="section_tittle ">
                            <div>
                                <h2 class="d-inline-flex" style="color: #F9F2E1"><span>¡Mantente alerta!</span></h2>
                            </div>
                            <div>
                                <p class="d-inline-flex description">Suscríbete a nuestra newsletter y entérate de todas las noticias en relación a nuestro movimiento, que hará que cambie la forma en la que te alimentes día a día...</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-12">
                        <form action="https://mistmeals.us1.list-manage.com/subscribe/post?u=bcef03a2016fd98bf6181e989&amp;id=9c3cb16e3e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                            <div class="form-row justify-content-center">
                                <div class="col-xl-3 col-sm-4 wow fadeInDown pr-0 pad-0" data-wow-delay=".5s">
                                    <input type="email" class="form-control cu_input" name="EMAIL" id="mce-EMAIL" placeholder="Déjanos tu email" required>
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bcef03a2016fd98bf6181e989_9c3cb16e3e" tabindex="-1" value=""></div>
                                </div>
                                <div class="col-xl-2 col-sm-4 wow fadeInDown pl-0 pad-0" data-wow-delay=".7s">
                                    <button type="submit" class="cu_btn animate_btn text-white">Suscríbete</button>
                                </div>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="col-lg-4 mt-3 wow fadeInDown" data-wow-delay=".7s">
                                    <div class="custom-control custom-checkbox single_contact_form">
                                        <input type="checkbox" class="custom-control-input" id="customControl" required>
                                        <label class="custom-control-label" for="customControl" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        @foreach($lunch as $i => $el)
            <div id="modal-dish-lunch-{{ $i }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="border: none">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                                            <img class="w-100 d-block" src="{{ $el->getUrlImage1Attribute() }}" alt="{{ $el->nombre }}_1">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="w-100 d-block" src="{{ $el->getUrlImage2Attribute() }}" alt="{{ $el->nombre }}_2">
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
                                                <h3>{{ $el->nombre }}</h3>                                   
                                                  <div class="nav nav-tabs" role="tablist" style="justify-content: left">
                                                      <a class="nav-item nav-link active dish-card-menu" data-toggle="tab" href="#nav_nutritional_lunch_{{ $i }}"
                                                          role="tab" aria-controls="nav_nutritional_lunch_{{ $i }}" aria-selected="false">Nutricional </a>
                                                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_description_lunch_{{ $i }}"
                                                          role="tab" aria-controls="nav_description_lunch_{{ $i }}" aria-selected="true">Ingredientes</a>
                                                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_recipe_lunch_{{ $i }}"
                                                          role="tab" aria-controls="nav_description_lunch_{{ $i }}" aria-selected="true">Receta</a>
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
                                                                        <!-- <p>@lang('admin.page.plato.per_100')</p> -->
                                                                        <p>Por plato</p>
                                                                    
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.energy')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->energia / 100) * $el->plato_peso->peso, 1) }}kJ</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->energia, 1) }}kJ</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.calories')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->calorias / 100) * $el->plato_peso->peso, 1) }} Cal</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->calorias, 1) }} Cal</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.protein')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->proteinas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->proteinas, 1) }}g</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.fats')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->grasas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->grasas, 1) }}g</p>
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
                                                                <p class="dish-recipe-text"><b>Receta:</b> {{$el->receta}}</p>
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

        @foreach($dinner as $i => $el)
            <div id="modal-dish-dinner-{{ $i }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="border: none">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                                            <img class="w-100 d-block" src="{{ $el->getUrlImage1Attribute() }}" alt="{{ $el->nombre }}_1">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="w-100 d-block" src="{{ $el->getUrlImage2Attribute() }}" alt="{{ $el->nombre }}_2">
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
                                                <h3>{{ $el->nombre }}</h3>                                                
                                                  <div class="nav nav-tabs" role="tablist" style="justify-content: left">
                                                      <a class="nav-item nav-link active dish-card-menu" data-toggle="tab" href="#nav_nutritional_dinner_{{ $i }}"
                                                          role="tab" aria-controls="nav_nutritional_dinner_{{ $i }}" aria-selected="false">Nutricional </a>
                                                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_description_dinner_{{ $i }}"
                                                          role="tab" aria-controls="nav_description_dinner_{{ $i }}" aria-selected="true">Ingredientes</a>
                                                      <a class="nav-item nav-link dish-card-menu" data-toggle="tab" href="#nav_recipe_dinner_{{ $i }}"
                                                          role="tab" aria-controls="nav_description_dinner_{{ $i }}" aria-selected="true">Receta</a>
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
                                                                        <!-- <p>@lang('admin.page.plato.per_100')</p> -->
                                                                        <p>Por plato</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.energy')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->energia / 100) * $el->plato_peso->peso, 1) }}kJ</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->energia, 1) }}kJ</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.calories')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->calorias / 100) * $el->plato_peso->peso, 1) }} Cal</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->calorias, 1) }} Cal</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.protein')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->proteinas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->proteinas, 1) }}g</p>
                                                                    </div>
                                                                    <div class="single_additional_info">
                                                                        <h5>@lang('admin.page.plato.info_nutritional.fats')</h5>
                                                                        <!-- <p>{{ round(($el->plato_info_nutricional->grasas / 100) * $el->plato_peso->peso, 1) }}g</p> -->
                                                                        <p>{{ round($el->plato_info_nutricional->grasas, 1) }}g</p>
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
                                                                <p class="dish-recipe-text"><b>Receta:</b> {{$el->receta}}</p>
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
