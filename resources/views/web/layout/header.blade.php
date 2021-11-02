<div class="offcanvas_overlay"></div>
<header>
  <nav class="">
    <a href="/">
      <img class="logo" src="/img/menu/mistmeals_logo_white.svg" srcset="/img/menu/mistmeals_logo_white.svg 2x" alt="logo">
    </a>

    <div>
      @inject('cartService','App\Services\CartService')
      <a class="menu-cart-btn-mobile" href="{{ route('web.carts.index') }}" class="menu-i"><img src="/img/menu/Icon/cart.svg" style="margin-top: -5px;">
        <p>{{ $cartService->countProducts() }}</p>
      </a>
    </div>
    <ul class="menu">
      <li><a href="{{ route('web.menu') }}" class="menu-i">Meal Plan</a></li>
      <li><a href="{{ route('web.platos') }}" class="menu-i">Platos</a></li>
      <li><a href="{{ route('web.comofunciona') }}" class="menu-i">Cómo funciona</a></li>
      <li><a href="{{ route('web.revolucion') }}" class="menu-i">La Revolución</a></li>
      <li><a href="https://www.blog.mistmeals.com" class="menu-i">Blog</a></li>
      <li class="menu-separation"><a href="{{ route('web.contacto') }}" class="menu-i">Contacto</a></li>
      @if (!auth()->check())

      <li class="session">
        <a href="{{ route('web.user.login') }}">
          <img style="width: 24px; height: 24px;" src="/img/menu/Icon/User.svg" />
          <p class="mp-desktop-hidden">INICIA SESIÓN</p>
        </a>
      </li>

      @elseif(auth()->check() && !\App\Models\User::findOrFail(auth()->user()->id)->isAdmin())

      <li class="session">
        <a href="{{ route('web.user.profile') }}">
          {!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}
          <img style="width: 24px; height: 24px;" src="/img/menu/Icon/User.svg" />
        </a>
      </li>
      <li class="logout">
        <a href="{{ route('web.user.logout') }}" title="Cerrar sesión" class="menu-i mp-desktop-hidden" style="color: #FF0033; font-size: 12px;">CERRAR SESIÓN</a>
      </li>
      @elseif(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
      <li class="session">
        <a href="{{ route('web.user.profile') }}" style="color: #F9F2E1;">
          <img style="width: 24px; height: 24px;" src="/img/menu/Icon/User.svg" />
          {!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}
        </a>
      </li>
      <li class="logout">
        <a href="{{ route('web.user.logout') }}" title="Cerrar sesión" class="menu-i mp-desktop-hidden" style="color: #FF0033; font-size: 12px;">CERRAR SESIÓN</a>
      </li>
      @endif
      <li>
        @inject('cartService','App\Services\CartService')
        <a class="menu-cart-btn" href="{{ route('web.carts.index') }}" class="menu-i"><img src="/img/menu/Icon/cart.svg" style="margin-top: -5px;">
          <p>{{ $cartService->countProducts() }}</p>
        </a>
      </li>
      @if(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
      <li><a href="{{ route('admin.home') }}" class="menu-i"><img style="width: 20px; height: 20px; margin-top: -5px;" src="/img/menu/settings.png" alt=""></a></li>
      @endif
    </ul>
    <img class="mistmeals-general-menu-btn" src="/img/mmenu.png">
  </nav>
</header>
