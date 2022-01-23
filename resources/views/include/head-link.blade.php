<head>
	<title>Florida Calling | @yield('title')</title>
	<!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ @csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('front_component/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/css/font-mytravel.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/hs-megamenu/src/hs.megamenu.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_component/vendor/fancybox/jquery.fancybox.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('front_component/vendor/jquery-ui/themes/base/jquery-ui.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('front_component/vendor/prism/prism.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('front_component/vendor/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/flatpickr/dist/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/dzsparallaxer/dzsparallaxer.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/vendor/custombox/dist/custombox.min.css')}}">
    <!-- CSS MyTravel Template -->
    <link rel="stylesheet" href="{{asset('front_component/css/theme.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    
    <!--  Jquery Slider -->
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
    <!-- Custum css -->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_component/css/custom.css')}}">
    @stack('custom-styles')
</head>