(function ($) {
  "use strict";

  //sticky menu
  $(window).on("scroll", function () {
    var window_top = $(window).scrollTop() + 0;
    if (window_top > 0) {
      $(".classic_header, .fixed_menu ").addClass(
        "menu_fixed animated fadeInDown"
      );
    } else {
      $(".classic_header, .fixed_menu").removeClass(
        "menu_fixed animated fadeInDown"
      );
    }
  });

  //offerbook modal js
  var offerbookmodal = document.getElementById("offerbookmodal");
  if (offerbookmodal) {
    setTimeout(function () {
      $(document).ready(function () {
        var key1 = "hadoffer",
          hadoffer = localStorage.getItem(key1);
        if (!hadoffer) {
          $("#offerbookmodal").modal("show");
        }
        $("#offerbookmodal").on("shown.bs.modal", function () {
          localStorage.setItem(key1, true);
        });
      });
    }, 10000);
  }

  //newslettermodal modal js
  var newslettermodal = document.getElementById("newslettermodal");
  if (newslettermodal) {
    setTimeout(function () {
      $(document).ready(function () {
        var key = "hadModal",
          hadModal = localStorage.getItem(key);
        if (!hadModal) {
          $("#newslettermodal").modal("show");
        }
        $("#newslettermodal").on("shown.bs.modal", function () {
          localStorage.setItem(key, true);
        });
      });
    }, 10000);
  }

  //menu icon
  $(".close_icon").on("click", function () {
    $(".body_wrapper").removeClass("promotion").find(".promo_banner").css({
      top: "-70px",
      WebkitTransition: "all 0.3s ease-in-out",
      MozTransition: "all 0.3s ease-in-out",
      MsTransition: "all 0.3s ease-in-out",
      OTransition: "all 0.3s ease-in-out",
      transition: "all 0.3s ease-in-out",
    });
  });

  $(document).ready(function () {
    // Check if user saw the modal
    var key = "hadModal",
      hadModal = localStorage.getItem(key);

    // Show the modal only if new user
    if (!hadModal) {
      $("#eBookModal").modal("show");
    }

    // If modal is displayed, store that in localStorage
    $("#eBookModal").on("shown.bs.modal", function () {
      localStorage.setItem(key, true);
    });
  });

  $(".cs_dropwown").on(function () {
    $(this)
      .parent(".cs_dropwown")
      .children(".cs_dropdown_item")
      .slideToggle("100");
    $(this).find(".cs_dropdown_item").addClass("d-block");
  });

  //animated tittle
  var heading = $(".typed");
  if (heading.length) {
    heading.typed({
      strings: ["Beautiful"],
      stringsElement: null,
      typeSpeed: 100,
      startDelay: 500,
      backSpeed: 100,
      backDelay: 500,
      loop: true,
      showCursor: true,
      cursorChar: "|",
      attr: null,
      contentType: "html",
    });
  }

  //video popup
  var video_popup = $(".video_popup");
  if (video_popup.length > 0) {
    video_popup.magnificPopup({
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });
  }

  //count up
  var counter = $(".counter");
  if (counter.length > 0) {
    counter.counterUp({
      time: 2000,
    });
  }

  //wow js
  var wow = new WOW({
    animateClass: "animated",
    offset: 100,
    mobile: false,
    duration: 1000,
  });
  wow.init();

  //vartical slider banner 14 js
  var varticalSliderBanner = document.getElementById("vartical_slider_banner");
  if (varticalSliderBanner) {
    var swiper = new Swiper(".vartical_slider_banner", {
      direction: "vertical",
      slidesPerView: 1,
      mousewheel: true,
      allowTouchMove: 1,
      loop: true,
      speed: 1000,
      autoplay: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper_next",
        prevEl: ".swiper_prev",
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  //vartical slider banner 9 js
  var full_height_dark_slider = document.getElementById(
    "full_height_dark_slider"
  );
  if (full_height_dark_slider) {
    var swiper = new Swiper(".full_height_dark_slider", {
      direction: "vertical",
      slidesPerView: 1,
      mousewheel: true,
      loop: true,
      speed: 800,
      autoplay: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }
  //vartical slider banner 10 js
  var full_height_slider = document.getElementById("full_height_slider");
  if (full_height_slider) {
    var swiper = new Swiper(".full_height_slider", {
      direction: "vertical",
      slidesPerView: 1,
      mousewheel: true,
      loop: true,
      speed: 800,
      centeredSlides: true,
      autoplay: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  // swiper parallax Slider
  var vartical_parallax_banner = document.getElementById(
    "vartical_parallax_banner"
  );
  if (vartical_parallax_banner) {
    let mainSliderSelector = ".main-slider",
      interleaveOffset = 0.5;
    let mainSliderOptions = {
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 3000,
      },
      loopAdditionalSlides: 10,
      watchSlidesProgress: true,
      mousewheel: true,
      navigation: {
        nextEl: ".swiper_prev",
        prevEl: ".swiper_next",
      },
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      on: {
        init: function () {
          this.autoplay.stop();
        },
        progress: function () {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            let slideProgress = swiper.slides[i].progress,
              innerOffset = swiper.width * interleaveOffset,
              innerTranslate = slideProgress * innerOffset;
            swiper.slides[i].querySelector(".slide_bg_img").style.transform =
              "translate3d(" + innerTranslate + "px, 0, 0)";
          }
        },
        touchStart: function () {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = "";
          }
        },
        setTransition: function (speed) {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            swiper.slides[i].style.transition = speed + "ms";
            swiper.slides[i].querySelector(".slide_bg_img").style.transition =
              speed + "ms";
          }
        },
      },
    };
    let mainSlider = new Swiper(mainSliderSelector, mainSliderOptions);
  }

  var center_portfolio_tittle = document.getElementById(
    "center_portfolio_tittle"
  );
  if (center_portfolio_tittle) {
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 2,
      centeredSlides: true,
      loop: true,
      autoplay: true,
      speed: 1000,
      mousewheel: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      freeModeSticky: true,
      navigation: {
        nextEl: ".swiper_next",
        prevEl: ".swiper_prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 1,
          freeMode: false,
        },
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  var center_portfolio_img = document.getElementById("center_portfolio_img");
  if (center_portfolio_img) {
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 2,
      centeredSlides: true,
      loop: true,
      autoplay: true,
      speed: 1000,
      mousewheel: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: true,
      },
      navigation: {
        nextEl: ".swiper_next",
        prevEl: ".swiper_prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 1,
          freeMode: false,
        },
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  //home page 5 slider
  var slider_full_hight = document.getElementById(
    "portfolio_slider_full_hight"
  );
  if (slider_full_hight) {
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 3,
      loop: true,
      autoplay: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      mousewheel: true,
      speed: 600,
      breakpoints: {
        576: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  //home page 11 slider
  var portfolio_slider_style = document.getElementById(
    "portfolio_slider_style"
  );
  if (portfolio_slider_style) {
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 3,
      loop: true,
      autoplay: true,
      mousewheel: true,
      spaceBetween: 10,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      speed: 600,
      breakpoints: {
        576: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
    $(".swiper-slide").on("mouseover", function () {
      swiper.autoplay.stop();
    });

    $(".swiper-slide").on("mouseout", function () {
      swiper.autoplay.start();
    });
  }

  //banner slider js
  var bannerSlider = $(".banner_carousel_active");
  if (bannerSlider.length) {
    bannerSlider.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      navText: ["<i class='arrow_left'></i>", "<i class='arrow_right'></i>"],
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      smartSpeed: 500,
      animateOut: "slideOutLeft",
      animateIn: "slideInRight",
      rtl: false,
      responsive: {
        0: {
          nav: false,
        },
        768: {
          nav: true,
        },
      },
    });
  }

  //testimonial slider js
  var testimonialSlider = $(".testimonial_slider");
  if (testimonialSlider.length) {
    testimonialSlider.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      navText: [
        "<img src='img/icon/left_icon.svg' alt='#'>",
        "<img src='img/icon/right_icon.svg' alt='#'>",
      ],
      dots: false,
      autoplay: true,
      autoplayTimeout: 10000,
      autoplayHoverPause: true,
      smartSpeed: 500,
      margin: 20,
      rtl: false,
      responsive: {
        0: {
          nav: false,
        },
        768: {
          nav: true,
        },
      },
    });
  }

  //testimonial slider js
  var testimonial_slider_1 = $(".testimonial_slider_1");
  if (testimonial_slider_1.length) {
    testimonial_slider_1.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      navText: [
        "<i class='flaticon-left'></i>",
        "<i class='flaticon-right'></i>",
      ],
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      smartSpeed: 500,
      margin: 20,
      rtl: false,
      responsive: {
        0: {
          nav: false,
        },
        768: {
          nav: true,
        },
      },
    });
  }

  //testimonial slider js
  var testimonial_slider_style_2 = $(".testimonial_slider_style_2");
  if (testimonial_slider_style_2.length) {
    testimonial_slider_style_2.owlCarousel({
      items: 2,
      loop: true,
      nav: true,
      navText: [
        "<i class='flaticon-left'></i>",
        "<i class='flaticon-right'></i>",
      ],
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      smartSpeed: 500,
      rtl: false,
      responsive: {
        0: {
          nav: false,
          items: 1,
        },
        768: {
          nav: true,
          items: 2,
        },
      },
    });
  }

  //banner slider js
  var logocarousel = $(".logo_carousel");
  if (logocarousel.length) {
    logocarousel.owlCarousel({
      items: 5,
      loop: true,
      nav: false,
      margin: 20,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      smartSpeed: 500,
      rtl: false,
      responsive: {
        0: {
          items: 2,
        },
        768: {
          items: 4,
        },
        991: {
          items: 5,
        },
      },
    });
  }
  //related product slider js
  var related_product_slider = $(".related_product_slider");
  if (related_product_slider.length) {
    related_product_slider.owlCarousel({
      items: 3,
      loop: true,
      nav: true,
      margin: 30,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      smartSpeed: 500,
      rtl: false,
      navText: [
        "<i class='flaticon-left'></i>",
        "<i class='flaticon-right'></i>",
      ],
      responsive: {
        0: {
          items: 1,
          nav: false,
        },
        768: {
          items: 2,
          nav: false,
        },
        991: {
          items: 3,
          nav: false,
        },
        1200: {
          items: 3,
          nav: true,
        },
      },
    });
  }

  //banner slider js
  var portfolioSlider = $(".portfolio_slider");
  if (portfolioSlider.length) {
    portfolioSlider.owlCarousel({
      items: 1,
      center: true,
      loop: true,
    });
  }

  //portfolio slider part js
  $(document).ready(function () {
    var owl = $(".portfolio_slider_part");
    if (owl.length) {
      owl.owlCarousel({
        center: true,
        nav: true,
        items: 3,
        loop: true,
        autoplayHoverPause: true,
        dots: false,
        nav: false,
        rtl: false,
        margin: 10,
        responsive: {
          0: {
            items: 1,
          },
          768: {
            items: 2,
          },
          991: {
            items: 3,
          },
        },
      });
    }
    owl.on("mousewheel", ".owl-stage", function (e) {
      if (e.originalEvent.wheelDelta > 0) {
        owl.trigger("next.owl");
      } else {
        owl.trigger("prev.owl");
      }
      e.preventDefault();
    });
  });

  //portfolio slider home page 2
  $(document).ready(function () {
    var portfolio_container = $(".portfolio_slider_container");
    if (portfolio_container.length) {
      portfolio_container.owlCarousel({
        center: true,
        items: 2,
        loop: true,
        autoplayHoverPause: true,
        dots: false,
        autoplay: false,
        rtl: false,
        nav: false,
        smartSpeed: 2000,
        responsive: {
          0: {
            items: 1,
          },
          768: {
            tems: 1,
          },
        },
      });
    }

    portfolio_container.on("mousewheel", ".owl-stage", function (e) {
      if (e.originalEvent.wheelDelta > 0) {
        portfolio_container.trigger("next.owl");
      } else {
        portfolio_container.trigger("prev.owl");
      }
      e.preventDefault();
    });
  });

  //progressbar js
  document.addEventListener("DOMContentLoaded", function () {
    var progressBar = document.querySelectorAll(".progress-bar");
    var time = 1500;
    progressBar.forEach(function (i) {
      let label = i.children[0];
      let line = i.children[1];
      let count = 0;
      let dataCount = label.getAttribute("data-count");
      let lineCount = line.children[0];

      let runTime = time / dataCount;

      let animationLineCount = setInterval(function () {
        if (count < dataCount) {
          count++;
          label.innerHTML = "( " + count + "% )";
          lineCount.style.width = count + "%";
        }
      }, runTime);
    });
  });

  //range slider
  var price_slider = $("#slider-range_2");
  if (price_slider.length) {
    price_slider.slider({
      range: true,
      min: 130,
      max: 500,
      values: [130, 250],
      slide: function (event, ui) {
        $("#amount_2").val("$" + ui.values[0] + " - $" + ui.values[1]);
      },
    });
    $("#amount_2").val(
      "$" +
        $("#slider-range_2").slider("values", 0) +
        " - $" +
        $("#slider-range_2").slider("values", 1)
    );
  }

  if ($("#gallery").length) {
    $("#gallery").imagesLoaded(function () {
      // images have loaded
      // Activate isotope in container
      $("#gallery").isotope({
        itemSelector: ".gallery_item",
        layoutMode: "masonry",
        animationOptions: {
          duration: 750,
          easing: "linear",
        },
      });

      // Add isotope click function
      $(".gallery_filter li").on("click", function () {
        $(".gallery_filter li").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr("data-filter");
        $("#gallery").isotope({
          filter: selector,
          animationOptions: {
            animationDuration: 750,
            easing: "linear",
            queue: false,
          },
        });
        return false;
      });
    });
  }

  //isotop js
  var gallery = $(".gallery_iner");
  if (gallery.length) {
    gallery.imagesLoaded(function () {
      gallery.isotope({
        itemSelector: ".grid-item",
        percentPosition: true,
        masonry: {
          columnWidth: ".grid-sizer",
        },
      });
    });
  }

  $(".portfolio_filter_menu").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $(".grid").isotope({
      filter: filterValue,
    });
    $(".portfolio_filter_menu button").removeClass("active");
    $(this).addClass("active");
  });

  //gallery js
  var grid_portfolio = $(".grid_portfolio_style");
  if (grid_portfolio.length) {
    grid_portfolio.imagesLoaded(function () {
      grid_portfolio.isotope({
        itemSelector: ".grid-item",
        percentPosition: true,
        masonry: {
          columnWidth: ".grid-sizer",
        },
      });
    });
  }

  //portfolio list fitrow js
  var list_fitrow = $(".portfolio_list_fitrow");
  if (list_fitrow.length) {
    list_fitrow.imagesLoaded(function () {
      list_fitrow.isotope({
        percentPosition: true,
        itemSelector: ".grid-item",
        masonry: {
          columnWidth: ".grid-sizer",
        },
      });
    });
  }

  $(".portfolio_fitrow_filter").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $(".grid").isotope({
      filter: filterValue,
    });
    $(".portfolio_fitrow_filter button").removeClass("active");
    $(this).addClass("active");
  });

  $(".accordion_content .tittle").on("click", function () {
    $(".accordion_content .tittle").removeClass("active");
  });
  $(".accordion_content .tittle").on("click", function () {
    $(this).addClass("active");
  });

  // map js
  if ($("#contactMap").length) {
    var $lat = $("#contactMap").data("lat");
    var $lon = $("#contactMap").data("lon");
    var $zoom = $("#contactMap").data("zoom");
    var $marker = $("#contactMap").data("marker");
    var $info = $("#contactMap").data("info");
    var $markerLat = $("#contactMap").data("mlat");
    var $markerLon = $("#contactMap").data("mlon");
    var map = new GMaps({
      el: "#contactMap",
      lat: $lat,
      lng: $lon,
      scrollwheel: false,
      scaleControl: true,
      streetViewControl: false,
      panControl: true,
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      zoom: $zoom,
    });
    map.addMarker({
      lat: $markerLat,
      lng: $markerLon,
      icon: $marker,
      infoWindow: {
        content: $info,
      },
    });
  }

  var pricingPart = $("#pricing_part");
  if (pricingPart.length) {
    var e = document.getElementById("filt-monthly"),
      d = document.getElementById("filt-yearly"),
      t = document.getElementById("switcher"),
      m = document.getElementById("monthly"),
      y = document.getElementById("yearly");

    e.addEventListener("click", function () {
      t.checked = false;
      e.classList.add("toggler--is-active");
      d.classList.remove("toggler--is-active");
      m.classList.remove("hide");
      y.classList.add("hide");
    });

    d.addEventListener("click", function () {
      t.checked = true;
      d.classList.add("toggler--is-active");
      e.classList.remove("toggler--is-active");
      m.classList.add("hide");
      y.classList.remove("hide");
    });

    t.addEventListener("click", function () {
      d.classList.toggle("toggler--is-active");
      e.classList.toggle("toggler--is-active");
      m.classList.toggle("hide");
      y.classList.toggle("hide");
    });
  }

  //nice select
  var niceSelect = $(".niceSelect");
  if (niceSelect.length) {
    niceSelect.niceSelect();
  }

  //image matrix3d effect
  $(".matrix3d").mousemove(function (e) {
    var offset = $(this).offset();
    var relX = e.pageX - offset.left;
    var relY = e.pageY - offset.top;
    var offsetMinX = $(this).width();
    var offsetMinY = $(this).height();
    var currentX = (relX += offsetMinX * -0.5);
    var currentY = (relY += offsetMinY * -0.5);
    var newX = currentX / 5000000;
    var newY = currentY / 10000000;
    $(this).css(
      "transform",
      "matrix3d(1.025,0,0," +
        -newX +
        ",0,1.025,0," +
        -newY +
        ",0,0,1,0,0,0,0,1)"
    );
  });
  $(".matrix3d").mouseout(function () {
    $(this).css("transform", "matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1)");
  });

  $(".matrix3d_1").mousemove(function (e) {
    var offset = $(this).offset();
    var relX = e.pageX - offset.left;
    var relY = e.pageY - offset.top;
    var offsetMinX = $(this).width();
    var offsetMinY = $(this).height();
    var currentX = (relX += offsetMinX * -0.5);
    var currentY = (relY += offsetMinY * -0.5);
    var newX = currentX / 900000;
    var newY = currentY / 5000000;
    $(this).css(
      "transform",
      "matrix3d(1.025,0,0," +
        -newX +
        ",0,1.025,0," +
        -newY +
        ",0,0,1,0,0,0,0,1)"
    );
  });
  $(".matrix3d_1").mouseout(function () {
    $(this).css("transform", "matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1)");
  });

  //offcanvus menu js
  $(".menu-trigger, .item_trigger").on("click", function () {
    $(".off_canvus_menu, .off_canvus_item").addClass("active");
    $(".offcanvas_overlay").addClass("active");
  });
  $(".close_icon i, .offcanvas_overlay").on("click", function () {
    $(".off_canvus_menu, .off_canvus_item").removeClass("active");
    $(".offcanvas_overlay").removeClass("active");
  });
  // dropdown-toggle class not added for submenus by current WP Bootstrap Navwalker as of November 15, 2017.
  $(".dropdown-menu > .dropdown > a").addClass("dropdown-toggle");

  $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
    if (!$(this).next().hasClass("show")) {
      $(this)
        .parents(".dropdown-menu")
        .first()
        .find(".show")
        .removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass("show");
    $(this)
      .parents("li.nav-item.dropdown.show")
      .on(".dropdown", function (e) {
        $(".dropdown-menu > .dropdown .show").removeClass("show");
      });
    $(".dropdown-menu a.dropdown-toggle").removeClass("show_dropdown");
    if ($(this).next().hasClass("show")) {
      $(this).addClass("show_dropdown");
    }
    return false;
  });

  if ($(window).innerWidth() <= 991) {
    $(".classic_header .dropdown-menu > .dropdown > .dropdown-toggle").on(
      "click",
      function () {
        $(
          ".classic_header .dropdown-menu > .dropdown > .dropdown-toggle"
        ).removeClass("active_icon");
        if ($(this).next().hasClass("show")) {
          $(this).addClass("active_icon");
        }
      }
    );
  } else {
    $(".classic_header .dropdown-menu > .dropdown").hover(function () {
      $(this).find(".dropdown-toggle").toggleClass("active_icon");
    });
  }

  //portfolio grid animation
  $(".single_portfolio_item").hover(function () {
    $(".portfolio_iner_content h2, .portfolio_iner_content p").removeClass(
      "animated fadeInUp"
    );
    $(this)
      .find(".portfolio_iner_content h2, .portfolio_iner_content p")
      .addClass("animated fadeInUp");
  });

  //multiscroll slider js
  var multiScrollSection = $(".multiScroll_section");
  if (multiScrollSection.length) {
    multiScrollSection.multiscroll({
      navigation: true,
      loopBottom: true,
      loopTop: true,
      sectionSelector: ".single_multiScroll",
      leftSelector: ".multiScroll_left",
      rightSelector: ".multiScroll_right",
    });
  }

  //time countdown
  $(document).ready(function () {
    function coursesTimer() {
      var endTime = new Date("15 Jun 2021 9:56:00 GMT+01:00");
      endTime = Date.parse(endTime) / 1000;
      var now = new Date();
      now = Date.parse(now) / 1000;
      var timeLeft = endTime - now;
      var days = Math.floor(timeLeft / 86400);
      var hours = Math.floor((timeLeft - days * 86400) / 3600);
      var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
      var seconds = Math.floor(
        timeLeft - days * 86400 - hours * 3600 - minutes * 60
      );
      if (hours < "10") {
        hours = "0" + hours;
      }
      if (minutes < "10") {
        minutes = "0" + minutes;
      }
      if (seconds < "10") {
        seconds = "0" + seconds;
      }
      $("#days").html(days + "<span>Days</span>");
      $("#hours").html(hours + "<span>Hours</span>");
      $("#minutes").html(minutes + "<span>Minutes</span>");
      $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function () {
      coursesTimer();
    }, 1000);
  });

  //vartical slider banner 14 js
  var portfolio_grid_style = document.getElementById("portfolio_grid_style");
  if (portfolio_grid_style) {
    //scorl animation js
    var $addclass_elements = $(".addclass_section");
    var $window = $(window);

    function scroll_addclass() {
      var window_height = $(window).height() - 200;
      var window_top_position = $window.scrollTop();
      var window_bottom_position = window_top_position + window_height;

      $.each($addclass_elements, function () {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = element_top_position + element_height;

        //check to see if this current container is within viewport
        if (
          element_bottom_position >= window_top_position &&
          element_top_position <= window_bottom_position
        ) {
          $element.addClass("in_active");
        }
      });
    }
    $window.on("scroll resize", scroll_addclass);
    $window.trigger("scroll");
  }

  //scorl animation js
  var $single_portfolio_img = $(".overlay_effect");
  var $window = $(window);

  function scroll_addclass() {
    var window_height = $(window).height() - 200;
    var window_top_position = $window.scrollTop();
    var window_bottom_position = window_top_position + window_height;

    $.each($single_portfolio_img, function () {
      var $element = $(this);
      var element_height = $element.outerHeight();
      var element_top_position = $element.offset().top;
      var element_bottom_position = element_top_position + element_height;

      //check to see if this current container is within viewport
      if (
        element_bottom_position >= window_top_position &&
        element_top_position <= window_bottom_position
      ) {
        $element.addClass("is_show");
      }
    });
  }

  $window.on("scroll resize", scroll_addclass);
  $window.trigger("scroll");

  //product count
  var incrementPlus;
  var incrementMinus;
  var buttonPlus = $(".cart-qty-plus");
  var buttonMinus = $(".cart-qty-minus");

  var incrementPlus = buttonPlus.click(function () {
    var $n = $(this).parent(".product_count").find(".qty");
    $n.val(Number($n.val()) + 1);
  });

  var incrementMinus = buttonMinus.click(function () {
    var $n = $(this).parent(".product_count").find(".qty");
    var amount = Number($n.val());
    if (amount > 0) {
      $n.val(amount - 1);
    }
  });

  // easying js code
  $(".page-scroll").bind("click", function (event) {
    var $anchor = $(this);
    var headerH = "115";
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top - headerH + "px",
        },
        1500,
        "easeInOutExpo"
      );
    event.preventDefault();
  });

  //animated tittle
  var typed_text = $(".typed_text");
  if (typed_text.length) {
    typed_text.typed({
      strings: ["design"],
      stringsElement: null,
      typeSpeed: 100,
      startDelay: 500,
      backSpeed: 100,
      backDelay: 500,
      loop: true,
      showCursor: true,
      cursorChar: "_",
      attr: null,
      contentType: "html",
    });
  }

  var fullpage_active = $("#fullpage");
  if (fullpage_active.length) {
    fullpage_active.fullpage({
      licenseKey: "",
      onLeave: function (origin, destination, direction) {
        var leavingSection = this;

        //after leaving section 2
        if (origin.index == 1 && direction == "down") {
          alert("Going to section 3!");
        } else if (origin.index == 1 && direction == "up") {
          alert("Going to section 1!");
        }
      },
    });
  }

  //parallaxie back ground image
  var parallaxie = $(".parallaxie");
  if (parallaxie.length) {
    parallaxie.parallaxie({
      speed: 0.5,
      offset: 50,
    });
  }

  //progressbar js
  var fillbar_1 = $(".fillbar_1");
  if (fillbar_1.length) {
    fillbar_1.rProgressbar({
      percentage: 80,
    });
  }
  var fillbar_2 = $(".fillbar_2");
  if (fillbar_2.length) {
    fillbar_2.rProgressbar({
      percentage: 90,
    });
  }
  var fillbar_3 = $(".fillbar_3");
  if (fillbar_3.length) {
    fillbar_3.rProgressbar({
      percentage: 70,
    });
  }
  var fillbar_4 = $(".fillbar_4");
  if (fillbar_4.length) {
    fillbar_4.rProgressbar({
      percentage: 88,
    });
  }
  var fillbar_5 = $(".fillbar_5");
  if (fillbar_5.length) {
    fillbar_5.rProgressbar({
      percentage: 95,
    });
  }

  //js cookie box code
  var cookie_box = document.getElementById("js-cookie-box");
  if (cookie_box) {
    const cookieBox = document.getElementById("js-cookie-box");
    const cookieButton = document.getElementById("js-cookie-button");

    if (!Cookies.get("cookie-box")) {
      cookieBox.classList.remove("cookie-box--hide");

      cookieButton.onclick = function () {
        Cookies.set("cookie-box", true, {
          expires: 7,
        });
        cookieBox.classList.add("cookie-box--hide");
      };
    }
  }
  $(".close_cookies").on("click", function () {
    $(".cookie-content").hide();
  });

  $(document).ready(function () {
    var width = 100,
      perfData = window.performance.timing,
      EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
      time = parseInt((EstimatedTime / 1000) % 60) * 100;

    $(".loadbar-percent").animate(
      {
        width: width + "%",
      },
      time
    );

    var PercentageID = $("#percent"),
      start = 0,
      end = 100,
      durataion = time;
    animateValue(PercentageID, start, end, durataion);

    function animateValue(id, start, end, duration) {
      var range = end - start,
        current = start,
        increment = end > start ? 1 : -1,
        stepTime = Math.abs(Math.floor(duration / range)),
        obj = $(id);

      var timer = setInterval(function () {
        current += increment;
        $(obj).text(current + "%");
        if (current == end) {
          clearInterval(timer);
        }
      }, stepTime);
    }
    setTimeout(function () {
      $("#preloader-wrapper").addClass("preloader_end");
    }, time);

    $(window).on("load", function () {
      $("#preloader-wrapper").addClass("preloader_end");
      $("#loadbar-percent").fadeOut(300);
      $("#percent").fadeOut(300);
    });
  });
})(jQuery);

