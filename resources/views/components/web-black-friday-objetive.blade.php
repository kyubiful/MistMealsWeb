@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-menus.css')}}" />
@endpush
@endonce

<section style="margin-bottom: 100px;">
  <div>
    <div>
      <div>
        <div class="section_tittle style_2 wow fadeInUp" data-wow-delay=".5s">
          <h2>Menú Semanal</h2>
          <p class="subtitle">Elige tu menú</p>
        </div>
      </div>
    </div>
    <div class="web-home-menu-container">

      <div class="web-home-menu-content">

          <div class="wow fadeInLeftBig web-home-menu-left" data-wow-duration="1s">
            <a href="/menu/config/2"/>
              <div class="web-home-menu-all-content">
                <img loading=lazy src="img/home/focusonmenu.png" alt="{{ $objetivo[1]->name }}">
                <p class="web-home-menu-all-content-title" style="margin: auto; margin-top: 10px;">{{ $objetivo[1]->nombre }}</p>
              </div>
            </a>
          </div>

          <div class="web-home-menu-center">
            <a href="/menu/config/1">
              <div class="web-home-menu-all-content">
                <img loading=lazy src="img/home/dobettermenu.png" alt="{{ $objetivo[0]->name }}">
                <p class="web-home-menu-all-content-title" style="margin:auto; margin-top: 10px;">{{ $objetivo[0]->nombre }}</p>
              </div>
            </a>
          </div>

          <div class="wow fadeInRightBig web-home-menu-right" data-wow-duration="1s">
            <a href="/menu/config/3">
              <div class="web-home-menu-all-content">
                <img loading=lazy src="img/home/muscleupmenu.png" alt="{{ $objetivo[2]->name }}">
                <p class="web-home-menu-all-content-title" style="margin:auto; margin-top: 10px;">{{ $objetivo[2]->nombre }}</p>
              </div>
            </a>
          </div>

      </div>

    </div>
  </div>
</section>
