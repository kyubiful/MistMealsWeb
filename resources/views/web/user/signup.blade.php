@extends('web.layout.master')
@section('content')
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
                                <button type="submit" class="mist_btn animate_btn">Crear cuenta</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe_form_section section_padding parallaxie stay-alert" style="background-color: #FF810C;">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="section_tittle ">
                        <div>
                            <h2 class="d-inline-flex" style="color: #F9F2E1"><span>¡Mantente alerta!</span></h2>
                        </div>
                        <div>
                            <p class="d-inline-flex description" style="width: 674px;margin: 0;">Suscríbete a nuestra newsletter y entérate de todas las noticias en relación a nuestro movimiento, que hará que cambie la forma en la que te alimentes día a día...</p>
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

@push('custom-scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $("#confirm-password").on('keyup', function () {
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
