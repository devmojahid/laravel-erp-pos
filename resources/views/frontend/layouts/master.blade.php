<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') < {{ env('APP_NAME') }}</title>

            <link rel="icon" type="image/x-icon" href="favicon.png">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/all.min.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/flaticon/flaticon.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/nice-select.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/flags.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/slick.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/vendor/css/meanmenu.css">
            <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
</head>

<body class="rev-5-body">
    <!-- preloader begin -->
    {{-- @include('frontend.layouts.partials.preloader') --}}
    <!-- preloader end -->


    <!--------------------------------- PRODUCT QUICK VIEW PANEL START --------------------------------->
    @include('frontend.layouts.partials.product-quick')
    <!--------------------------------- PRODUCT QUICK VIEW PANEL END --------------------------------->



    <!--------------------------------- HEADER CART LIST START --------------------------------->
    @include('frontend.layouts.partials.cart-offcanvas')
    <!--------------------------------- HEADER CART LIST END --------------------------------->



    <!--------------------------------- HEADER WISH LIST START --------------------------------->
    @include('frontend.layouts.partials.wishlist-offcanvas')
    <!--------------------------------- HEADER WISH LIST END --------------------------------->


    <!--------------------------------- HEADER SECTION START --------------------------------->
    @include('frontend.layouts.partials.menu')
    <!--------------------------------- HEADER SECTION END --------------------------------->


    <!--------------------------------- MOBILE MENU START --------------------------------->
    @include('frontend.layouts.partials.mobile-menu')
    <!--------------------------------- MOBILE MENU END --------------------------------->

    @yield('content')

    <!--------------------------------- FOOTER SECTION START --------------------------------->
    @include('frontend.layouts.partials.footer')
    <!--------------------------------- FOOTER SECTION END --------------------------------->


    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery.flagstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery.meanmenu.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery.syotimer.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/jquery-modal-video.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/vendor/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/main.js"></script>
    @stack('scripts')
</body>

</html>
