<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>@yield('title')</title>
    <meta name="keywords"
        content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, frontends" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('frontend/assets/images/favicon/favicon.png')}}" sizes="32x32" />
    <link rel="apple-touch-icon" href="{{asset('frontend/assets/images/favicon/favicon.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('frontend/assets/images/favicon/favicon.png')}}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/vendor/ecicons.min.css')}}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/bootstrap.css')}}" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/demo1.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{asset('frontend/assets/css/backgrounds/bg-4.css')}}">
</head>

<body>



    <div id="ec-overlay">
        <div class="ec-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Header start  -->
    @include('partials.frontend.header')
    <!-- Header End  -->

    @yield('content')


    <!-- ekka Cart Start -->
    @include('partials.frontend.cart_sidebar')
    <!-- ekka Cart End -->

    <!-- Category Sidebar start -->
    @include('partials.frontend.category_sidebar')

    {{-- @yield('content') --}}

    <!-- Footer Start -->
    @include('partials.frontend.footer')

    <!-- Footer Area End -->

    @include('partials.frontend.extra_popups')

    <script src="{{ asset('frontend/assets/js/vendor/flasher.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/flasher.min.css') }}">
    <!-- Vendor JS -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

    <!--Plugins JS-->
    <script src="{{asset('frontend/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/countdownTimer.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/infiniteslidev2.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>

    <!-- Main Js -->
    <script src="{{asset('frontend/assets/js/vendor/index.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
    @include('partials.combine.flash-messages')
</body>


</html>