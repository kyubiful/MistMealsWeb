<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@lang('global.project.title')</title>
    <link rel="icon" href="{{ asset( '/img/favicon_mistmeals.png' )}}" type="image/png">
    <link rel="stylesheet" href="{{ asset( '/css/bootstrap.min.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/css/animate.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/vendors/themify_icons/themify-icons.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/vendors/owl_carousel/css/owl.carousel.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/vendors/niceselect/css/nice-select.css' )}}" />
    <link rel="stylesheet" href="{{ asset( '/vendors/flatIcon/flaticon.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/css/style.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/css/mystyle.css' )}}"/>
    <link rel="stylesheet" href="{{ asset( '/assets/fonts/feather-font/css/iconfont.css' )}}"/>
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="34854152-12a2-4249-a54d-2ca0c3f03667" data-blockingmode="auto" type="text/javascript"></script>
</head>

<body class="{{ isset($bodyclass) ? $bodyclass : '' }}">
<div class="preloader-wrapper" id="preloader-wrapper">
    <div class="percentage-wrapper">
        <div class="loadbar-percent"></div>
        <div id="percent"></div>
    </div>
</div>

@include('web.layout.header')
@yield('content')
@include('web.layout.modal')
@include('web.layout.footer')

<script id="CookieDeclaration" src="https://consent.cookiebot.com/34854152-12a2-4249-a54d-2ca0c3f03667/cd.js" type="text/javascript" async></script>
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

</body>

</html>
