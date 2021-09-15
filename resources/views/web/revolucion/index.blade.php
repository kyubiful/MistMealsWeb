@extends('web.layout.master')
@section('content')
<div class="preloader-wrapper" id="preloader-wrapper">
  <div class="percentage-wrapper">
    <div class="loadbar-percent"></div>
    <div id="percent"></div>
  </div>
</div>
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
                <div class="revolution_header_claim">¡NO A MUCHAS COSAS! ¡SÍ A OTRAS TANTAS! SOMOS UN MOVIMIENTO DE REACCIÓN A TODAS LAS ACEPCIONES NEGATIVAS QUE TIENE EL CONCEPTO DE DIETA Y DE COMER BIEN. UNA DIETA NO ES UN MENÚ BAJONERO. CUIDAR LO QUE COMES TIENE MUCHO QUE VER CON CUIDAR NUESTRO CUERPO, NUESTROS DERECHOS O NUESTRO PLANETA.</div>
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
                                    Hacia el entendimiento de cómo afecta el mundo de alimentación al planeta. Qué comes y cómo lo comes.
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
                            Hacia el entendimiento de cómo afecta el mundo de alimentación al planeta. Qué comes y cómo lo comes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('web.layout.newsletter')

@endsection
