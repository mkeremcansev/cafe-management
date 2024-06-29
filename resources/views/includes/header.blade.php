
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
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M18,14.1V10c0-3.1-2.4-5.7-5.5-6V2.5C12.5,2.2,12.3,2,12,2s-0.5,0.2-0.5,0.5V4C8.4,4.3,6,6.9,6,10v4.1c-1.1,0.2-2,1.2-2,2.4v2C4,18.8,4.2,19,4.5,19h3.7c0.5,1.7,2,3,3.8,3c1.8,0,3.4-1.3,3.8-3h3.7c0.3,0,0.5-0.2,0.5-0.5v-2C20,15.3,19.1,14.3,18,14.1z M7,10c0-2.8,2.2-5,5-5s5,2.2,5,5v4H7V10z M13,20.8c-1.6,0.5-3.3-0.3-3.8-1.8h5.6C14.5,19.9,13.8,20.5,13,20.8z M19,18H5v-1.5C5,15.7,5.7,15,6.5,15h11c0.8,0,1.5,0.7,1.5,1.5V18z"/></svg>
                                    <span class=" pulse"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading border-bottom">
                                        <div class="d-flex">
                                            <h6 class="mt-1 mb-0 fs-15 text-dark">{{ config('app.name') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- NOTIFICATIONS -->
                            <div class="dropdown d-md-flex profile-1">
                                <a href="#" data-bs-toggle="dropdown" class="nav-link pe-2 leading-none d-flex animate">
												<span>
													<img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="profile-user"
                                                         class="avatar  profile-user brround cover-image">
												</span>
                                    <div class="text-center p-1 d-flex d-lg-none-max">
                                        <h6 class="mb-0" id="profile-heading">{{ auth()->user()->name }}<i class="user-angle ms-1 fa fa-angle-down "></i></h6>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
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
