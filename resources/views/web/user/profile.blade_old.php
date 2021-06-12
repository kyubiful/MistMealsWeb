@extends('web.layout.master')
@section('content')
    <section class="breadcrumb_part blog_breadcrumb_style_1 service_breadcrumb_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="breadcrumb_iner">
                    <h2>Perfil de Usuario</h2>
                    <div class="breadcrumb_iner_link">
                        <a href="/">Inicio</a>
                        <span>-</span>
                        <p>Perfil de Usuario</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_form section_bg section_padding text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="section_tittle contact_form_sec_tittle">
                        <h5 class="wow fadeInDown base_color" data-wow-delay=".3s">Perfil</h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".5s" style="color: #000000;">Datos de Usuario </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="contact_form_iner">
                        {!! Form::open(['method' => 'POST', 'route' => ['web.user.profile.edit'], 'id' => 'contactForm', 'class' => 'contact_form', 'novalidate' => 'novalidate'])!!}
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="text" name="name" id="name" class="form-control cu_input" placeholder="Nombre" value="{{ $user->name }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="text" name="surname" id="surname" class="form-control cu_input" placeholder="Apellidos" value="{{ $user->surname }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="number" name="peso" id="peso" class="form-control cu_input" placeholder="Peso" min="40" max="120" step="0.01" value="{{ $user->peso }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="number" name="altura" id="altura" class="form-control cu_input" placeholder="Altura" min="140" max="210" step="1" value="{{ $user->altura }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="number" name="edad" id="edad" class="form-control cu_input" placeholder="Edad" min="18" max="80" step="1" value="{{ $user->edad }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('nivel_ejercicio_id', $ejercicio->pluck('nombre', 'id'), $user->nivel_ejercicio_id, ['class' => 'niceSelect', 'id' => 'nivel_ejercicio_id']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('sexo_id', $sexo->pluck('nombre', 'id'), $user->sexo_id, ['class' => 'niceSelect', 'id' => 'sexo_id']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('objetivo_id', $objetivo->pluck('nombre', 'id'), $user->objetivo_id, ['class' => 'niceSelect', 'id' => 'objetivo_id']) !!}
                                    </div>
                                </div>

                                <h3 class="col-12 mt-3" style="color: #000000;">Datos Opcionales</h3>
                                <div class="sharp_border mt-3 mb-5"></div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('estado_civil_id', $estadocivil->pluck('nombre', 'id'), $user->estado_civil_id, ['class' => 'niceSelect', 'id' => 'estado_civil_id']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form subtotal_sontent">
                                        {!! Form::select('profesion_id', $profesion->pluck('nombre', 'id'), $user->profesion_id, ['class' => 'niceSelect', 'id' => 'profesion_id']) !!}
                                    </div>
                                </div>

                                <div class="sharp_border mt-3 mb-5"></div>

                                <div class="col-lg-12">
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
@endsection
