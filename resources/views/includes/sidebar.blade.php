<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="{{ route('dashboard.home') }}">
                <h3 class="text-white">{{ config('app.name') }}</h3>
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <ul class="side-menu pt-4">
                <li class="slide">
                    <a class="side-menu__item has-link @if(request()->routeIs('dashboard.home')) active @endif" data-bs-toggle="slide" href="{{ route('dashboard.home') }}">
                        <i class="fa fa-home side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.home')</span>
                    </a>
                </li>
                <li class="slide @if(request()->routeIs('dashboard.categories.index', 'dashboard.categories.create')) is-expanded @endif">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-pie-chart side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.category.category')</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('dashboard.categories.index') }}" class="slide-item @if(request()->routeIs('dashboard.categories.index')) active @endif">@lang('words.menu.category.index')</a></li>
                        <li><a href="{{ route('dashboard.categories.create') }}" class="slide-item @if(request()->routeIs('dashboard.categories.create')) active @endif">@lang('words.menu.category.create')</a></li>
                    </ul>
                </li>
                <li class="slide @if(request()->routeIs('dashboard.products.index', 'dashboard.products.create')) is-expanded @endif">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-cube side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.product.product')</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('dashboard.products.index') }}" class="slide-item @if(request()->routeIs('dashboard.products.index')) active @endif">@lang('words.menu.product.index')</a></li>
                        <li><a href="{{ route('dashboard.products.create') }}" class="slide-item @if(request()->routeIs('dashboard.products.create')) active @endif">@lang('words.menu.product.create')</a></li>
                    </ul>
                </li>
                <li class="slide @if(request()->routeIs('dashboard.tables.index', 'dashboard.tables.create')) is-expanded @endif">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-table side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.table.table')</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('dashboard.tables.index') }}" class="slide-item @if(request()->routeIs('dashboard.tables.index')) active @endif">@lang('words.menu.table.index')</a></li>
                        <li><a href="{{ route('dashboard.tables.create') }}" class="slide-item @if(request()->routeIs('dashboard.tables.create')) active @endif">@lang('words.menu.table.create')</a></li>
                    </ul>
                </li>
                @if(auth()->user()->is_owner === true)
                    <li class="slide @if(request()->routeIs('dashboard.users.index', 'dashboard.users.create')) is-expanded @endif">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#">
                            <i class="fa fa-user side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                            <span class="side-menu__label">@lang('words.menu.user.user')</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li><a href="{{ route('dashboard.users.index') }}" class="slide-item @if(request()->routeIs('dashboard.users.index')) active @endif">@lang('words.menu.user.index')</a></li>
                            <li><a href="{{ route('dashboard.users.create') }}" class="slide-item @if(request()->routeIs('dashboard.users.create')) active @endif">@lang('words.menu.user.create')</a></li>
                        </ul>
                    </li>
                @endif

                <li class="slide">
                    <a class="side-menu__item has-link @if(request()->routeIs('dashboard.reports')) active @endif" data-bs-toggle="slide" href="{{ route('dashboard.reports') }}">
                        <i class="fa fa-area-chart side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.report.index')</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
