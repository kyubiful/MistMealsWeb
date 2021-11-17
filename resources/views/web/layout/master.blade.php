<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="facebook-domain-verification" content="pnlx8uo5qdzjh5cdbx2066ux55ujk7" />
  <title>@lang('global.project.title')</title>
  <link rel="icon" href="{{ asset( '/img/favicon_mistmeals.png' )}}" type="image/png">
  <link rel="stylesheet" href="{{ asset( '/css/bootstrap.min.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/css/animate.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/vendors/themify_icons/themify-icons.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/vendors/owl_carousel/css/owl.carousel.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/vendors/niceselect/css/nice-select.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/vendors/flatIcon/flaticon.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/css/style.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/css/mystyle.css' )}}" />
  <link rel="stylesheet" href="{{ asset( '/assets/fonts/feather-font/css/iconfont.css' )}}" />
  @stack('css')

  <!-- Hotjar Tracking Code for https://www.mistmeals.com -->
  <script>
      (function(h,o,t,j,a,r){
          h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
          h._hjSettings={hjid:2701838,hjsv:6};
          a=o.getElementsByTagName('head')[0];
          r=o.createElement('script');r.async=1;
          r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
          a.appendChild(r);
      })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
  </script>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '211073511093947');
    fbq('track', 'PageView');
    // fbq('track', 'AddPaymentInfo');
    // fbq('track', 'AddToCart');
    // fbq('track', 'Purchase');
    // fbq('track', 'Subscribe');
    fbq('track', 'ViewContent');
  </script>
  <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=211073511093947&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-09ME74NCTN"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'AW-10805779259');
    gtag('config', 'G-09ME74NCTN');

  </script>

</head>

<body class="{{ isset($bodyclass) ? $bodyclass : '' }}">

  <div class="footer-popup-background">
    <div class="footer-popup-container">
      <div>De momento solo repartimos en algunas zonas de Madrid, pero no te preocupes, dentro de poco llegaremos a tu ciudad ;)</div>
    </div>
  </div>

  @if(session()->has('message') AND session()->get('message')=='newsletter')
  <div class="home-msg-container">
    <div class="home-msg">
      <p>¡Gracias por suscribirte a nuestra newsletter!</p>
    </div>
  </div>
  @endif
  @include('web.layout.header')
  @yield('content')
  @include('web.layout.modal')
  @include('web.layout.footer')

  <script src="{{ asset( '/js/jquery-3.5.1.min.js' )}}"></script>
  <script src="{{ asset( '/js/popper.min.js' )}}"></script>
  <script src="{{ asset( '/js/bootstrap.min.js' )}}"></script>
  <script src="{{ asset( '/js/jquery.easing.min.js' )}}"></script>
  <script src="{{ asset( '/vendors/owl_carousel/js/owl.carousel.min.js' )}}"></script>
  <script src="{{ asset( '/vendors/parallax/jquery.parallax-scroll.js' )}}"></script>
  <script src="{{ asset( '/vendors/parallax/parallax.js' )}}"></script>
  <script src="{{ asset( '/vendors/parallax/breadctumb_parallax.js' )}}"></script>
  <script src="{{ asset( '/vendors/wow/wow.min.js' )}}"></script>
  <script src="{{ asset( '/vendors/powertip/jquery.powertip.js' )}}"></script>
  <script src="{{ asset( '/vendors/imagesloaded/imagesloaded.pkgd.min.js' )}}"></script>
  <script src="{{ asset( '/vendors/niceselect/js/jquery.nice-select.min.js' )}}"></script>
  <script src="{{ asset( '/js/custom.js' )}}"></script>
  <script src="{{ asset( '/js/myajax.js' )}}"></script>
  <script src="{{ asset( '/js/menu.js' )}}"></script>
  @stack('custom-scripts')
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="34854152-12a2-4249-a54d-2ca0c3f03667" data-blockingmode="auto" type="text/javascript"></script>
  <script id="CookieDeclaration" src="https://consent.cookiebot.com/34854152-12a2-4249-a54d-2ca0c3f03667/cd.js" type="text/javascript" async></script>

</body>

</html>
