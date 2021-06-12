@extends('web.layout.master')
@section('content')
    <section class="position-relative contact-form-ext">
        <div class="contact-info">
            <div class="c2">
                <h2 style="font-family: 'CoreSansC65' !important;">CONTACTA CON NOSOTROS</h2>
                <div class="text-cont">
                    <p>hola@mistmeals.com</p>
                    <p>+34 669 12 90 90</p>
                    <p>Madrid</p>
                </div>
            </div>
        </div>
        <div class="label-detox-2"></div>
        <div class="contact-form">
            <div class="c3">
                <div class="contact_form_iner">
                    {!! Form::open(['method' => 'POST', 'route' => ['web.contacto.store'], 'id' => 'contacto_form', 'class' => 'contact_form'])!!}
                    <div>
                        @if (!auth()->check())
                            <div>
                                <div class="single_contact_form">
                                    <input type="text" style="background-color: black;" name="nombre" class="form-control cu_input" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div>
                                <div class="single_contact_form">
                                    <input type="email" style="background-color: black;" name="email" class="form-control cu_input" placeholder="Email" required>
                                </div>
                            </div>
                        @endif
                        <div>
                            <div class="single_contact_form">
                                <textarea name="descripcion" style="background-color: black;" class="form-control cu_input" placeholder="Mensaje" required></textarea>
                            </div>
                        </div>
                        @if (!auth()->check())
                            <div>
                                <div class="custom-control custom-checkbox single_contact_form" style="margin-bottom: 20px;">
                                    <input type="checkbox" class="custom-control-input" id="customControl" required>
                                    <label class="custom-control-label" for="customControl" style="color: #ffffff;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
                                </div>
                            </div>
                        @endif
                        <div class="contact-form-btn">
                            <div class="single_contact_form" style="width: 200px;">
                                <button type="submit" class="cu_btn btn_2 animate_btn text-uppercase text-white">Enviar</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>
    <section class="subscribe_form_section section_padding parallaxie stay-alert" style="background-color: #FF810C;">
        <div class="container">
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

@push('custom-scripts')
    <script src="https://www.google.com/recaptcha/api.js?render=6LeNaqwaAAAAAMX7jdqCJ95neE44LikadkhwQZ8L"></script>
@endpush
