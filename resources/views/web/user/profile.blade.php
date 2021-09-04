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

                        <h2 style="margin-bottom: 0px;">DIRECCIÓN DE ENVIO</h2>
                        <div class="col-lg-12 col-sm-12">
                            <div class="single_contact_form">
                                <label for="address" style="float: left;">Dirección</label>
                                <input type="text" name="address" id="address" class="form-control cu_input" placeholder="Dirección" min="18" max="80" step="1" value="{{ $user->address }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="address_number" style="float: left;">Numero</label>
                                <input type="text" name="address_number" id="address_number" class="form-control cu_input" placeholder="Número" min="18" max="80" step="1" value="{{ $user->address_number }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="address_letter" style="float: left;">Piso</label>
                                <input type="text" name="address_letter" id="address_letter" class="form-control cu_input" placeholder="Piso" min="18" max="80" step="1" value="{{ $user->address_letter }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="cp" style="float: left;">Código postal</label>
                                <input type="text" name="cp" id="cp" class="form-control cu_input" placeholder="Código postal" min="18" max="80" step="1" value="{{ $user->cp }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="region" style="float: left;">Región</label>
                                <input type="text" name="region" id="region" class="form-control cu_input" placeholder="Región" min="18" max="80" step="1" value="{{ $user->region }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="province" style="float: left;">Provincia</label>
                                <input type="text" name="province" id="province" class="form-control cu_input" placeholder="Provincia" min="18" max="80" step="1" value="{{ $user->province }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="city" style="float: left;">Ciudad</label>
                                <input type="text" name="city" id="city" class="form-control cu_input" placeholder="Ciudad" min="18" max="80" step="1" value="{{ $user->city }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <h2 style="margin-bottom: 0px;">DIRECCIÓN DE FACTURACIÓN</h2>
                        <div class="col-lg-12 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_address" style="float: left;">Dirección</label>
                                <input type="text" name="invoice_address" id="address" class="form-control cu_input" placeholder="Dirección" min="18" max="80" step="1" value="{{ $user->invoice_address }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_address_number" style="float: left;">Numero</label>
                                <input type="text" name="invoice_address_number" id="invoice_address_number" class="form-control cu_input" placeholder="Número" min="18" max="80" step="1" value="{{ $user->invoice_address_number }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_address_letter" style="float: left;">Piso</label>
                                <input type="text" name="invoice_address_letter" id="invoice_address_letter" class="form-control cu_input" placeholder="Piso" min="18" max="80" step="1" value="{{ $user->invoice_address_letter }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_cp" style="float: left;">Código postal</label>
                                <input type="text" name="invoice_cp" id="invoice_cp" class="form-control cu_input" placeholder="Código postal" min="18" max="80" step="1" value="{{ $user->invoice_cp }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_region" style="float: left;">Región</label>
                                <input type="text" name="invoice_region" id="invoice_region" class="form-control cu_input" placeholder="Región" min="18" max="80" step="1" value="{{ $user->invoice_region }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_province" style="float: left;">Provincia</label>
                                <input type="text" name="invoice_province" id="invoice_province" class="form-control cu_input" placeholder="Provincia" min="18" max="80" step="1" value="{{ $user->invoice_province }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="single_contact_form">
                                <label for="invoice_city" style="float: left;">Ciudad</label>
                                <input type="text" name="invoice_city" id="invoice_city" class="form-control cu_input" placeholder="Ciudad" min="18" max="80" step="1" value="{{ $user->invoice_city }}" style="background-color: black; color: #F9F2E1; border-color: #F9F2E1;">
                            </div>
                        </div>

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

@include('web.layout.newsletter')
@endsection