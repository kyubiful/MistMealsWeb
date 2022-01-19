@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
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
          <h2>Plan Semanal</h2>
          <p class="subtitle">Elige tu tipo menú</p>
        </div>
      </div>
    </div>
    <div class="row mp-meal-container">
      <div class="col-lg-4 col-sm-6 wow fadeInDown mp-image-container" data-wow-delay="{{ sprintf('.%ss', 3 + 2) }}">
        <div class="single_services_part style_2 mb-0">
          <a href="{{ route('web.menu.step1', 2) }}">
            <img class="mp-image-desktop" src="img/home/focusonmenu.png" alt="Control de calorías">
            <img class="mp-image-mobile" src="img/mealplan/targett_2.png" alt="Control de calorías">
          </a>
          <p class="subtitle negative-margin">Control de calorías</p>
          <p style="width: 90%; margin: auto; margin-bottom: 40px; margin-top: 20px;">Di adiós a las "Dietas milagro" con las que bajas de peso rápido pero perdiendo masa muscular y agua. Este es tu plan si quieres conseguirlo de una manera saludable</p>
          <a class="mist_btn_home1" style="margin: auto; margin-top: 10px; margin-bottom: 10px;" href="{{ route('web.menu.step1', 2) }}"> Seleccionar </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 wow fadeInDown mp-image-container" data-wow-delay="{{ sprintf('.%ss', 3 + 1) }}">
        <div class="single_services_part style_2 mb-0">
          <a href="{{ route('web.menu.step1', 1) }}">
            <img class="mp-image-desktop" src="img/home/dobettermenu.png" alt="Come rico y saludable">
            <img class="mp-image-mobile" src="img/mealplan/targett_1.png" alt="Come rico y saludable">
          </a>
          <p class="subtitle">Come rico y saludable</p>
          <p style="width: 90%; margin: auto; margin-bottom: 40px; margin-top: 20px;">¿Quieres comer sano y rico pero no tienes ningún objetivo concreto además de cuidarte? Este es tu plan</p>
          <a class="mist_btn_home1" style="margin:auto; margin-top: 10px; margin-bottom: 10px;" href="{{ route('web.menu.step1', 1) }}"> Seleccionar </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 wow fadeInDown mp-image-container" data-wow-delay="{{ sprintf('.%ss', 3 + 3) }}">
        <div class="single_services_part style_2 mb-0">
          <a href="{{ route('web.menu.step1', 3) }}">
            <img class="mp-image-desktop" src="img/home/muscleupmenu.png" alt="Ganancia muscular">
            <img class="mp-image-mobile" src="img/mealplan/targett_3.png" alt="Ganancia muscular">
          </a>
          <p class="subtitle negative-margin">Ganancia muscular</p>
          <p style="width: 90%; margin: auto; margin-bottom: 40px; margin-top: 20px;">Si quieres ganar masa muscular pero hacerlo sin que tu salud se vea afectada, tenemos un plan que no solo se basa en proteínas, sino que tiene en cuenta el resto de nutrientes</p>
          <a class="mist_btn_home1" style="margin: auto; margin-top: 10px; margin-bottom: 10px;" href="{{ route('web.menu.step1', 3) }}"> Seleccionar </a>
        </div>
      </div>
    </div>
  </div>
</section>

@include('web.layout.newsletter')
@endsection
