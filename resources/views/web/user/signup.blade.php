@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
<section class="signupform subscribe_form_section profile_info style_1" style="background-color: #000000; height: 900px; padding-top: 80px;">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 wow zoomIn overflow-hidden signup-img" style="z-index: 1;" data-wow-delay=".3s">
                <img src="/img/home/mist-home-header.png">
            </div>
            <div class="sign-up-bg col-sm-6 wow fadeIn" style="z-index: 1;" data-wow-delay=".3s">
                <div class="section_tittle ">
                    <h2><span>SIGN UP</span></h2>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['web.user.signup.store'], 'id' => 'contactForm', 'class' => 'contact_form'])!!}
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="single_contact_form">
                            <input type="text" name="name" id="name" class="form-control cu_input" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="single_contact_form">
                            <input type="text" name="surname" id="surname" class="form-control cu_input" placeholder="Apellidos" required>
                        </div>
                    </div>

                    <div class="col-lg-12 col-sm-12">
                        <div class="single_contact_form">
                            <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="single_contact_form">
                            <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="single_contact_form">
                            <input type="password" name="confirm-password" id="confirm-password" class="form-control cu_input" placeholder="Confirmación contraseña" required>
                            <label for="number" id="check-password" class="hidden mt-1"></label>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="custom-control custom-checkbox single_contact_form">
                            <input type="checkbox" class="custom-control-input" id="customControl" required>
                            <label class="custom-control-label" for="customControl">Acepto las <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">políticas de privacidad</a></label>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="single_contact_form signup-btn">
                            <button type="submit" class="mist_btn_signup animate_btn">Crear cuenta</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@include('web.layout.newsletter')
@endsection

@push('custom-scripts')

<script type="text/javascript">
    $(document).ready(function() {
        $("#confirm-password").on('keyup', function() {
            var password = $("#password").val();
            var confirmPassword = $("#confirm-password").val();

            if (password != confirmPassword)
                $("#check-password").html("Contraseñas diferentes!").css("color", "#FF0033").show();
            else
                $("#check-password").html("Contraseña correcta!").css("color", "#009167").show();
        });
    });
</script>

@endpush
