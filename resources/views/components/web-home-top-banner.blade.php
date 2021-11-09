@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-top-banner.css')}}" />
@endpush
@endonce

<section class="home-top-banner-section">
  <div>
    <a href="{{route('web.platos')}}">
      <div class="home-top-banner-content-alacarta">
        <div class="home-top-banner-content-name-box">
          <div class="banner-padding">
            <!-- Mobile content -->
            <div class="home-top-banner-content-name-box-content">
              <div class="home-top-banner-content-box-title mp-desktop-hidden">
                <span class="first">A LA CARTA</span>
                <img class="dot" src="img/home/dot.svg"/>
                <span class="second">!!!</span>
              </div>
              <div class="home-top-banner-content-box-alacarta-text mp-desktop-hidden">
                Déjate de planes, elige los platos que quieras
              </div>
            </div>
            <img class="mp-desktop-hidden" src="img/home/go.svg"/>
            <!-- Desktop content -->
            <div class="home-top-banner-content-box-title-desktop">
              <div class="home-top-banner-content-box-title-alacarta mp-mobile-hidden">
                <div class="home-top-banner-content-box-title-container">
                  <p class="first-alacarta">A LA CARTA</p>
                  <img class="dot" src="img/home/dot.svg"/>
                </div>
              </div>
              <div class="home-top-banner-right-desktop">
                <div class="home-top-banner-right-desktop-container">
                  <div>
                    <div class="home-top-banner-content-box-mealplan-text mp-mobile-hidden">
                      <p class="second">!!!</p>
                      <img class="home-top-banner-desktop-go mp-mobile-hidden" src="img/home/go.svg"/>
                    </div>
                  </div>
                  <p class="home-top-banner-right-desktop-text">
                    Déjate de planes, elige los platos que quieras
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </a>
  </div>
  <div class="home-top-banner-do-better-img-container">
    <div class="home-top-banner-do-better-img"></div>
  </div>
  <div>
    <a href="{{route('web.menu')}}">
      <div class="home-top-banner-content-mealplan">
        <div class="home-top-banner-content-name-box">
          <div class="banner-padding">

            <!-- Mobile content -->

            <div class="home-top-banner-content-name-box-content">
              <div class="home-top-banner-content-box-title mp-desktop-hidden">
                <span class="first">YOUR MEAL PLAN</span>
                <img class="dot" src="img/home/dot.svg"/>
                <span class="second">XXX</span>
              </div>
              <div class="home-top-banner-content-box-mealplan-text mp-desktop-hidden">
                Calorías diarias para lograr tu objetivo
              </div>
            </div>
            <img class="mp-desktop-hidden" src="img/home/go.svg"/>

            <!-- Desktop content -->
            <div class="home-top-banner-content-box-title-desktop">
              <div class="home-top-banner-content-box-title mp-mobile-hidden">
                <div class="home-top-banner-content-box-title-container">
                  <p class="first">YOUR MEAL PLAN</p>
                  <img class="dot" src="img/home/dot.svg"/>
                </div>
              </div>
              <div class="home-top-banner-right-desktop">
                <div class="home-top-banner-right-desktop-container">
                  <div>
                    <div class="home-top-banner-content-box-mealplan-text mp-mobile-hidden">
                      <p class="second">XXX</p>
                      <img class="home-top-banner-desktop-go mp-mobile-hidden" src="img/home/go.svg"/>
                    </div>
                  </div>
                  <p class="home-top-banner-right-desktop-text">Calorías diarias para lograr tu objetivo</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </a>
  </div>
</section>
