@extends('web.layout.master')
@section('content')
<section class="profile_info style_1 home-make-diet-container" style="background-color: #000000; padding-top: 80px;">
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center home-make-flex">
      <div class="wow zoomIn" style="z-index: 2;" data-wow-delay=".3s">
        <img class="mvw-100 home-mist-img" src="img/home/mist-home-header.png">
      </div>
      <div class="wow fadeIn" style="z-index: 3;" data-wow-delay=".3s">
        <img class="mvw-100 home-make-diet-img" src="img/home/mist-home-header-claim.png">
        <div class="description home-description-text">Hemos inventado el “Eativism”, un movimiento que cuestiona la forma en la que comemos.</div>
        <a href="{{ route('web.menu') }}" class="mist_btn animate_btn d-lg-block home-make-diet-btn">Crea tu plan de comidas</a>
      </div>
    </div>
  </div>
</section>

<section class="py-20" style="margin-top: 40px">
  <div class="container-fluid">
    <div class="row justify-content-center flex-column align-items-center position-relative">
      <div class="frame-text">
        <div class="frame-1 wow animated fadeInLeftBig" data-wow-duration="2s">
          <img src="img/home/eativism.png">
        </div>
        <div class="frame-2 wow fadeInRightBig" data-wow-duration="2s">
          <img src="img/home/meativism.png">
        </div>
      </div>
      <div class="planet position-relative" style="top: -40px;">
        <div class="wow fadeInUp" data-wow-duration="6s">
          <img class="home-potatoe-img" src="img/home/planet.png">
        </div>
        <div class="description text-center home-potatoe-text">
          Hemos inventado el “Eativism”, un movimiento que cuestiona la forma en la que comemos, cómo producimos los alimentos y todas las consecuencias negativas que esto provoca en nuestro organismo y en el planeta.
        </div>
      </div>
      <div class="antioxidant"">
        <img src=" img/home/antioxidant.png">
      </div>
    </div>
  </div>
</section>

<section class="py-20 py-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-10">
        <div class="section_tittle style_2 wow fadeInUp" data-wow-delay=".5s">
          <h2>Meal Plan</h2>
          <p class="subtitle">Elige tu menú</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6 wow fadeInLeftBig pad-0" data-wow-duration="1s">
        <div class="single_services_part style_2 mb-0">
          <img class="mp-mobile-hidden" src="img/home/target_{{ 1 + 1 }}.png" alt="{{ $objetivo[1]->name }}">
          <img class="mp-desktop-hidden" src="img/mealplan/targett_{{ 1 + 1 }}.png" alt="{{ $objetivo[1]->name }}">
          <p class="subtitle negative-margin">{{ $objetivo[1]->nombre }}</p>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6 pad-0">
        <div class="single_services_part style_2 mb-0">
          <img class="mp-mobile-hidden" src="img/home/target_{{ 0 + 1 }}.png" alt="{{ $objetivo[0]->name }}">
          <img class="mp-desktop-hidden" src="img/mealplan/targett_{{ 0 + 1 }}.png" alt="{{ $objetivo[0]->name }}">
          <p class="subtitle">{{ $objetivo[0]->nombre }}</p>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6 wow fadeInRightBig pad-0" data-wow-duration="1s">
        <div class="single_services_part style_2 mb-0">
          <img class="mp-mobile-hidden" src="img/home/target_{{ 2 + 1 }}.png" alt="{{ $objetivo[2]->name }}">
          <img class="mp-desktop-hidden" src="img/mealplan/targett_{{ 2 + 1 }}.png" alt="{{ $objetivo[2]->name }}">
          <p class="subtitle negative-margin">{{ $objetivo[2]->nombre }}</p>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-12 wow fadeInDown" data-wow-delay=".4s">
        <a href="{{ route('web.menu') }}" class="mist_btn animate_btn text-uppercase d-lg-block mx-auto">Crea tu plan</a>
      </div>
    </div>
  </div>
