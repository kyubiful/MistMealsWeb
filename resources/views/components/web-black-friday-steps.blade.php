@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/blackfriday/web-black-friday-steps.css')}}" />
@endpush
@endonce

  <img class="web-blackfriday-steps-top-img" src="/img/blackfriday/Plato2.png"/>
<section class="web-blackfriday-steps-container">
  <h3>¿QUIERES COMENZAR A COMER SALUDABLE?</h3>
  <div class="web-blackfriday-steps-content">
    <div class="web-blackfriday-steps-content-text">
      <p class="number wow fadeIn">1</p>
      <p class="step-text">Elige tu objetivo de alimentación</p>
    </div>
    <div class="web-blackfriday-steps-content-text">
      <p class="number wow fadeIn">2</p>
      <p class="step-text">Elige al menos 5 platos de tu plan semanal</p>
    </div>
    <div class="web-blackfriday-steps-content-text">
      <p class="number wow fadeIn">3</p>
      <p class="step-text">Recibelos en tu domicilio</p>
    </div>
  </div>
  <div style="display: flex; justify-content: center; margin-bottom: 40px;">
    <x-global-primary-button type="link" url="/" name="Comencemos"/>
  </div>
</section>
  <img class="web-blackfriday-steps-bottom-img" src="/img/blackfriday/Plato1.png"/>

