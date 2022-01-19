<div class="offcanvas_overlay"></div>
<header class="header_part classic_header menu_padding position_abs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg justify-content-between align-items-center">
                    <a class="navbar-brand main_logo" href="/">
                        <img src="/img/mistmeals_logo_white.png" srcset="img/mistmeals_logo_white.png 2x" alt="logo" width="52px">
                    </a>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.menu') }}" aria-haspopup="true" aria-expanded="false">
                                    Plan semanal
                                </a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link" href="https://blog.mistmeals.com" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.revolucion') }}" aria-haspopup="true" aria-expanded="false">
                                    La Revolución
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('web.contacto') }}" aria-haspopup="true" aria-expanded="false">
                                    Contacto
                                </a>
                            </li>
                            <li class="nav-item d-lg-none d-block">
                                @if (!auth()->check())
                                    <button class="cu_btn btn_2 animate_btn text-uppercase w-100" style="color: #F9F2E1;" data-toggle="modal" data-target="#login-modal">Iniciar sesión</button>
                                @elseif(auth()->check() && !\App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
                                    <a href="{{ route('web.user.profile') }}" class="cu_btn btn_2 animate_btn text-uppercase w-100" style="color: #F9F2E1;" data-toggle="tooltip" data-placement="bottom" title="Editar datos usuario">{!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}</a>

                                    <div class="social_icon float-none text-center">
                                        <a href="{{ route('web.user.logout') }}" style="color: #F9F2E1;" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"><i class="icon feather icon-log-out"></i></a>
                                    </div>
                                @elseif(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
                                    <div class="social_icon float-none text-center">
                                        <a href="{{ route('web.user.logout') }}" style="color: #F9F2E1;" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"><i class="icon feather icon-log-out"></i></a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                        @if (!auth()->check())
                            <a href="{{ route('web.user.login.form') }}" class="mist_btn animate_btn text-uppercase d-lg-block ml-5">Iniciar sesión</a>
                        @elseif(auth()->check() && !\App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
                            <a href="{{ route('web.user.profile') }}" class="mist_btn animate_btn text-uppercase d-none d-lg-block ml-5" data-toggle="tooltip" data-placement="bottom" title="Editar datos usuario">{!! \App\Models\User::findOrFail(auth()->user()->id)->name !!}</a>

                            <div class="social_icon">
                                <a href="{{ route('web.user.logout') }}" style="color: #F9F2E1;" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"><i class="icon feather icon-log-out"></i></a>
                            </div>
                        @elseif(auth()->check() && \App\Models\User::findOrFail(auth()->user()->id)->isAdmin())
                            <div class="social_icon">
                                <a href="{{ route('web.user.logout') }}" style="color: #F9F2E1;" data-toggle="tooltip" data-placement="bottom" title="Cerrar sesión"><i class="icon feather icon-log-out"></i></a>
                            </div>
                        @endif
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</header>
