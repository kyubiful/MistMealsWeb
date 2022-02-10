@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/retos/landing-retos-steps.css')}}" />
@endpush
@endonce


<section class="landing-retos-steps-container">
  <h3 class="step-text">ES MUY SENCILLO PARTICIPAR:</h3>
  <div class="landing-retos-container">
    <div class="landing-retos-steps-content">
      <div class="landing-retos-steps-content-text">
        <p class="number wow fadeIn">1</p>
        <p class="step-text">Regístrate</p>
      </div>
      <div class="landing-retos-steps-content-text">
        <p class="number wow fadeIn">2</p>
        <p class="step-text">Crea tu plan semanal de comida</p>
      </div>
      <div class="landing-retos-steps-content-text">
        <p class="number wow fadeIn">3</p>
        <p class="step-text">Recibe tu cupón de descuento para tu próximo pedido</p>
      </div>
    </div>
  </div>
  <div style="display: flex; justify-content: center; margin-bottom: 40px; margin-top: -20px;">
    <x-global-primary-button type="link" url="/menu" name="Apúntame al reto"/>
  </div>
</section>
  <img class="landing-retos-steps-bottom-img" src="/img/blackfriday/Plato1.png"/>
  <img class="landing-retos-steps-bottom-img-2" src="/img/blackfriday/Plato2.png"/>

