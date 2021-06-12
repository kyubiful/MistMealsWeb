@extends('web.layout.master')
@section('content')

    <section class="breadcrumb_part blog_breadcrumb_style_1 service_breadcrumb_2 profile-submenu" style="background-color: #009167; margin-top: 92px; height: 213px;">
        <div class="container">
            <div class="row justify-content-start">
                <div class="breadcrumb_iner">
                    <h2 class="hi-name">Hola {{$user->name}}</h2>
                    <div class="breadcrumb_iner_link justify-content-start" style="margin-top: 20px;">
                        <a href="{{ route('web.user.profile') }}" style="text-transform: uppercase; font-family: CoreSansC35 !important; font-size: 18px; border-bottom: 1px solid;">Mi perfil</a>
                        <span>-</span>
                        <a style="text-transform: uppercase; font-family: CoreSansC35 !important; font-size: 18px;">Pedidos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_form section_bg section_padding text-center" style="background-color: black;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="contact_form_iner">
                        {!! Form::open(['method' => 'POST', 'route' => ['web.user.profile.edit'], 'id' => 'contactForm', 'class' => 'contact_form', 'novalidate' => 'novalidate'])!!}
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="name" style="float: left;">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control cu_input" placeholder="Nombre" value="{{ $user->name }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="surname" style="float: left;">Apellidos</label>
                                        <input type="text" name="surname" id="surname" class="form-control cu_input" placeholder="Apellidos" value="{{ $user->surname }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="email" style="float: left;">Email</label>
                                        <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Email" value="{{ $user->email }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="password" style="float: left;">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        <label for="sexo" style="float: left;">Sexo</label>
                                        {!! Form::select('sexo_id', $sexo->pluck('nombre', 'id'), $user->sexo_id, ['class' => 'niceSelect', 'id' => 'sexo_id']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="peso" style="float: left;">Peso</label>
                                        <input type="number" name="peso" id="peso" class="form-control cu_input" placeholder="Peso" min="40" max="120" step="0.01" value="{{ $user->peso }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="altura" style="float: left;">Altura</label>
                                        <input type="number" name="altura" id="altura" class="form-control cu_input" placeholder="Altura" min="140" max="210" step="1" value="{{ $user->altura }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-12">
                                    <div class="single_contact_form">
                                        <label for="edad" style="float: left;">Edad</label>
                                        <input type="number" name="edad" id="edad" class="form-control cu_input" placeholder="Edad" min="18" max="80" step="1" value="{{ $user->edad }}" required style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                                    </div>
                                </div>

                                <!-- <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent"   >
                                        {!! Form::select('nivel_ejercicio_id', $ejercicio->pluck('nombre', 'id'), $user->nivel_ejercicio_id, ['class' => 'niceSelect', 'id' => 'nivel_ejercicio_id']) !!}
                                    </div>
                                </div> -->
                                
                                <!-- <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('objetivo_id', $objetivo->pluck('nombre', 'id'), $user->objetivo_id, ['class' => 'niceSelect', 'id' => 'objetivo_id']) !!}
                                    </div>
                                </div> -->

                                <!-- <h3 class="col-12 mt-3" style="color: #fff;">Datos Opcionales</h3>
                                <div class="sharp_border mt-3 mb-5"></div> -->

                                <!-- <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('estado_civil_id', $estadocivil->pluck('nombre', 'id'), $user->estado_civil_id, ['class' => 'niceSelect', 'id' => 'estado_civil_id']) !!}
                                    </div>
                                </div> -->

                                <!-- <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('profesion_id', $profesion->pluck('nombre', 'id'), $user->profesion_id, ['class' => 'niceSelect', 'id' => 'profesion_id']) !!}
                                    </div>
                                </div> -->

                                <!-- <div class="sharp_border mt-3 mb-5"></div> -->

                                <div class="col-lg-3" style="margin-top: 100px;">
                                    <div class="single_contact_form">
                                        <button type="submit" class="cu_btn btn_2 animate_btn text-white text-uppercase">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
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
