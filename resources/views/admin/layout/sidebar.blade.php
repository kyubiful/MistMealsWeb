<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/" class="sidebar-brand">
            Mist<span>Meals</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Principal</li>
            <li class="nav-item {{ active_class(['admin/dashboard*']) }}">
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">{{ trans('admin.menu.dashboard') }}</span>
                </a>
            </li>

            <li class="nav-item nav-category">Configuración</li>
            <li class="nav-item {{ active_class(['admin/plato*']) }}">
                <a href="{{ url('/admin/plato') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">{{ trans('admin.menu.platos') }}</span>
                </a>
            </li>
            {{--<li class="nav-item {{ active_class(['admin/menu*']) }}">
                <a href="{{ url('/admin/menu') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">{{ trans('admin.menu.menus') }}</span>
                </a>us
            </li>--}}
            <li class="nav-item {{ active_class(['admin/config*']) }}">
                <a href="{{ url('/admin/config') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">{{ trans('admin.menu.config') }}</span>
                </a>
            </li>

            <li class="nav-item nav-category">Datos</li>
            <li class="nav-item {{ active_class(['admin/user*']) }}">
                <a href="{{ url('/admin/user') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">{{ trans('admin.menu.users') }}</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['admin/sugerencia*']) }}">
                <a href="{{ url('/admin/sugerencia') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">{{ trans('admin.menu.suggestions') }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