if (
  window.location.pathname == "/menu/config/1" ||
  window.location.pathname == "/menu/config/2" ||
  window.location.pathname == "/menu/config/3"
) {
  const range = document.querySelectorAll('input[type="range"]');
  const step1WeightMore = document.querySelector(".step1-weight-more");
  const step1WeightLess = document.querySelector(".step1-weight-less");
  const step1HeightMore = document.querySelector(".step1-height-more");
  const step1HeightLess = document.querySelector(".step1-height-less");
  const weightValue = document.querySelector("#range-value-weight");
  const formWeight = document.querySelector("#slide-weight");
  const heightValue = document.querySelector("#range-value-height");
  const formHeight = document.querySelector("#slide-height");

  for (let i = 0; i < range.length; i++) {
    range[i].addEventListener("click", (e) => {
      e.preventDefault();
    });

    range[i].addEventListener("mouseover", (e) => {
      e.preventDefault();
    });

    range[i].addEventListener("mouseup", (e) => {
      e.preventDefault();
    });
  }

  step1WeightMore.addEventListener("click", () => {
    if (weightValue.innerHTML < 120 && weightValue.innerHTML >= 40) {
      if (weightValue.innerHTML < 100) {
        weightValue.innerHTML = (
          Math.round((parseFloat(weightValue.innerHTML) + 0.1) * 100) / 100
        ).toPrecision(3);
      } else {
        weightValue.innerHTML = (
          Math.round((parseFloat(weightValue.innerHTML) + 0.1) * 100) / 100
        ).toPrecision(4);
      }
      formWeight.value =
        Math.round((parseFloat(formWeight.value) + 0.1) * 100) / 100;
    }
  });

  step1WeightLess.addEventListener("click", () => {
    if (weightValue.innerHTML <= 120 && weightValue.innerHTML > 40) {
      if (weightValue.innerHTML < 100) {
        weightValue.innerHTML = (
          Math.round((parseFloat(weightValue.innerHTML) - 0.1) * 100) / 100
        ).toPrecision(3);
      } else {
        weightValue.innerHTML = (
          Math.round((parseFloat(weightValue.innerHTML) - 0.1) * 100) / 100
        ).toPrecision(4);
      }
      formWeight.value =
        Math.round((parseFloat(formWeight.value) - 0.1) * 100) / 100;
    }
  });

  step1HeightMore.addEventListener("click", () => {
    if (heightValue.innerHTML < 210 && heightValue.innerHTML >= 140) {
      heightValue.innerHTML =
        Math.round((parseFloat(heightValue.innerHTML) + 1) * 100) / 100;
      formHeight.value =
        Math.round((parseFloat(formHeight.value) + 1) * 100) / 100;
    }
  });

  step1HeightLess.addEventListener("click", () => {
    if (heightValue.innerHTML <= 210 && heightValue.innerHTML > 140) {
      heightValue.innerHTML =
        Math.round((parseFloat(heightValue.innerHTML) - 1) * 100) / 100;
      formHeight.value =
        Math.round((parseFloat(formHeight.value) - 1) * 100) / 100;
    }
  });

  const carouselIndicators = document.querySelector(
    ".carousel-indicators"
  ).children;
  const carouselControlNext = document.querySelector(
    ".menu-step1 .carousel-control-next"
  );
  const carouselControlPrev = document.querySelector(
    ".menu-step1 .carousel-control-prev"
  );

  for (let i = 0; i < carouselIndicators.length; i++) {
    carouselIndicators[i].addEventListener("click", () => {
      setTimeout(() => {
        if (carouselIndicators[3].className == "active") {
          carouselControlNext.style.display = "none";
        } else {
          carouselControlNext.style.display = "flex";
        }
      }, 500);
    });
  }

  if (window.innerWidth < 991) {
    setTimeout(() => {
      if (carouselIndicators[3].className == "active") {
        carouselControlNext.style.display = "none";
      } else {
        carouselControlNext.style.display = "flex";
        carouselControlPrev.style.display = "flex";
      }
    }, 500);

    setTimeout(() => {
      if (carouselIndicators[0].className == "active") {
        carouselControlPrev.style.display = "none";
      } else {
        carouselControlNext.style.display = "flex";
        carouselControlPrev.style.display = "flex";
      }
    }, 500);

    carouselControlNext.addEventListener("click", () => {
      setTimeout(() => {
        if (carouselIndicators[3].className == "active") {
          carouselControlNext.style.display = "none";
        } else {
          carouselControlNext.style.display = "flex";
          carouselControlPrev.style.display = "flex";
        }
      }, 500);
    });

    carouselControlPrev.addEventListener("click", () => {
      setTimeout(() => {
        if (carouselIndicators[0].className == "active") {
          carouselControlPrev.style.display = "none";
        } else {
          carouselControlNext.style.display = "flex";
          carouselControlPrev.style.display = "flex";
        }
      }, 500);
    });
  }

  setTimeout(() => {
    if (carouselIndicators[3].className == "active") {
      carouselControlNext.style.display = "none";
    } else {
      carouselControlNext.style.display = "flex";
    }
  }, 500);

  setTimeout(() => {
    if (carouselIndicators[0].className == "active") {
      carouselControlPrev.style.display = "none";
    } else {
      carouselControlPrev.style.display = "flex";
    }
  }, 500);

  carouselControlNext.addEventListener("click", () => {
    setTimeout(() => {
      if (carouselIndicators[3].className == "active") {
        carouselControlNext.style.display = "none";
      } else {
        carouselControlNext.style.display = "flex";
      }
    }, 500);
  });

  carouselControlPrev.addEventListener("click", () => {
    setTimeout(() => {
      if (carouselIndicators[0].className == "active") {
        carouselControlPrev.style.display = "none";
      } else {
        carouselControlPrev.style.display = "flex";
      }
    }, 500);
  });
}
if (window.location.pathname == "/menu/dishes") {
  const openDish = document.querySelectorAll(".open-carousel-img");
  const dishCollapse = document.querySelectorAll(".collapse");
  const card = document.querySelectorAll(".menu-step2 .card .card-header .btn");
  const modalTitle = document.querySelectorAll(".modal-header div");

  const platesNumber = document.querySelector(".platos-count-number");
  const dishCheckbox = document.querySelectorAll(".step2-checkbox");

  let dishesCount = 0;

  for (let i = 0; i < modalTitle.length; i++) {
    if (window.innerWidth < 991) {
      modalTitle[i].className = "";
    } else {
      modalTitle[i].className = "col-lg-6";
    }

    window.addEventListener("resize", () => {
      if (window.innerWidth < 991) {
        modalTitle[i].className = "";
      } else {
        modalTitle[i].className = "col-lg-6";
      }
    });
  }

  for (let i = 0; i < card.length; i++) {
    card[i].addEventListener("click", () => {
      if (dishCollapse[i].className == "collapse") {
        openDish[i].className = "close-carousel-img";
      } else if (dishCollapse[i].className == "collapse show") {
        openDish[i].className = "open-carousel-img";
      }
    });
  }

  const sliders = document.querySelectorAll(".slider-container");

  for (let i = 0; i < sliders.length; i++) {
    if (i % 2 == 0) {
      if (i == 0) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-1"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-1"
        );
        const lunches = document.querySelectorAll("#day-lunch-1");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-1.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-1");
            const proteinas = document.querySelector("#day-info-proteinas-1");
            const hidratos = document.querySelector("#day-info-hidratos-1");
            const grasas = document.querySelector("#day-info-grasas-1");
            const fibra = document.querySelector("#day-info-fibra-1");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-1.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-1.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-1.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-1");
            const proteinas = document.querySelector("#day-info-proteinas-1");
            const hidratos = document.querySelector("#day-info-hidratos-1");
            const grasas = document.querySelector("#day-info-grasas-1");
            const fibra = document.querySelector("#day-info-fibra-1");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-1.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-1.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 2) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-2"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-2"
        );
        const lunches = document.querySelectorAll("#day-lunch-2");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-2.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-2");
            const proteinas = document.querySelector("#day-info-proteinas-2");
            const hidratos = document.querySelector("#day-info-hidratos-2");
            const grasas = document.querySelector("#day-info-grasas-2");
            const fibra = document.querySelector("#day-info-fibra-2");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-2.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-2.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-2.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-2");
            const proteinas = document.querySelector("#day-info-proteinas-2");
            const hidratos = document.querySelector("#day-info-hidratos-2");
            const grasas = document.querySelector("#day-info-grasas-2");
            const fibra = document.querySelector("#day-info-fibra-2");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-2.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-2.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 4) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-3"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-3"
        );
        const lunches = document.querySelectorAll("#day-lunch-3");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-3.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-3");
            const proteinas = document.querySelector("#day-info-proteinas-3");
            const hidratos = document.querySelector("#day-info-hidratos-3");
            const grasas = document.querySelector("#day-info-grasas-3");
            const fibra = document.querySelector("#day-info-fibra-3");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-3.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-3.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-3.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-3");
            const proteinas = document.querySelector("#day-info-proteinas-3");
            const hidratos = document.querySelector("#day-info-hidratos-3");
            const grasas = document.querySelector("#day-info-grasas-3");
            const fibra = document.querySelector("#day-info-fibra-3");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-3.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-3.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 6) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-4"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-4"
        );
        const lunches = document.querySelectorAll("#day-lunch-4");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-4.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-4");
            const proteinas = document.querySelector("#day-info-proteinas-4");
            const hidratos = document.querySelector("#day-info-hidratos-4");
            const grasas = document.querySelector("#day-info-grasas-4");
            const fibra = document.querySelector("#day-info-fibra-4");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-4.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-4.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-4.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-4");
            const proteinas = document.querySelector("#day-info-proteinas-4");
            const hidratos = document.querySelector("#day-info-hidratos-4");
            const grasas = document.querySelector("#day-info-grasas-4");
            const fibra = document.querySelector("#day-info-fibra-4");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-4.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-4.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 8) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-5"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-5"
        );
        const lunches = document.querySelectorAll("#day-lunch-5");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-5.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-5");
            const proteinas = document.querySelector("#day-info-proteinas-5");
            const hidratos = document.querySelector("#day-info-hidratos-5");
            const grasas = document.querySelector("#day-info-grasas-5");
            const fibra = document.querySelector("#day-info-fibra-5");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-5.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-5.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-5.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-5");
            const proteinas = document.querySelector("#day-info-proteinas-5");
            const hidratos = document.querySelector("#day-info-hidratos-5");
            const grasas = document.querySelector("#day-info-grasas-5");
            const fibra = document.querySelector("#day-info-fibra-5");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-5.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-5.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 10) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-6"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-6"
        );
        const lunches = document.querySelectorAll("#day-lunch-6");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-6.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-6");
            const proteinas = document.querySelector("#day-info-proteinas-6");
            const hidratos = document.querySelector("#day-info-hidratos-6");
            const grasas = document.querySelector("#day-info-grasas-6");
            const fibra = document.querySelector("#day-info-fibra-6");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-6.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-6.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-6.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-6");
            const proteinas = document.querySelector("#day-info-proteinas-6");
            const hidratos = document.querySelector("#day-info-hidratos-6");
            const grasas = document.querySelector("#day-info-grasas-6");
            const fibra = document.querySelector("#day-info-fibra-6");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-6.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-6.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 12) {
        const nextBtnLunch = document.querySelectorAll(
          ".menu-next-btn-lunch-7"
        );
        const backBtnLunch = document.querySelectorAll(
          ".menu-back-btn-lunch-7"
        );
        const lunches = document.querySelectorAll("#day-lunch-7");
        let value;

        for (let x = 0; x < nextBtnLunch.length; x++) {
          nextBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-7.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-7");
            const proteinas = document.querySelector("#day-info-proteinas-7");
            const hidratos = document.querySelector("#day-info-hidratos-7");
            const grasas = document.querySelector("#day-info-grasas-7");
            const fibra = document.querySelector("#day-info-fibra-7");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-7.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-7.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnLunch.length; x++) {
          backBtnLunch[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-lunch-7.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == lunches.length + 1) {
              value = value === 0 ? lunches.length : 1;
            }

            lunches[currentPosition - 1].classList.toggle("active");
            lunches[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-7");
            const proteinas = document.querySelector("#day-info-proteinas-7");
            const hidratos = document.querySelector("#day-info-hidratos-7");
            const grasas = document.querySelector("#day-info-grasas-7");
            const fibra = document.querySelector("#day-info-fibra-7");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-7.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-7.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
    } else {
      const nextBtnDinner = document.querySelectorAll(
        ".menu-next-btn-dinner-" + (i + 1)
      );
      const backBtnDinner = document.querySelectorAll(
        ".menu-back-btn-dinner-" + (i + 1)
      );
      if (i == 1) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-1"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-1"
        );
        const dinners = document.querySelectorAll("#day-dinner-1");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-1.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-1");
            const proteinas = document.querySelector("#day-info-proteinas-1");
            const hidratos = document.querySelector("#day-info-hidratos-1");
            const grasas = document.querySelector("#day-info-grasas-1");
            const fibra = document.querySelector("#day-info-fibra-1");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-1.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-1.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-1.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-1");
            const proteinas = document.querySelector("#day-info-proteinas-1");
            const hidratos = document.querySelector("#day-info-hidratos-1");
            const grasas = document.querySelector("#day-info-grasas-1");
            const fibra = document.querySelector("#day-info-fibra-1");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-1.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-1.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 3) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-2"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-2"
        );
        const dinners = document.querySelectorAll("#day-dinner-2");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-2.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-2");
            const proteinas = document.querySelector("#day-info-proteinas-2");
            const hidratos = document.querySelector("#day-info-hidratos-2");
            const grasas = document.querySelector("#day-info-grasas-2");
            const fibra = document.querySelector("#day-info-fibra-2");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-2.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-2.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-2.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-2");
            const proteinas = document.querySelector("#day-info-proteinas-2");
            const hidratos = document.querySelector("#day-info-hidratos-2");
            const grasas = document.querySelector("#day-info-grasas-2");
            const fibra = document.querySelector("#day-info-fibra-2");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-2.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-2.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 5) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-3"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-3"
        );
        const dinners = document.querySelectorAll("#day-dinner-3");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-3.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-3");
            const proteinas = document.querySelector("#day-info-proteinas-3");
            const hidratos = document.querySelector("#day-info-hidratos-3");
            const grasas = document.querySelector("#day-info-grasas-3");
            const fibra = document.querySelector("#day-info-fibra-3");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-3.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-3.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-3.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-3");
            const proteinas = document.querySelector("#day-info-proteinas-3");
            const hidratos = document.querySelector("#day-info-hidratos-3");
            const grasas = document.querySelector("#day-info-grasas-3");
            const fibra = document.querySelector("#day-info-fibra-3");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-3.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-3.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 7) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-4"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-4"
        );
        const dinners = document.querySelectorAll("#day-dinner-4");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-4.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-4");
            const proteinas = document.querySelector("#day-info-proteinas-4");
            const hidratos = document.querySelector("#day-info-hidratos-4");
            const grasas = document.querySelector("#day-info-grasas-4");
            const fibra = document.querySelector("#day-info-fibra-4");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-4.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-4.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-4.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-4");
            const proteinas = document.querySelector("#day-info-proteinas-4");
            const hidratos = document.querySelector("#day-info-hidratos-4");
            const grasas = document.querySelector("#day-info-grasas-4");
            const fibra = document.querySelector("#day-info-fibra-4");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-4.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-4.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 9) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-5"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-5"
        );
        const dinners = document.querySelectorAll("#day-dinner-5");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-5.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-5");
            const proteinas = document.querySelector("#day-info-proteinas-5");
            const hidratos = document.querySelector("#day-info-hidratos-5");
            const grasas = document.querySelector("#day-info-grasas-5");
            const fibra = document.querySelector("#day-info-fibra-5");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-5.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-5.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-5.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-5");
            const proteinas = document.querySelector("#day-info-proteinas-5");
            const hidratos = document.querySelector("#day-info-hidratos-5");
            const grasas = document.querySelector("#day-info-grasas-5");
            const fibra = document.querySelector("#day-info-fibra-5");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-5.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-5.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 11) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-6"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-6"
        );
        const dinners = document.querySelectorAll("#day-dinner-6");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-6.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-6");
            const proteinas = document.querySelector("#day-info-proteinas-6");
            const hidratos = document.querySelector("#day-info-hidratos-6");
            const grasas = document.querySelector("#day-info-grasas-6");
            const fibra = document.querySelector("#day-info-fibra-6");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-6.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-6.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-6.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-6");
            const proteinas = document.querySelector("#day-info-proteinas-6");
            const hidratos = document.querySelector("#day-info-hidratos-6");
            const grasas = document.querySelector("#day-info-grasas-6");
            const fibra = document.querySelector("#day-info-fibra-6");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-6.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-6.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
      if (i == 13) {
        const nextBtnDinner = document.querySelectorAll(
          ".menu-next-btn-dinner-7"
        );
        const backBtnDinner = document.querySelectorAll(
          ".menu-back-btn-dinner-7"
        );
        const dinners = document.querySelectorAll("#day-dinner-7");
        let value;

        for (let x = 0; x < nextBtnDinner.length; x++) {
          nextBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-7.active").dataset.id
            );
            value = currentPosition;
            value -= 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-7");
            const proteinas = document.querySelector("#day-info-proteinas-7");
            const hidratos = document.querySelector("#day-info-hidratos-7");
            const grasas = document.querySelector("#day-info-grasas-7");
            const fibra = document.querySelector("#day-info-fibra-7");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-7.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-7.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }

        for (let x = 0; x < backBtnDinner.length; x++) {
          backBtnDinner[x].addEventListener("click", () => {
            const currentPosition = Number(
              document.querySelector("#day-dinner-7.active").dataset.id
            );
            value = currentPosition;
            value += 1;

            if (value === 0 || value == dinners.length + 1) {
              value = value === 0 ? dinners.length : 1;
            }

            dinners[currentPosition - 1].classList.toggle("active");
            dinners[value - 1].classList.toggle("active");

            const cal = document.querySelector("#day-info-cal-7");
            const proteinas = document.querySelector("#day-info-proteinas-7");
            const hidratos = document.querySelector("#day-info-hidratos-7");
            const grasas = document.querySelector("#day-info-grasas-7");
            const fibra = document.querySelector("#day-info-fibra-7");

            let infoLunch = document.querySelectorAll(
              "#day-lunch-7.active .dish-info span p"
            );
            let infoDinner = document.querySelectorAll(
              "#day-dinner-7.active .dish-info span p"
            );

            cal.innerHTML =
              Math.round(
                (Number(infoLunch[0].innerHTML) +
                  Number(infoDinner[0].innerHTML) * 10) /
                  10
              ) + " <b>Calorías</b>";
            proteinas.innerHTML =
              Math.round(
                (Number(infoLunch[1].innerHTML) +
                  Number(infoDinner[1].innerHTML) * 10) /
                  10
              ) + " <b>Proteinas</b>";
            hidratos.innerHTML =
              Math.round(
                (Number(infoLunch[2].innerHTML) +
                  Number(infoDinner[2].innerHTML) * 10) /
                  10
              ) + " <b>Carbohidratos</b>";
            grasas.innerHTML =
              Math.round(
                (Number(infoLunch[3].innerHTML) +
                  Number(infoDinner[3].innerHTML) * 10) /
                  10
              ) + " <b>Grasas</b>";
            fibra.innerHTML =
              Math.round(
                (Number(infoLunch[4].innerHTML) +
                  Number(infoDinner[4].innerHTML) * 10) /
                  10
              ) + " <b>Fibra</b>";
          });
        }
      }
    }
  }
}

