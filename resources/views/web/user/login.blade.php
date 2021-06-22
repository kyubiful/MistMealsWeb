@extends('web.layout.master')
@section('content')
    <section class="loginform subscribe_form_section login-form-container-ext">
        <div class="container">
            <div class="row justify-content-center align-items-center login-form-container">
                <div class="col-sm-6 wow zoomIn overflow-hidden login-img-container" data-wow-delay=".3s">
                    <img class="login-form-img" src="/img/home/mist-home-header.png">
                </div>
                <div class="col-sm-6 wow fadeIn" style="z-index: 1;" data-wow-delay=".3s">
                    <div class="section_tittle ">
                        <h2 class="d-inline-flex" style="color: #F9F2E1"><span>LOGIN</span></h2>
                    </div>

                    {!! Form::open(['method' => 'POST', 'route' => ['web.user.login'], 'id' => 'user-login'])!!}
                    <div class="row">
                        <div class="col-12">
                            <div class="single_contact_form">
                                <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Dirección de correo" required/>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="single_contact_form">
                                <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña" required/>
                            </div>
                        </div>
                        <div class="col-12 text-right mt-3">
                            <a class="recoverpass" href="#">He olvidado mi contraseña</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="single_contact_form text-right login-btn">
                                <button type="submit" class="mist_btn animate_btn">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 login-register">
                            <p>¿No tienes cuenta? <a href="{{ route('web.user.signup') }}" class="base_color">Sign up</a></p>
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
