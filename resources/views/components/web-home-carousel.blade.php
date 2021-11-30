<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <section>
        <div class="embed-responsive embed-responsive-16by9" style="margin-top: 100px;">
          <img loading=lazy src="img/icon/volume-off.png" alt="" class="home-volume-off">
          <img loading=lazy src="img/icon/volume-on.png" alt="" class="home-volume-on">
          <video class="embed-responsive-item" loop></video>
        </div>
      </section>
    </div>
    <div class="carousel-item">
      <section class="profile_info style_1 home-make-diet-container" style="background-color: #000000; padding-top: 80px;">
        <div class="container-fluid">
          <div class="row justify-content-center align-items-center home-make-flex">
            <div class="wow zoomIn" style="z-index: 2;" data-wow-delay=".3s">
              <img loading=lazy class="mvw-100 home-mist-img" src="img/home/mist-home-header.png">
            </div>
            <div class="wow fadeIn" style="z-index: 3;" data-wow-delay=".3s">
              <img loading=lazy class="mvw-100 home-make-diet-img" src="img/home/mist-home-header-claim.png">
              <div class="description home-description-text">Hemos inventado el “Eativism”, un movimiento que cuestiona la forma en la que comemos.</div>
              <a href="{{ route('web.menu') }}" class="mist_btn animate_btn d-lg-block home-make-diet-btn">Crea tu plan de comidas</a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
