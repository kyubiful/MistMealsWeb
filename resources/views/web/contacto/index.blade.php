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
                {!! Form::open(['method' => 'POST', 'route' => ['web.contacto.send'], 'id' => 'contacto_form', 'class' => 'contact_form'])!!}
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
@include('web.layout.newsletter')
@endsection

@if(session()->has('message'))
<div class="home-msg-container">
    @if(!session()->has('error'))
    <div class="home-msg-title">
        <h2><b>¡GRACIAS!</b></h2>
    </div>
    <div class="home-msg">
        <p>{{ session()->get('message')}}</p>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="home-msg-title">
        <h2><b>¡ERROR!</b></h2>
    </div>
    <div class="home-msg">
        <p>{{ session()->get('message')}}</p>
    </div>
    @endif
</div>
@endif
@push('custom-scripts')
<script src="https://www.google.com/recaptcha/api.js?render=6LeNaqwaAAAAAMX7jdqCJ95neE44LikadkhwQZ8L"></script>
@endpush