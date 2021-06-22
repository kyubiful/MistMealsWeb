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
          <div id="carouselExampleIndicators" class="vertical carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
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
                  <div class="sex-field {{ $user != null && $user->sexo_id == $i+1 ? 'active' : '' }}" data-value="{{ $el->id }}">{{ strtoupper($el->nombre) }}</div>
                  @endforeach
                </div>
              </div>
              <div class="carousel-item">
                <h2>¿CUÁL ES TU PESO Y ALTURA?</h2>
                <div class="whdiv">
                <div class="slide-wp">
                  <label for="slide-weight">PESO</label>
                  <span class="step1-weight-less" style="cursor: pointer;"><</span>
                  <span class="range-text"><span id="range-value-weight" class="range-value">0</span> kg</span>
                  <span class="step1-weight-more" style="cursor: pointer;">></span>
                  <input type="range" class="slider-color form-range" id="slide-weight" name="peso" min="40" max="120" value={{ $user != null ? $user->peso : '80' }} step="0.1">
                </div>
                <div class="slide-wp mt-3">
                  <label for="slide-height">ALTURA</label>
                  <span class="step1-height-less" style="cursor: pointer;"><</span>
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
                  <div class="training-field {{ $user != null && $user->nivel_ejercicio_id == $i+1 ? 'active' : '' }}" data-value="{{ $el->id }}">{{ strtoupper($el->nombre) }}</div>
                  @endforeach
                </div>
              </div>
              <div class="carousel-item">
                <h2>NOMBRE Y EDAD</h2>
                <div class="info-wp">
                  <div class="single_contact_form">
                    {!! Form::input('text', 'name', $user != null ? $user->name : '', ['id' => 'name', 'class' => 'form-control cu_input', 'placeholder' => 'Nombre']) !!}
                  </div>
                  <div class="single_contact_form">
                    {!! Form::number('edad', $user != null ? $user->edad : '', ['class' => 'form-control cu_input', 'placeholder' => 'Edad', 'required', 'id'=>'edad', 'min' => 18, 'max' => 80, 'step' => '1']); !!}
                  </div>
                  <div class="single_contact_form mt-5">
                    <button type="submit" class="mist_btn animate_btn text-uppercase">Ver mi Meal Plan</button>
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
          <div class="form-row justify-content-center">
            <div class="col-lg-4 mt-3 wow fadeInDown" data-wow-delay=".7s">
              @if (!auth()->check())
              <div class="custom-control custom-checkbox single_contact_form">
                <input type="checkbox" class="custom-control-input" id="customControl" required>
                <label class="custom-control-label" for="customControl" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
              </div>
              @endif
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('custom-scripts')

<script type="text/javascript">
  // Sex and training
  $(document).ready(function() {

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

  });

  // Slide
  let slideW = document.getElementById("slide-weight");
  let valueW = document.getElementById("range-value-weight");
  valueW.innerHTML = slideW.value;

  slideW.oninput = function() {
    valueW.innerHTML = this.value;
  }

  let slideH = document.getElementById("slide-height");
  let valueH = document.getElementById("range-value-height");
  valueH.innerHTML = slideH.value;

  slideH.oninput = function() {
    valueH.innerHTML = this.value;
  }

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
      $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

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
