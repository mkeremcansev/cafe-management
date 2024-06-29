<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Rymark Cafe Management System">
    <meta name="author" content="Rymark Works">
    <meta name="keywords" content="cafe, management, cafe-management, cafe-system">
    <meta name="robots" content="noindex,nofollow">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/facivon.png') }}"/>

    <!-- TITLE -->
    <title>{{ config('app.name') }} - @lang('words.menu.login')</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet"/>

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

    <!-- TOASTER CSS -->
    <link href="{{ asset('assets/css/toastr/toastr.min.css') }}" rel="stylesheet" />
</head>

<body class="ltr login-img">

<!-- GLOABAL LOADER -->
<div id="global-loader">
    <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
</div>
<!-- /GLOABAL LOADER -->

<!-- PAGE -->
<div class="page">
    <div>
        <!-- CONTAINER OPEN -->
        <div class="container-login100">
            <div class="wrap-login100 p-0">
                <div class="card-body">
                    <form class="login100-form validate-form" action="{{ route('auth.authenticate') }}" method="POST">
                        @csrf
                        <span class="login100-form-title">@lang('words.menu.login')</span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="email" placeholder="@lang('words.fields.user.email')">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" name="password" placeholder="@lang('words.fields.user.password')">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn btn-primary">
                                @lang('words.menu.login')
                            </button>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">@lang('words.content.are_u_have_not_a_account')</p>
                        </div>
                        <div class="container-login100-form-btn">
                            <a href="{{ route('auth.register') }}" class="login100-form-btn btn-danger">
                                @lang('words.menu.register')
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!-- End PAGE -->


<!-- BACKGROUND-IMAGE CLOSED -->

<!-- JQUERY JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

<!-- STICKY JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- COLOR THEME JS -->
<script src="{{ asset('assets/js/themeColors.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- TOASTER JS -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

<!-- Include this after the toastr js file -->
@include('includes.scripts.toastr')
</body>
</html>
