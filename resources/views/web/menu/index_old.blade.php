@extends('web.layout.master')
@section('content')
<section class="mealplan_header breadcrumb_part blog_breadcrumb_style_1 service_breadcrumb_2">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="breadcrumb_iner_part text-center wow fadeInUp" data-wow-delay=".5s">
          <img class="mp-image mp-text-desktop" src="img/mealplan/header_text.png">
          <img class="mp-text-mobile" src="img/mealplan/mealplan_text.png">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="position-relative" style="padding-top: 60px; padding-bottom: 180px;">
  <div class="label-against"></div>
  <div class="container pad-0">
    <div class="row justify-content-center mp-mobile-hidden">
      <div class="col-sm-10">
        <div class="section_tittle style_2 wow fadeInDown" data-wow-delay=".5s">
          <h2>Meal Plan</h2>
          <p class="subtitle">Elige tu tipo de dieta</p>
        </div>
      </div>
    </div>
    <div class="row mp-meal-container">
      @foreach($objetivo as $i => $el)
      <div class="col-lg-4 col-sm-6 wow fadeInDown mp-image-container" data-wow-delay="{{ sprintf('.%ss', 3 + $i) }}">
        <div class="single_services_part style_2 mb-0">
          <a href="{{ route('web.menu.step1', $el->id) }}">
            <img class="mp-image-desktop" src="img/home/target_{{ $i + 1 }}.png" alt="{{ $el->name }}">
            <img class="mp-image-mobile" src="img/mealplan/targett_{{ $i + 1 }}.png" alt="{{ $el->name }}">
          </a>
          <p class="subtitle mt-3">{{ $el->nombre }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="subscribe_form_section section_padding parallaxie stay-alert-visible" style="background-color: #FF810C;">
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
@endsection