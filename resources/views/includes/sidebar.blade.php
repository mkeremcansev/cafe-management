<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('assets') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('assets') }}/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets') }}/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
            </a><!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <ul class="side-menu pt-4">
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{ route('dashboard.home') }}">
                        <i class="fa fa-home side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.home')</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-pie-chart side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.category.category')</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('dashboard.categories.index') }}" class="slide-item">@lang('words.menu.category.index')</a></li>
                        <li><a href="{{ route('dashboard.categories.create') }}" class="slide-item">@lang('words.menu.category.create')</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#">
                        <i class="fa fa-cube side-menu__icon" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-home" aria-label="fa fa-home"></i>
                        <span class="side-menu__label">@lang('words.menu.product.product')</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('dashboard.products.index') }}" class="slide-item">@lang('words.menu.product.index')</a></li>
                        <li><a href="{{ route('dashboard.products.create') }}" class="slide-item">@lang('words.menu.product.create')</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
