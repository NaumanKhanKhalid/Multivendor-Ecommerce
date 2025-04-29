<!DOCTYPE html>
<html lang="en" dir="ltr">

@php
    $user = Auth::user();
@endphp

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

    <title>@yield('title')</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

    <!-- Data Tables -->
    <link href='{{ asset('backend/assets/plugins/data-tables/datatables.bootstrap5.min.css')}}' rel='stylesheet'>
    <link href='{{ asset('backend/assets/plugins/data-tables/responsive.datatables.min.css')}}' rel='stylesheet'>

    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{ asset('backend/assets/css/ekka.css')}}" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="{{ asset('backend/assets/img/favicon.png')}}" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        @include('partials.backend.sidebar')


        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            @include('partials.backend.header')
            <!-- CONTENT WRAPPER -->

            @yield('content')
            <!-- Footer -->
            @include('partials.backend.footer')



        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->
    <script src="{{ asset('backend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('backend/assets/js/flasher.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/flasher.min.css') }}">
    <!-- Common Javascript -->
    <script src="{{ asset('backend/assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/slick/slick.min.js')}}"></script>

    <!-- Chart -->
    <script src="{{ asset('backend/assets/plugins/charts/Chart.min.js')}}"></script>
    <script src="{{ asset('backend/assets/js/chart.js')}}"></script>

    <!-- Google map chart -->
    <script src="{{ asset('backend/assets/plugins/charts/google-map-loader.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/charts/google-map.js')}}"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('backend/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('backend/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('backend/assets/js/date-range.js')}}"></script>

    <script src='{{ asset('backend/assets/plugins/data-tables/jquery.datatables.min.js')}}'></script>
    <script src='{{ asset('backend/assets/plugins/data-tables/datatables.bootstrap5.min.js')}}'></script>
    <script src='{{ asset('backend/assets/plugins/data-tables/datatables.responsive.min.js')}}'></script>

    <!-- Option Switcher -->
    <script src="{{ asset('backend/assets/plugins/options-sidebar/optionswitcher.js')}}"></script>

    <!-- Ekka Custom -->
    <script src="{{ asset('backend/assets/js/ekka.js')}}"></script>
    @include('partials.combine.flash-messages')

    @stack('scripts')
</body>



</html>