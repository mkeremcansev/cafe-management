<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="#"></a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal" href="{{ route('dashboard.home') }}">
                <div class="d-flex justify-content-center">
                    <h3 class="text-white">{{ config('app.name') }}</h3>
                </div>
            </a>
            <!-- LOGO -->
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <!-- COUNTRY -->
                            <!-- SEARCH -->
                            <!-- Theme-Layout -->
                            <!-- SHORTCUTS -->
                            <!-- FULL-SCREEN -->
                            <!-- CART -->
                            <!-- Messages-->
                            <div class="dropdown d-md-flex notifications">
                                <a class="nav-link icon" data-bs-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class=" pulse"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-popper="none">
                                    <div class="drop-heading border-bottom">
                                        <div class="d-flex">
                                            <h6 class="mt-1 mb-0 fs-15 text-dark">{{ config('app.name') }}</h6>
                                        </div>
                                    </div>
                                    <div class="notifications-menu ps3 overflow-hidden ps">
                                        <div class="dropdown-item">
                                            <div class="notification-each d-flex">
                                                <div class="me-3 notifyimg  bg-primary brround">
                                                    <i class="fa fa-bullhorn"></i>
                                                </div>
                                                <div>
                                                    <span class="notification-label mb-1">@lang('words.release_announcements.1_0_0')</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- NOTIFICATIONS -->
                            <div class="dropdown d-md-flex profile-1">
                                <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
												<span>
													<img
                                                        src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                                        alt="profile-user"
                                                        class="avatar  profile-user brround cover-image">
												</span>
                                    <div class="text-center p-1 d-flex d-lg-none-max">
                                        <h6 class="mb-0" id="profile-heading">{{ auth()->user()->name }}<i
                                                class="user-angle ms-1 fa fa-angle-down "></i></h6>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    @if(auth()->user()->is_owner === true)
                                        <a class="dropdown-item"
                                           href="{{ route('dashboard.companies.edit', auth()->user()->company_id) }}">
                                            <i class="fa fa-compress fs-18"></i>
                                            <span>@lang('words.menu.company.edit')</span>
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('dashboard.logout') }}">
                                        <i class="fa fa-sign-out fs-18"></i>
                                        <span>@lang('words.menu.logout')</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Profile -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
