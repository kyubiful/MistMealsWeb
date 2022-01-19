@extends('web.layout.master')
@section('content')
<section class="about_section padding_top padding_bottom carousel-target-{{ $objetivo->id }} meplan-carousel-mobil">
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-lg-5 pad-0">
        <div class="img_section">
          <img src="/img/home/target_{{ $objetivo->id }}.png" alt="#" class="about_img_3" data-parallax='{"x": 0, "y": -50, "rotateZ":0}'>
          <p class="text-center">{{ $objetivo->nombre }}</p>
        </div>
        <div class="meplan-img-mobile">
          <img src="/img/mealplan/targett_{{ $objetivo->id }}.png" alt="#" class="about_img_3" data-parallax='{"x": 0, "y": -50, "rotateZ":0}'>
        </div>
      </div>
      <div class="col-sm-7 col-lg-7 menu-form-step">
        <div class="about_section_content">
          <div id="carouselExampleIndicators" class="vertical carousel slide" data-ride="carousel" data-interval="false" data-wrap="false" data-touch="false">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">1</li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1">2</li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2">3</li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3">4</li>
            </ol>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="text">Atrás</span>
            </a>
            <div class="carousel-inner text-center">
              {!! Form::open(['method' => 'POST', 'route' => ['web.menu.step1.store', $objetivo->id], 'id' => 'contactForm1', 'class' => 'contact_form']) !!}

              <div class="carousel-item active">
                <h5>¡QUE EMPIECE EL CAMBIO!</h5>
                <h2>¿CUÁL ES TU SEXO?</h2>
                <div class="sex-wp">
                  @foreach($sexo as $i => $el)
                  <div class="sex-field {{ $user != null && $user->sexo_id == $i+1 ? 'active' : '' }}" data-target="#carouselExampleIndicators" data-slide-to="1" data-value="{{ $el->id }}">{{ strtoupper($el->nombre) }}</div>
                  @endforeach
                </div>
              </div>
              <div class="carousel-item">
                <h2>¿CUÁL ES TU PESO Y ALTURA?</h2>
                <div class="whdiv">
                  <div class="slide-wp">
                    <label for="slide-weight">PESO</label>
                    <span class="step1-weight-less" style="cursor: pointer;">
                      < </span>
                        <span class="range-text"><span id="range-value-weight" class="range-value">0</span> kg</span>
                        <span class="step1-weight-more" style="cursor: pointer;">></span>
                        <input type="range" class="slider-color form-range" id="slide-weight" name="peso" min="40" max="120" value={{ $user != null ? $user->peso : '80' }} step="0.1">
                  </div>
                  <div class="slide-wp mt-3">
                    <label for="slide-height">ALTURA</label>
                    <span class="step1-height-less" style="cursor: pointer;">
                      < </span>
                        <span class="range-text"><span id="range-value-height" class="range-value">0</span> m</span>
                        <span class="step1-height-more" style="cursor: pointer;">></span>
                        <input type="range" class="slider-color form-range" id="slide-height" name="altura" min="140" max="210" value="{{ $user != null ? $user->altura : '160' }}" step="1">
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <h2>¿NIVEL DE EJERCICIO?</h2>
                <div class="training-wp">
                  @foreach($ejercicio as $i => $el)
                  <div class="training-field {{ $user != null && $user->nivel_ejercicio_id == $i+1 ? 'active' : '' }}" data-target="#carouselExampleIndicators" data-slide-to="3" data-value="{{ $el->id }}">{{ strtoupper($el->nombre) }}</div>
                  @endforeach
                </div>
              </div>
              <div class="carousel-item">
                <h2>NOMBRE Y EDAD</h2>
                <div class="info-wp">
                  <div class="single_contact_form">
                    {!! Form::input('text', 'name', $user != null ? $user->name : '', ['id' => 'name', 'class' => 'form-control cu_input', 'placeholder' => 'Nombre', 'required']) !!}
                  </div>
                  <div class="single_contact_form">
                    {!! Form::number('edad', $user != null ? $user->edad : '', ['class' => 'form-control cu_input', 'placeholder' => 'Edad', 'required', 'id'=>'edad', 'min' => 18, 'max' => 80, 'step' => '1']); !!}
                  </div>
                  <div class="single_contact_form">
                    {!! Form::input('email', 'email', $user != null ? $user->email : '', ['id' => 'email', 'class' => 'form-control cu_input', 'placeholder' => 'Email', 'required']) !!}
                  </div>
                  <div class="single_contact_form mt-5">
                    <button type="submit" class="mist_btn_step1 animate_btn text-uppercase" style="background-size: cover; width: 250px;">Ver mi Plan Semanal</button>
                  </div>
                  @if (!auth()->check())
                  <div class="custom-control custom-checkbox step1-policy">
                    <input type="checkbox" class="custom-control-input" id="customContro2" required>
                    <label class="custom-control-label" for="customContro2" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
                  </div>
                  @endif
                </div>
              </div>

              {!! Form::close() !!}
            </div>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="text">Siguiente</span>
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('web.layout.newsletter')
@endsection

@push('custom-scripts')

<script type="text/javascript">
  // Sex and training
  $(document).ready(function() {

    $('.carousel').carousel({
      touch: false
    });

    $(".sex-field").on('click', function() {
      let $that = $(this);

      $(".sex-field").removeClass('active');
      $that.addClass('active');
    });

    $(".training-field").on('click', function() {
      let $that = $(this);

      $(".training-field").removeClass('active');
      $that.addClass('active');
    });

    // Slide
    let slideW = document.getElementById("slide-weight");
    let valueW = document.getElementById("range-value-weight");

    valueW.innerHTML = slideW.value;

    if (parseFloat(valueW.innerHTML) % 1 == 0) {
      valueW.innerHTML = slideW.value + '.0';
    } else {
      valueW.innerHTML = slideW.value;
    }

    slideW.oninput = function(e) {
      if ((this.value % 1) == 0) {
        valueW.innerHTML = this.value + '.0';
      } else {
        valueW.innerHTML = this.value;
      }
    }

    let slideH = document.getElementById("slide-height");
    let valueH = document.getElementById("range-value-height");
    valueH.innerHTML = slideH.value;

    slideH.oninput = function() {
      valueH.innerHTML = this.value;
    }

  });

  $('#contactForm1').submit(function(e) {

    e.preventDefault();

    let hasError = false;
    let $button = $(this).find('button[type=submit]');

    // Validates
    if (!$('.sex-field.active').length) {
      hasError = true;
      $button.html('Selecciona sexo!');
    }
    if (!$('.training-field.active').length) {
      hasError = true;
      $button.html('Selecciona nivel de entrenamiento!');
    }
    // ###

    if (!hasError) {
      var fd = new FormData($(this)[0]);
      var method = $(this).attr('method');
      var action = $(this).attr('action');

      // Aditional data
      fd.append('sexo', $('.sex-field.active').data('value'));
      fd.append('nivel_ejercicio', $('.training-field.active').data('value'));
      // ###

      // Spinner ON
      $button.prop("disabled", true);
      $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span style="font-size: 12px;">Creando plan personalizado...</span>');

      $.ajax({
        data: fd,
        method: method,
        url: action,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function(data) {
          if (data.status == 200) {
            if (data.link != undefined) {
              window.location.href = data.link;
            } else {
              $button.html(data.message);
            }
          } else if (data.status == 500) {
            $button.prop("disabled", false)
            $button.html(data.message);
          }
        },
        error: function(a, b, c) {
          // Spinner OFF
          $button.prop("disabled", false);
          $button.html("Error!");
        }
      });
    }

  });
</script>

@endpush
