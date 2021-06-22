<div class="offcanvas_overlay"></div>
<header>
    <nav class="">
        <a href="/">
            <img class="logo" src="/img/mistmeals_logo_white.png" srcset="/img/mistmeals_logo_white.png 2x" alt="logo">
        </a>
        <ul class="menu">
            <li><a href="{{ route('web.menu') }}" class="menu-i">Meal Plan</a></li>
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
                    <a href="{{ route('web.user.logout') }}"  title="Cerrar sesión" class="menu-i"><i class="icon feather icon-log-out"></i></a>
                </div>
                @elseif(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
                <div class="logout">
                    <a href="{{ route('web.user.logout') }}" title="Cerrar sesión" class="menu-i"><i class="icon feather icon-log-out"></i></a>
                </div>
                @endif
            </li>
        </ul>
        <div class="menu-btn">

        </div>
    </nav>
</header>
