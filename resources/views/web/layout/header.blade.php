<div class="offcanvas_overlay"></div>
<header>
    <nav class="">
        <a href="/">
            <img class="logo" src="/img/mistmeals_logo_white.png" srcset="/img/mistmeals_logo_white.png 2x" alt="logo">
        </a>

            <div>
                @inject('cartService','App\Services\CartService')
                <a class="menu-cart-btn-mobile" href="{{ route('web.carts.index') }}" class="menu-i"><img src="/img/menu/Icon/cart.png" style="margin-top: -5px;"><p>{{ $cartService->countProducts() }}</p></a>
            </div>
        <ul class="menu">
            <li><a href="{{ route('web.menu') }}" class="menu-i">Meal Plan</a></li>
            <li><a href="{{ route('web.platos') }}" class="menu-i">Platos</a></li>
            <li><a href="{{ route('web.revolucion') }}" class="menu-i">La Revolución</a></li>
            <li><a href="{{ route('web.contacto') }}" class="menu-i">Contacto</a></li>
            <li class="session">
                @if (!auth()->check())

                <a class="bg-btn" href="{{ route('web.user.login') }}">
                    Iniciar sesión
                </a>

                @elseif(auth()->check() && !\App\Models\User::findOrFail(auth()->user()->id)->isAdmin())

                <a href="{{ route('web.user.profile') }}" class="bg-btn">
                    {!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}
                </a>

                <div class="logout">
                    <a href="{{ route('web.user.logout') }}" title="Cerrar sesión" class="menu-i"><i class="icon feather icon-log-out"></i></a>
                </div>
                @elseif(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())

                <a href="{{ route('web.user.profile') }}" class="bg-btn">
                    {!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}
                </a>

                <div class="logout">
                    <a href="{{ route('web.user.logout') }}" title="Cerrar sesión" class="menu-i"><i class="icon feather icon-log-out"></i></a>
                </div>
                @endif
            </li>
            <li>
                @inject('cartService','App\Services\CartService')
                <a class="menu-cart-btn" href="{{ route('web.carts.index') }}" class="menu-i"><img src="/img/menu/Icon/cart.png" style="margin-top: -5px;"><p>{{ $cartService->countProducts() }}</p></a>
            </li>
            @if(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
            <li><a href="{{ route('admin.home') }}" class="menu-i"><img style="width: 20px; height: 20px; margin-top: -5px;" src="/img/menu/settings.png" alt=""></a></li>
            @endif
        </ul>
        <div class="menu-btn">

        </div>
    </nav>
</header>
