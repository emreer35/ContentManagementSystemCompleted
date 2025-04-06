<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $defaultSeo['meta_description'] }}">

    <!-- ========== Page Title ========== -->
    <title>{{ $defaultSeo['site_title'] }}</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/elegant-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/assets/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('/frontend/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend/assets/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&displa`y=swap" rel="stylesheet">

</head>

<body>

    @include('frontend.components.preloader')

    @php
        $currentPage = 'Anasayfa Sablonu';
    @endphp
‹
    @if (isset($pages[$currentPage]))
        @foreach ($pages[$currentPage] as $component)
            @if (isset($componentPath[$component['name']]))
                @include($componentPath[$component['name']] . $component['version'] . '.' . $component['name']);
            @endif
        @endforeach 
    @endif

    <!-- Header
    ============================================= -->
    {{-- @include('frontend.layouts.utils.v' . $webSettings['navbar'] . '.header') --}}
    <!-- End Header -->

    <!-- Start Banner
    ============================================= -->
    {{-- @include('frontend.layouts.utils.v' . $webSettings['theme'] . '.banner') --}}
    <!-- End Banner -->

    <!-- Start Our About
    ============================================= -->
    {{-- @include('frontend.components.v' . $webSettings['theme'] . '.about') --}}
    <!-- End Our About -->

    <!-- Start Our Services
    ============================================= -->
    {{-- @include('frontend.components.v' . $webSettings['theme'] . '.services') --}}
    <!-- End Our Services -->

    <!-- Start Why Choose Us
    ============================================= -->
    {{-- @include('frontend.components.v1.choose') --}}
    <!-- End Why Choose Us -->

    <!-- Start Fun Fact Area
    ============================================= -->
    {{-- @include('frontend.components.v1.fun-fact') --}}
    <!-- End Fun Fact Area -->

    <!-- Star Team Area
    ============================================= -->
    {{-- @include('frontend.components.v1.team') --}}
    <!-- End Team Area -->

    <!-- Star Blog Area
    ============================================= -->
    {{-- @include('frontend.components.v1.blog') --}}
    <!-- End Blog Area -->

    <!-- Start Contact Area
    ============================================= -->
    {{-- @include('frontend.components.v1.contact') --}}
    <!-- End Contact Area -->

    <!-- Star Google Maps
    ============================================= -->
    {{-- @include('frontend.components.v1.google-maps') --}}
    <!-- End Google Maps -->

    <!-- Star Footer
    ============================================= -->
    {{-- @include('frontend.layouts.utils.v1.footer') --}}
    <!-- End Footer-->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('/frontend/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('/frontend/assets/js/main.js') }}"></script>

</body>

</html>