</section>

<section class="section_stop_dietism position-relative">
  <div class="background_green_rotate"></div>
  <div class="label-no wow fadeIn" data-wow-duration="2s"></div>
  <div class="label-yes wow fadeIn" data-wow-duration="2s"></div>

  <div class="container" style="padding: 120px 0;">
    <div class="row align-items-center home-expand">
      <div class="col-sm-6 home-stoph-img-container">
        <div class="img_section img_section_visible">
          <img class="home-stoph-img" src="img/home/stop-dietism.png" alt="#" class="img-fluid">
        </div>
      </div>
      <div class="col-sm-6 wow fadeInRightBig pad-0" data-wow-duration="1s">
        <div class="position-relative stop-dietism-text">
          <p class="home-stop-diet-text">
            ¡NO A MUCHAS COSAS! ¡SÍ A OTRAS TANTAS! SOMOS UN MOVIMIENTO DE REACCIÓN A TODAS LAS ACEPCIONES NEGATIVAS QUE TIENE EL CONCEPTO DE DIETA Y DE COMER BIEN. UNA DIETA NO ES UN MENÚ BAJONERO. CUIDAR LO QUE COMES TIENE MUCHO QUE VER CON <span class="text-green">CUIDAR NUESTRO CUERPO, NUESTROS DERECHOS O NUESTRO PLANETA.</span>
            <span class="label-bg-1 mp-desktop-hidden"></span>
            <span class="label-bg-2 mp-desktop-hidden"></span>
            <span class="label-bg-3 mp-desktop-hidden"></span>
            <span class="label-bg-4 mp-desktop-hidden"></span>
            <span class="label-bg-5 mp-desktop-hidden"></span>
            <span class="label-bg-6 mp-desktop-hidden"></span>
            <span class="label-bg-7 mp-desktop-hidden"></span>
            <span class="label-bg-8 mp-desktop-hidden"></span>
          </p>
          <div class="label-bg-1 mp-mobile-hidden"></div>
          <div class="label-bg-2 mp-mobile-hidden"></div>
          <div class="label-bg-3 mp-mobile-hidden"></div>
          <div class="label-bg-4 mp-mobile-hidden"></div>
          <div class="label-bg-5 mp-mobile-hidden"></div>
          <div class="label-bg-6 mp-mobile-hidden"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section_revolution position-relative">
  <div class="label-revolution wow fadeIn" data-wow-duration="6s"></div>
  <div class="label-detox"></div>
  <div class="container home-contanier-opinion">
    <div class="row align-items-center pad-0 home-fix-opinion">
      <div class="col-sm-6 wow fadeInUp pad-l-30" data-wow-duration="4s">
        <div class="section_tittle style_2 text-left wow fadeInDown" data-wow-delay=".3s">
          <h2>Tu opinión cuenta</h2>
          <div class="description home-opinion-text">Estamos haciendo un estudio sobre hábitos alimenticios y nos encantaría contar con tus respuestas y que entre todos podamos cambiar la forma en que nos alimentamos cada día.</div>
          <a href="{{ route('web.contacto') }}" class="mist_btn animate_btn d-lg-block">Ir a la encuesta</a>
        </div>
      </div>
      <div class="col-sm-6"></div>
    </div>
  </div>
</section>

<section class="subscribe_form_section section_padding parallaxie stay-alert-visible" style="background-color: #FF810C;">
  <div class="container wow fadeInUp" data-wow-duration="1s">
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
          @if (!auth()->check())
          <div class="form-row justify-content-center">
            <div class="col-lg-4 mt-3 wow fadeInDown" data-wow-delay=".7s">
              <div class="custom-control custom-checkbox single_contact_form">
                <input type="checkbox" class="custom-control-input" id="customControl" required>
                <label class="custom-control-label" for="customControl" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
              </div>
            </div>
          </div>
        @endif
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
