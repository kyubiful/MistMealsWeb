@extends('web.layout.master')
@section('content')
    <section class="revolution_header profile_info style_1">
        <div class="label-skin mp-mobile-hidden"></div>
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center revolution-protest-container">
                <div class="wow zoomIn" style="z-index: 2;" data-wow-delay=".3s">
                    <img class="mvw-100 revolution-image-header" src="img/revolution/header.png">
                </div>
                <div class="wow fadeInDown revolution-protest-text" data-wow-delay=".3s">
                    <h2>THE PROTEST</h2>
                    <div class="description">Hemos inventado el “Eativism”, un movimiento que cuestiona la forma en la que comemos, cómo producimos los alimentos y todas las consecuencias negativas que esto provoca en nuestro organismo y en el planeta.</div>
                    <div class="revolution_header_claim">¡NO A MUCHAS COSAS! ¡SÍ A OTRAS TANTAS! SOMOS UN MOVIMIENTO DE REACCIÓN A TODAS LAS ACEPCIONES NEGATIVAS QUE TIENE EL CONCEPTO DE DIETA Y DE COMER BIEN. UNA DIETA NO ES UN MENÚ BAJONERO.CUIDAR LO QUE COMES TIENE MUCHO QUE VER CON CUIDAR NUESTRO CUERPO, NUESTROS DERECHOS O NUESTRO PLANETA.</div>
                </div>
            </div>
        </div>
    </section>

    <section class="values">
        <div class="label-ourvalues">
            <span class="mp-mobile-hidden">NUESTROS VALORES</span>
            <span class="mp-desktop-hidden">NUESTROS</span>
            <span class="mp-desktop-hidden">VALORES</span>
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center revolution-fix">
                <div class="col-6 wow zoomIn revolution-stomach-fix" style="z-index: 2;" data-wow-delay=".3s">
                    <img class="revolution-stomach-img" src="img/revolution/stomatch.png">
                </div>
                <div class="col-6 wow fadeInDown" style="z-index: 1;" data-wow-delay=".3s">
                    <div class="row justify-content-center mp-mobile-hidden">
                        <div class="col-lg-8">
                            <div class="testimonial_section_content testimonial_slider owl-carousel">
                                <div class="single_testimonial_slider">
                                    <h2>COMPROMISO</h2>
                                    <p class="subtitle">
                                        Con el cuidado de nuestro cuerpo.
                                        Con el consumo responsable.
                                        Producimos lo que va a consumirse (bajo pedido).
                                        Con la inclusión. Nuestros pedidos los preparan en una asociación con personas con capacidades diferentes.
                                    </p>
                                </div>
                                <div class="single_testimonial_slider">
                                    <h2>CONFIANZA</h2>
                                    <p class="subtitle">
                                        La comida es la gasolina de nuestro cuerpo, solo tenemos uno y debemos cuidarlo siempre. Por eso para nosotros es tan importante ofrecer comida de calidad que transmita confianza a nuestros clientes.
                                    </p>
                                </div>
                                <div class="single_testimonial_slider">
                                    <h2>CONEXIÓN</h2>
                                    <p class="subtitle">
                                        Mistmeals transmite y genera alegría.
                                        Buscamos la conexión de el cuerpo con la mente, a través de una alimentación adaptada a lo que cada cuerpo necesita.
                                    </p>
                                </div>
                                <div class="single_testimonial_slider">
                                    <h2>TRANSFORMACIÓN</h2>
                                    <p class="subtitle">
                                        Buscamos el cambio...
                                        Hacia una nueva forma de
                                        entender el concepto “dieta”.
                                        De uno mismo hacia la
                                        comprensión y la conexión con su cuerpo.
                                        Hacia el entendimiento de cómo afecta el mundo de alimentación al planeta. Lo que comes y cómo lo comes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="valors-mobile mp-desktop-hidden">
                        <div class="valor">
                            <h2 class="valor-title">COMPROMISO</h2>
                            <p class="valor-text">
                                Con el cuidado de nuestro cuerpo.
                                Con el consumo responsable.
                                Producimos lo que va a consumirse (bajo pedido).
                                Con la inclusión. Nuestros pedidos los preparan en una asociación con personas con capacidades diferentes.
                            </p>
                        </div>
                        <div class="valor">
                            <h2 class="valor-title">CONFIANZA</h2>
                            <p class="valor-text">
                                La comida es la gasolina de nuestro cuerpo, solo tenemos uno y debemos cuidarlo siempre. Por eso para nosotros es tan importante ofrecer comida de calidad que transmita confianza a nuestros clientes.
                            </p>
                        </div>
                        <div class="valor">
                            <h2 class="valor-title">CONEXIÓN</h2>
                            <p class="valor-text">
                                Mistmeals transmite y genera alegría.
                                Buscamos la conexión de el cuerpo con la mente, a través de una alimentación adaptada a lo que cada cuerpo necesita.
                            </p>
                        </div>
                        <div class="valor">
                            <h2 class="valor-title">TRANSFORMACIÓN</h2>
                            <p class="valor-text">
                                Buscamos el cambio...
                                Hacia una nueva forma de
                                entender el concepto “dieta”.
                                De uno mismo hacia la
                                comprensión y la conexión con su cuerpo.
                                Hacia el entendimiento de cómo afecta el mundo de alimentación al planeta. Lo que comes y cómo lo comes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe_form_section section_padding parallaxie" style="background-color: #FF810C;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="section_tittle ">
                        <div>
                            <h2 class="d-inline-flex" style="color: #F9F2E1"><span>¡Mantente alerta!</span></h2>
                        </div>
                        <div>
                            <p class="d-inline-flex description">Suscríbete a nuestra newsletter y entérate de todas las noticias en relación a nuestro movimiento, que hará que cambie la forma en la que te alimentes día a día...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-12">
                    <form action="https://mistmeals.us1.list-manage.com/subscribe/post?u=bcef03a2016fd98bf6181e989&amp;id=9c3cb16e3e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                        <div class="form-row justify-content-center">
                            <div class="col-xl-3 col-sm-4 wow fadeInDown pr-0 pad-0" data-wow-delay=".5s">
                                <input type="email" class="form-control cu_input" name="EMAIL" id="mce-EMAIL" placeholder="Déjanos tu email" required>
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bcef03a2016fd98bf6181e989_9c3cb16e3e" tabindex="-1" value=""></div>
                            </div>
                            <div class="col-xl-2 col-sm-4 wow fadeInDown pl-0 pad-0" data-wow-delay=".7s">
                                <button type="submit" class="cu_btn animate_btn text-white">Suscríbete</button>
                            </div>
                        </div>
                        @if (!auth()->check())
                        <div class="form-row justify-content-center">
                            <div class="col-lg-4 mt-3 wow fadeInDown" data-wow-delay=".7s">
                                <div class="custom-control custom-checkbox single_contact_form">
                                    <input type="checkbox" class="custom-control-input" id="customControl" required>
                                    <label class="custom-control-label" for="customControl" style="color: #F9F2E1;">Acepto la <a href="{{ route('web.politicaprivacidad') }}" target="_blank" class="base_color">política de privacidad</a> del sitio web</label>
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
