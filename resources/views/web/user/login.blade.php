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
                            <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Dirección de correo" required />
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="single_contact_form">
                            <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña" required />
                        </div>
                    </div>
                    <div class="col-12 text-right mt-3">
                        <a class="recoverpass" href="{{ route('password.request') }}">He olvidado mi contraseña</a>
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

@include('web.layout.newsletter')
@endsection