function getCookie(name) {
  // Split cookie string and get all individual name=value pairs in an array
  var cookieArr = document.cookie.split(";");

  // Loop through the array elements
  for (var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split("=");

    /* Removing whitespace at the beginning of the cookie name
      and compare it with the given string */
    if (name == cookiePair[0].trim()) {
      // Decode the cookie value and return
      return decodeURIComponent(cookiePair[1]);
    }
  }

  // Return null if not found
  return null;
}

if (window.location.pathname == "/") {
  if (document.querySelector(".home-popup-btn") != null) {
    const popupBtn = document.querySelector(".home-popup-btn");
    const popup = document.querySelector(".home-popup-container");
    popupBtn.addEventListener("click", () => {
      popup.style.display = "none";
    });
  }
  const popupBtn2 = document.querySelector(".home-popup-btn2");
  const footerModal = document.querySelector(".footer-popup-background");
  const homePopup = document.querySelector(".home-popup-container2");
  footerModal.addEventListener("click", () => {
    homePopup.classList.toggle("home-popup-hidden");
  });
  popupBtn2.addEventListener("click", () => {
    homePopup.classList.toggle("home-popup-hidden");
  });

  const volumeOnIcon = document.querySelector(".home-volume-on");
  const volumeOffIcon = document.querySelector(".home-volume-off");
  const homeVideo = document.querySelector("video");
  const homeVideoContainer = document.querySelector(".embed-responsive");

  if (window.innerWidth < 991) {
    homeVideo.src = "video/MistMeals720.mp4";
    homeVideo.autoplay = false;
    homeVideo.controls = true;
    homeVideoContainer.style.width = "100%";
    homeVideoContainer.style.marginLeft = "auto";
  } else {
    homeVideo.src = "video/MistMeals4K.mp4";
    homeVideo.autoplay = true;
    homeVideo.muted = true;
    homeVideo.controls = false;
    homeVideoContainer.style.width = "80%";
    homeVideoContainer.style.marginLeft = "10%";
  }

  window.addEventListener("resize", () => {
    if (window.innerWidth < 991) {
      if (!homeVideo.src.includes("video/MistMeals720.mp4")) {
        homeVideo.src = "video/MistMeals720.mp4";
        homeVideo.autoplay = false;
        homeVideo.controls = true;
        homeVideoContainer.style.width = "100%";
        homeVideoContainer.style.marginLeft = "auto";
      }
    } else {
      if (!homeVideo.src.includes("video/MistMeals4K.mp4")) {
        homeVideo.src = "video/MistMeals4K.mp4";
        homeVideo.autoplay = true;
        homeVideo.muted = true;
        homeVideo.controls = false;
        homeVideoContainer.style.width = "80%";
        homeVideoContainer.style.marginLeft = "10%";
      }
    }
  });

  volumeOffIcon.addEventListener("click", () => {
    homeVideo.muted = false;
    volumeOnIcon.style.display = "block";
    volumeOffIcon.style.display = "none";
  });

  volumeOnIcon.addEventListener("click", () => {
    homeVideo.muted = true;
    volumeOffIcon.style.display = "block";
    volumeOnIcon.style.display = "none";
  });

  // const carouselItem = document.querySelectorAll('.carousel-item');
  // const carouselDot = document.querySelectorAll('.carousel-indicators li');

  // if(window.innerWidth<991){
  //     carouselItem[0].classList.remove('active');
  //     carouselItem[1].classList.add('active')
  //     carouselDot[1].classList.add('mp-mobile-hidden');
  // }

  // window.addEventListener('resize', () => {
  // if(window.innerWidth<991){
  //     carouselItem[0].classList.remove('active');
  //     carouselItem[1].classList.add('active')
  //     carouselDot[1].classList.add('mp-mobile-hidden');
  // } else{
  //     carouselItem[0].classList.add('active');
  //     carouselItem[1].classList.remove('active')
  //     carouselDot[1].classList.remove('mp-mobile-hidden');

  // }

  // })
}

