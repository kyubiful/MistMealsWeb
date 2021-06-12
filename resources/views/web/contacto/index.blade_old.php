@extends('web.layout.master')
@section('content')
    <section class="breadcrumb_part blog_breadcrumb_style_1 service_breadcrumb_2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="breadcrumb_iner">
                    <h2>Sugerencias</h2>
                    <div class="breadcrumb_iner_link">
                        <a href="/">Inicio</a>
                        <span>-</span>
                        <p>Contacta con nosotros</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_info_section section_padding ft_font">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <h5 class="wow fadeInUp base_color" data-wow-delay=".3s">Nuestros datos</h5>
                        <h2 class="wow fadeInUp" data-wow-delay=".5s">Contacto</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single_contact_info">
                        {{--<img src="img/icon/map.png" alt="#">--}}
                        <h4 style="color: #F9F2E1;">Localización</h4>
                        <p style="color: #F9F2E1;">Madrid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single_contact_info">
                        {{--<img src="img/icon/phn.png" alt="#">--}}
                        <h4 style="color: #F9F2E1;">Número de contacto</h4>
                        <p><a href="tel:+34669129090" style="color: #F9F2E1;"> +34 669 12 90 90</a></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single_contact_info">
                        {{--<img src="img/icon/mail.png" alt="#">--}}
                        <h4 style="color: #F9F2E1;">Correo electrónico</h4>
                        <p><a href="mailto:hola@mistmeals.com" target="_blank" style="color: #F9F2E1;"> hola@mistmeals.com</a></p>
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
                        <h5 class="wow fadeInDown base_color" data-wow-delay=".3s">Envíanos tu mensaje</h5>
                        <h2 class="wow fadeInDown" data-wow-delay=".5s" style="color: #000000;">Sugerencias</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="contact_form_iner">
                        {!! Form::open(['method' => 'POST', 'route' => ['web.contacto.store'], 'id' => 'contacto_form', 'class' => 'contact_form'])!!}
                        <div class="row">
                            @if (!auth()->check())
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="text" name="nombre" class="form-control cu_input" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="single_contact_form">
                                        <input type="email" name="email" class="form-control cu_input" placeholder="Email" required>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="single_contact_form">
                                    <textarea name="descripcion" class="form-control cu_input" placeholder="Mensaje" required></textarea>
                                </div>
                            </div>
                            @if (!auth()->check())
                                <div class="col-lg-12 mb-3">
                                    <div class="custom-control custom-checkbox single_contact_form">
                                        <input type="checkbox" class="custom-control-input" id="customControl" required>
                                        <label class="custom-control-label" for="customControl" style="color: #000000;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="single_contact_form">
                                    <button type="submit" class="cu_btn btn_2 animate_btn text-uppercase text-white">Enviar</button>
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

@push('custom-scripts')
    <script src="https://www.google.com/recaptcha/api.js?render=6LeNaqwaAAAAAMX7jdqCJ95neE44LikadkhwQZ8L"></script>
@endpush