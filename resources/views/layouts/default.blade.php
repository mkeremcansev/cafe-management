<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

@include('includes.head')
<body class="ltr app sidebar-mini dark-mode">

<!-- GLOBAL-LOADER -->
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">
        <!-- app-Header -->
        @include('includes.header')
        <!-- /app-Header -->

        <!--APP-SIDEBAR-->
        @include('includes.sidebar')
        <!--/APP-SIDEBAR-->

        <!--app-content open-->
        <div class="app-content main-content mt-0">
            <div class="side-app">
                <!-- CONTAINER -->
                <div class="main-container container-fluid">
                    <!-- ROW-1 -->
                    @yield('content')
                    <!-- ROW-1 END-->

                </div>
            </div>
        </div>
        <!-- CONTAINER END -->
    </div>

    <!-- FOOTER -->
    @include('includes.footer')
    <!-- FOOTER END -->
</div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

<!-- JQUERY JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- money JS -->
<script src="{{ asset('assets/plugins/money/jquery.masknumber.js') }}"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- SIDE-MENU JS-->
<script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- APEXCHART JS -->
<script src="{{ asset('assets/js/apexcharts.js') }}"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

<!-- INDEX JS -->
<script src="{{ asset('assets/js/index1.js') }}"></script>

<!-- REPLY JS-->
<script src="{{ asset('assets/js/reply.js') }}"></script>

<!-- PERFECT SCROLLBAR JS-->
<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>

<!-- STICKY JS -->
<script src="{{ asset('assets/js/sticky.js') }}"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

@stack('scripts')

<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

<!-- Include this after the toastr js file -->
@include('includes.scripts.toastr')
</body>

</html>