if (window.location.pathname == "/orders/create") {
  const orderCheckbox = document.querySelector("#invoice_check");
  const invoice_address = document.querySelector("#invoice_address");
  const invoice_address_number = document.querySelector(
    "#invoice_address_number"
  );
  const invoice_address_letter = document.querySelector(
    "#invoice_address_letter"
  );
  const invoice_cp = document.querySelector("#invoice_cp");
  const invoice_region = document.querySelector("#invoice_region");
  const invoice_province = document.querySelector("#invoice_province");
  const invoice_city = document.querySelector("#invoice_city");

  let invoice_count = 0;

  orderCheckbox.checked = false;

  orderCheckbox.addEventListener("click", () => {
    setTimeout(() => {
      orderCheckbox.setAttribute("disabled", "");
    }, 100);
    setTimeout(() => {
      orderCheckbox.removeAttribute("disabled", "");
    }, 500);
    if (invoice_count == 0) {
      invoice_address.required = true;
      invoice_address_number.required = true;
      invoice_cp.required = true;
      invoice_region.required = true;
      invoice_province.required = true;
      invoice_city.required = true;
      invoice_count = 1;
    } else if (invoice_count == 1) {
      invoice_address.required = false;
      invoice_address_number.required = false;
      invoice_cp.required = false;
      invoice_region.required = false;
      invoice_province.required = false;
      invoice_city.required = false;
      invoice_count = 0;
    }
  });
}

