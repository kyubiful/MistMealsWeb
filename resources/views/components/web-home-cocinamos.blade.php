@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-cocinamos.css')}}" />
@endpush
@endonce

<section class="web-home-cocinamos-container">
  <div class="web-home-cocinamos-btn">
    <x-global-secondary-button url="web.home" name="¿Eres empresa?"/>
  </div>
  <div class="web-home-cocinamos-text">
    <img class="web-home-cocinamos-img" src="/img/home/mist-home-header.png"/>
    <div class="web-home-cocinamos-desktop-container">
      <h1>COCINAMOS PARA TI</h1>
      <div class="web-home-cocinamos-desktop-content">
        <div>
          <h2>PREPARAMOS PLANES SEGÚN TUS OBJETIVO</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eros, fermentum aenean nibh vulputate tortor enim leo. Euismod et platea.</p>
        </div>
        <div>
          <h2>LABORAMOS PLATOS SALUDABLES</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eros, fermentum aenean nibh vulputate tortor enim leo. Euismod et platea.</p>
        </div>
        <div>
          <h2>PARA LA EMPRESA</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Eros, fermentum aenean nibh vulputate tortor enim leo. Euismod et platea.</p>
        </div>
      </div>
    </div>
  </div>
</section>
