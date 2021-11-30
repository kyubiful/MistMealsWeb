@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-cocinamos.css')}}" />
@endpush
@endonce

<section class="web-home-cocinamos-container">
  <div class="web-home-cocinamos-btn">
    <x-global-secondary-button url="web.contacto" name="¿Eres empresa?"/>
  </div>
  <div class="wow animated fadeInLeftBig">
    <img loading="lazy" class="web-home-cocinamos-title" src="/img/home/conocenos.svg"/>
  </div>
  <div class="web-home-cocinamos-text">
    <img class="web-home-cocinamos-img" src="/img/home/mist-home-header.png"/>
    <div class="web-home-cocinamos-desktop-container">
      <div class="web-home-cocinamos-desktop-content">
        <div>
          <h2>OPCIÓN 1: YOUR MEAL PLAN</h2>
          <p>Apostamos por la salud, conoce nuestros menús semanales y selecciona el que mejor se adapte a ti: control de calorías, mejora de rendimiento o ganancia muscular.</p>
        </div>
        <div>
          <h2>OPCIÓN 2: A LA CARTA</h2>
          <p>Si pasas de planes, elige los platos que más te apetezcan.</p>
        </div>
        <div>
          <h2>PARA LA EMPRESA</h2>
          <p>Llevamos nuestros menús a la puerta de tu oficina. <span class="yellow">Disfruta de nuestros descuento para empresa; 20% para el primer pedido y 10% recurrente para el resto de pedidos.</span></p>
        </div>
      </div>
    </div>
  </div>
</section>