if (window.location.pathname == "/platos") {
  const containerL = document.querySelectorAll(".plato-container-l");
  const containersL = document.querySelector(".platos-container-l");

  const sizeBtnM = document.querySelectorAll(".plato-peso-switch-m");
  const sizeBtnL = document.querySelectorAll(".plato-peso-switch-l");

  for (let i = 0; i < sizeBtnM.length; i++) {
    sizeBtnM[i].addEventListener("click", () => {
      sizeBtnM[i].classList.toggle("active");
      sizeBtnL[i].classList.toggle("active");
      containerL[i].classList.toggle("active");
    });
  }

  for (let i = 0; i < sizeBtnL.length; i++) {
    sizeBtnL[i].addEventListener("click", () => {
      sizeBtnM[i].classList.toggle("active");
      sizeBtnL[i].classList.toggle("active");
      containerL[i].classList.toggle("active");
    });
  }

  const plateBtnMore = document.querySelectorAll(".plate-btn-more");
  const plateBtnLess = document.querySelectorAll(".plate-btn-less");
  const plateQuantitiyDisplay = document.querySelectorAll(
    ".plate-quantity-display"
  );

  for (let i = 0; i < plateQuantitiyDisplay.length; i++) {
    plateBtnMore[i].addEventListener("click", () => {
      plateQuantitiyDisplay[i].value =
        parseInt(plateQuantitiyDisplay[i].value) + 1;
    });

    plateBtnLess[i].addEventListener("click", () => {
      if (parseInt(plateQuantitiyDisplay[i].value) > 0) {
        plateQuantitiyDisplay[i].value =
          parseInt(plateQuantitiyDisplay[i].value) - 1;
      }
    });
  }

  // const hideModalBtn = document.querySelector('.plates-modal-hide');
  // if(hideModalBtn != null){
  //   hideModalBtn.addEventListener('click', () => {
  //     document.querySelector('.plates-modal').classList.remove('active');
  //     document.cookie = "infoName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  //     document.cookie = "infoPrice=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  //   });

  //   const cartModalBtn = document.querySelector('.plates-modal-cart-btn');
  //   cartModalBtn.addEventListener('click', () => {
  //     document.cookie = "infoName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  //     document.cookie = "infoPrice=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  //     document.cookie = "pageHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
  //   });
  // }
}

// MailChimp integration

!(function (c, h, i, m, p) {
  (m = c.createElement(h)),
    (p = c.getElementsByTagName(h)[0]),
    (m.async = 1),
    (m.src = i),
    p.parentNode.insertBefore(m, p);
})(
  document,
  "script",
  "https://chimpstatic.com/mcjs-connected/js/users/bcef03a2016fd98bf6181e989/b175fd65158069fd4b818283f.js"
);

// fadeout popup msg
let popupMsg = document.querySelector(".home-msg-container");
if (popupMsg != null) {
  setTimeout(() => {
    popupMsg.classList.toggle("fade");
  }, 5000);
}

// global
