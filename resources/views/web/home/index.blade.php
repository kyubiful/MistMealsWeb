@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
{{session()->get('popupCp2')}}
{{session()->get('popupCp')}}
@if(!empty($popupCp) AND $popupCp < 4 AND Cookie::get('popupCpEnd') == false)
 <section class="home-popup-container">
    <div class="home-popup-content">
      <button class="home-popup-btn">X</button>
      <h2>¡BIENVENID@S!</h2>
      <p>Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
      @if($popupCp == 1 AND !session()->has('popupCp2'))
      <form method="POST" action="{{route('web.verifyCP')}}" class="home-popup-form">
        @csrf
        <input type="number" name="cp" id="" placeholder="00000">
        <button type="submit">Verificar</button>
      </form>
      <p style="font-size: 10px;">*no enviamos a islas, Ceuta y Melilla</p>
      @endif
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==2)
      <p style="font-size: 13px; margin-top: 5px;">¡Llegamos hasta allí!</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==3)
      <p style="font-size: 13px; line-height: inherit; margin-bottom:10px; margin-top: 5px;">¡Vaya! Hasta ahí de momento no llegamos, si quieres puedes registrarte y te avisaremos por email cuando estemos por allí ;)</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
    </div>
  </section>
  @endif

@if(session()->has('popupCp2') AND session()->get('popupCp2')==2 AND Cookie::get('popupCpEnd') == false)
 <section class="home-popup-container">
    <div class="home-popup-content">
      <button class="home-popup-btn">X</button>
      <h2>¡BIENVENID@S!</h2>
      <p>Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==2)
      <p style="font-size: 13px; margin-top: 5px;">¡Llegamos hasta allí!</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
      @if(session()->has('popupCp2') AND session()->get('popupCp2')==3)
      <p style="font-size: 13px; line-height: inherit; margin-bottom:10px; margin-top: 5px;">¡Vaya! Hasta ahí de momento no llegamos, si quieres puedes registrarte y te avisaremos por email cuando estemos por allí ;)</p>
      <form action="{{route('web.endHomePopup')}}" method="get" class="home-popup-form-btn">
        @csrf
        <input type="submit" value="Visitar la web">
      </form>
      @endif
    </div>
  </section>
  @endif

 <section class="home-popup-container2 home-popup-hidden">
    <div class="home-popup-content">
      <button class="home-popup-btn2">X</button>
      <h2>¡BIENVENID@S!</h2>
      <p>Introduce tu código postal para verificar que repartimos en tu zona de entrega</p>
      <form method="POST" action="{{route('web.verifyCP')}}" class="home-popup-form">
        @csrf
        <input type="number" name="cp" id="" placeholder="00000">
      </form>
      <p style="font-size: 10px;">*no enviamos a islas, Ceuta y Melilla</p>
    </div>
  </section>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item mp-mobile-hidden active">
        <section>
          <div class="embed-responsive embed-responsive-16by9" style="margin-top: 90px; height: 827px; display: flex;">
              <video class="embed-responsive-item" src="video/MistMeals4K.mp4" autoplay loop muted style="width: 100%;"></video>
          </div>
        </section>
      </div>
      <div class="carousel-item">
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
      </div>
    </div>
  </div>
  <section class="py-20" style="margin-top: 40px">
    <div class="container-fluid">
      <div class="row justify-content-center flex-column align-items-center position-relative">
        <div class="frame-text">
          <div class="frame-1 wow animated fadeInLeftBig" data-wow-duration="2s">
            <img src="img/home/eativism.png" style="width: 100vw;">
          </div>
          <div class="frame-2 wow fadeInRightBig" data-wow-duration="2s">
            <img src="img/home/meativism.png" style="width: 100vw;">
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
        <div class="antioxidant">
        <img src="img/home/antioxidant.png">
        </div>
      </div>
    </div>
  </section>

  <section class="home-comofunciona-container">
    <div class="home-comofunciona-image frame-1 wow fadeInLeftBig animated" data-wow-duration="2s">
      <img src="img/home/como_funciona.png" class="mp-mobile-hidden" style="width: 100vw;"/>
    </div>
    <div class="home-comofunciona-content">
      <div class="home-comofunciona-content-inner">
        <div class="home-comofunciona-content-inner2">
          <div>
            <h3>1. elige tu objetivo</h3>
            <p class="text">Conoce  nuestros menús semanales y selecciona el que mejor se adapte a ti: control de calorías, mejora de rendimiento o ganancia muscular.</p>
          </div>
          <p class="subtext"><i>* Estamos trabajando para añadir nuevos planes y objetivos, si ninguno de ellos encaja contigo, puedes comprar nuestros platos de manera individual.</i></p>
        </div>
        <div class="home-comofunciona-content-inner2">
          <div>
            <h3>2. configura tu meal plan</h3>
            <p class="text">Rellena tus datos (edad, peso, frecuencia de deporte...) y descubre las comidas y cenas que proponemos para tu semana, basado en las calorías y nutrientes que tu cuerpo necesita. modifícalo a tu gusto y añade los platos al carrito.</p>
          </div>
          <p class="subtext"><i>* Nuestros platos han sido pensados por nutricionistas, pero nuestros planes no proporcionan asesoramiento nutricional.</i></p>
        </div>
        <div class="home-comofunciona-content-inner2">
          <div>
            <h3>3. completa tu pedido</h3>
            <p class="text">Para evitar el desperdicio de alimentos al máximo necesitamos recibir tu pedido antes del domingo. así, hacemos la compra y los preparamos de lunes a miércoles para que los recibas en casa el jueves, recién hechos ;)
              <br>¡sigue los pasos para completar tu pedido y disfruta!</p>
          </div>
          <p class="subtext"><i>* Se  mantendrán frescos en su envase en la nevera hasta el siguiente viernes.</i></p>
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
            <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p> -->
          </div>
        </div>

        <div class="col-lg-4 col-sm-6 pad-0">
          <div class="single_services_part style_2 mb-0">
            <img class="mp-mobile-hidden" src="img/home/target_{{ 0 + 1 }}.png" alt="{{ $objetivo[0]->name }}">
            <img class="mp-desktop-hidden" src="img/mealplan/targett_{{ 0 + 1 }}.png" alt="{{ $objetivo[0]->name }}">
            <p class="subtitle">{{ $objetivo[0]->nombre }}</p>
            <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p> -->
          </div>
        </div>

        <div class="col-lg-4 col-sm-6 wow fadeInRightBig pad-0" data-wow-duration="1s">
          <div class="single_services_part style_2 mb-0">
            <img class="mp-mobile-hidden" src="img/home/target_{{ 2 + 1 }}.png" alt="{{ $objetivo[2]->name }}">
            <img class="mp-desktop-hidden" src="img/mealplan/targett_{{ 2 + 1 }}.png" alt="{{ $objetivo[2]->name }}">
            <p class="subtitle negative-margin">{{ $objetivo[2]->nombre }}</p>
            <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p> -->
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-sm-12 wow fadeInDown" data-wow-delay=".4s">
          <a href="{{ route('web.menu') }}" class="mist_btn_home1 animate_btn text-uppercase d-lg-block mx-auto">Crea tu plan</a>
        </div>
      </div>
    </div>
  </section>


  <section class="home-sostenibilidad-container">
    <div class="home-sostenibilidad-image frame-1 wow fadeInRightBig animated" data-wow-duration="2s">
      <img src="img/home/sostenibilidad.png" style="width: 100vw;"/>
    </div>
    <div class="home-sostenibilidad-content">
      <p class="home-sostenibilidad-content-title mp-mobile-hidden">Desde MistMeals nos subimos al carro de la sostenibilidad con las acciones que están en nuestra mano:</p>
    </div>
    <div class="home-sostenibilidad-container-inner">
      <div class="home-sostenibilidad-container-inner2">
        <div style="width: 300px;">
          <div>
            <h3>INGREDIENTES FRESCOS Y DE PROXIMIDAD</h3>
            <p>Compramos los ingredientes tras recibir los pedidos cada semana para evitar el desperdicio y utilizamos productos de temporada y de producción local.</p>
          </div>
        </div>
        <div style="width: 300px;">
          <div>
            <h3>TRABAJAMOS POR LA INCLUSIÓN</h3>
            <p>Todos nuestros platos se preparan en la Fundación Juan XXIII, que lleva más de 50 años trabajando para la inclusión sociolaboral de personas con discapacidad intelectual.</p>
          </div>
        </div>
        <div style="width: 300px;">
          <div>
            <h3>PACKAGING ZERO PLÁSTICO</h3>
            <p>Nuestros envases son 100% compostables y el resto de elementos de nuestro packaging no contienen plástico.</p>
          </div>
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
            <a href="{{ route('web.contacto') }}" class="mist_btn_home2 animate_btn d-lg-block">Ir a la encuesta</a>
          </div>
        </div>
        <div class="col-sm-6"></div>
      </div>
    </div>
  </section>

  @include('web.layout.newsletter')

  @if(session()->has('message') AND session()->get('message')=='success')
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡PEDIDO RECIBIDO!</b></h2>
    </div>
    <div class="home-msg">
      <p>Hemos recibido tu pedido, en breves recibirás un email de confirmación ;)</p>
    </div>
  </div>
  @endif
  @if(session()->has('message')=='error' AND session()->get('message')=='error')
  <div class="home-msg-container">
    <div class="home-msg-title">
      <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
      <p>Ha habído un problema a la hora de realizar el pago, por favor intentelo de nuevo</p>
    </div>
  </div>
  @endif
  @endsection
