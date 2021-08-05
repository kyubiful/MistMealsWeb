@extends('web.layout.master')
@section('content')
<div class="platos-top-background">
  <p class="platos-top-title">PLATOS</p>
</div>
<div class="platos-top-label"></div>
<div class="platos-container">
  @foreach($platos as $i => $plato)
  <div class="plato-container">
    <img src="{{ asset($plato->getUrlImage1Attribute()) }}" class="plato-img" alt="">
    <div class="plato-content">
      <p class="plato-title">{{ $plato->nombre }} </p>
      <div class="plato-info">
        <span>{{ bcdiv($plato->calorias, '1', 0) }} <b>cal</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->proteinas, '1', 0) }} <b>P</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->carbohidratos, '1', 0)}} <b>C</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->grasas, '1', 0) }} <b>G</b></span>
        <span>{{ bcdiv($plato->plato_info_nutricional->fibra, '1', 0) }} <b>F</b></span>
      </div>
      <form method="POST" action="{{ route('web.platos.carts.store', [$plato->id]) }}">
        @csrf
        <button class="mist_btn plato-btn" type="submit">Añadir</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
<section class="subscribe_form_section section_padding parallaxie stay-alert" style="background-color: #FF810C;">
  <div class="container wow fadeInUp" data-wow-duration="1s">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div class="section_tittle ">
          <div>
            <h2 class="d-inline-flex" style="color: #F9F2E1"><span>¡Mantente alerta!</span></h2>
          </div>
          <div>
            <p class="d-inline-flex description c4">Suscríbete a nuestra newsletter y entérate de todas las noticias en relación a nuestro movimiento, que hará que cambie la forma en la que te alimentes día a día...</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-12">
        <form action="https://mistmeals.us1.list-manage.com/subscribe/post?u=bcef03a2016fd98bf6181e989&amp;id=9c3cb16e3e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
          <div class="form-row justify-content-center">
            <div class="col-xl-3 col-sm-4 wow fadeInDown pr-0" data-wow-delay=".5s">
              <input type="email" class="form-control cu_input" name="EMAIL" id="mce-EMAIL" placeholder="Déjanos tu email" required>
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bcef03a2016fd98bf6181e989_9c3cb16e3e" tabindex="-1" value=""></div>
            </div>
            <div class="col-xl-2 col-sm-4 wow fadeInDown pl-0" data-wow-delay=".7s">
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
@endsection