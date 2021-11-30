@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-menus.css')}}" />
@endpush
@endonce

<section>
  <div>
    <div>
      <div>
        <div class="section_tittle style_2 wow fadeInUp" data-wow-delay=".5s">
          <h2>Meal Plan</h2>
          <p class="subtitle">Elige tu menú</p>
        </div>
      </div>
    </div>
    <div class="web-home-menu-container">

      <div class="web-home-menu-content">

        <div class="wow fadeInLeftBig web-home-menu-left" data-wow-duration="1s">
          <div class="web-home-menu-all-content">
            <img loading=lazy src="img/home/focusonmenu.png" alt="{{ $objetivo[1]->name }}">
            <p class="web-home-menu-all-content-title">{{ $objetivo[1]->nombre }}</p>
            <p class="web-home-menu-all-content-text">Di adiós a las "Dietas milagro" con las que bajas de peso rápido pero perdiendo masa muscular y agua. Este es tu plan si quieres conseguirlo de una manera saludable</p>
          </div>
        </div>

        <div class="web-home-menu-center">
          <div class="web-home-menu-all-content">
            <img loading=lazy src="img/home/dobettermenu.png" alt="{{ $objetivo[0]->name }}">
            <p class="web-home-menu-all-content-title">{{ $objetivo[0]->nombre }}</p>
            <p class="web-home-menu-all-content-text">¿Quieres comer sano y rico pero no tienes ningún objetivo concreto además de cuidarte? Este es tu plan</p>
          </div>
        </div>

        <div class="wow fadeInRightBig web-home-menu-right" data-wow-duration="1s">
          <div class="web-home-menu-all-content">
            <img loading=lazy src="img/home/muscleupmenu.png" alt="{{ $objetivo[2]->name }}">
            <p class="web-home-menu-all-content-title">{{ $objetivo[2]->nombre }}</p>
            <p class="web-home-menu-all-content-text">Si quieres ganar masa muscular pero hacerlo sin que tu salud se vea afectada, tenemos un plan que no solo se basa en proteínas, sino que tiene en cuenta el resto de nutrientes</p>
          </div>
        </div>

      </div>

    </div>
    <div class="mt-5">
      <div class="wow fadeInDown" data-wow-delay=".4s">
        <a href="{{ route('web.menu') }}" class="mist_btn_home1 animate_btn text-uppercase d-lg-block mx-auto">Configura tu plan</a>
      </div>
    </div>
  </div>
</section>
