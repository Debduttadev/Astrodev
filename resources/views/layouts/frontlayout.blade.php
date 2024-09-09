<!DOCTYPE html>
<html lang="en">
@php
    $fullurl = Request::url();
    $appurl = URL::to('/');

    if ($fullurl == $appurl) {

        $seodetailsperpage = seodetailsperpage('home');

    } else {

        $page = str_replace($appurl, "", $fullurl);
        $urlname = explode("/", $page);
        $seodetailsperpage = seodetailsperpage(end($urlname));

    }
    //dd($seodetailsperpage['metadata']);
@endphp

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{ $seodetailsperpage['description']}}" />
    <meta name="keywords" content="{{ $seodetailsperpage['keyword']}}" />
    <meta name="author" content="Astro Achariya Debdutta|Sumita Das" />
    <!-- Title -->
    <title>{{ $seodetailsperpage['title'] }}</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::to('admin/img/llogoicon-01-01.png') }}" />

    @foreach ($seodetailsperpage['metadata'] as $metaseo)
        {!! $metaseo !!}
    @endforeach

    <!-- Bootstrap CSS -->
    <link href="{{ URL::to('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>

    <!-- CSS Files For Plugin -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="{{ URL::to('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::to('frontend/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('frontend/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/css/YTPlayer.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/inc/owlcarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/inc/owlcarousel/css/owl.theme.default.min.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ URL::to('frontend/css/style.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ URL::to('frontend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::to('frontend/bootstrap/js/bootstrap.min.js') }}"></script>


    <!-- date custom -->
    <link href="{{ URL::to('frontend/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

    <script src="{{ URL::to('frontend/js/moment.min.js') }}"></script>

    <script src="{{ URL::to('frontend/js/bootstrap-datetimepicker.min.js') }}"></script>

</head>

<body class="homepage_slider" data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100">
    <!-- Preloader -->
    <div id="preloader">
        <div id="spinner"></div>
    </div>
    <!-- End Preloader-->

    @stack('style')

    <style type="text/css">
        .blog-post-body {
            color: #fff5f5;
            background-color: #0c0808;
            height: 320px;
        }

        .blog-post-body a {
            color: #fff5f5;
        }

        .blog-post-body a:hover {
            color: #fff5f5;
        }

        .servicecss {
            background-color: #ffffff;
            font-size: 16px;
            color: #483120;
        }

        .servicebg {
            position: relative;
            width: 100% !important;
            bottom: auto;
            top: -145px;
        }

        .social {
            font-size: 18px;
            color: #000;
        }

        .twitter {
            height: 25px;
            width: 25px;
            position: relative;
            bottom: 3px;
        }

        /* .twitter {
            filter: sepia(100%);
        } */

        .parent {
            position: relative;
            top: 0;
            left: 0;
        }

        .image1 {
            position: relative;
            top: 0;
            left: 0;
            -webkit-animation: spin 50s linear infinite;
            -moz-animation: spin 50s linear infinite;
            animation: spin 50s linear infinite;
        }

        .image2 {
            position: absolute;
            width: 67%;
            top: 17%;
            left: 17%;
        }

        .logoimage1 {
            position: relative;
            top: 0;
            left: 0;
            -webkit-animation: spin 50s linear infinite;
            -moz-animation: spin 50s linear infinite;
            animation: spin 50s linear infinite;
        }

        .logoimage2 {
            position: absolute;
            width: 67%;
            top: 17%;
            left: 17%;
        }

        .logoimage3 {
            background-color: #000;
        }

        .servicebg {
            -webkit-animation: spin 14s linear infinite;
            -moz-animation: spin 14s linear infinite;
            animation: spin 14s linear infinite;
        }

        @-moz-keyframes spin {
            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .chamberlist {
            color: #160707;
        }

        .chamberlist h5 {
            font-size: 20px;
            color: #160707;
        }

        .footerlist div.listfooter a {
            font-size: 19px;
            line-height: 18px;
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
            width: 100%;
            display: block;
        }

        .aboutcss {
            background-color: #ffffff;
        }

        .myjourneyfont {
            font-family: "Poppins", sans-serif;
            font-size: smaller;
            color: #ff0000;
        }

        select.booking option {
            height: 50px;
        }

        .appoinmentcss {
            background-color: #fff;
            color: #160707;
        }

        .appoinmentcolor h2 {
            color: #160707;
        }

        .appoinmentcolor h3 {
            color: #160707;
        }

        .darkcolorfont {
            /* color: #160707; */
            color: #000;
        }

        .appoinmentsubmit {
            padding-left: 40%;
            padding-right: 40%;
        }

        .allblogsbutton {
            background-color: #ff0000;
        }

        .blogfilter {
            background-color: #ffe4ce;
            padding-top: 20px;
        }

        .contactsubmit {
            background-color: #100e0e;
            color: #ff3c00;
            font-size: larger;
            padding-left: 46%;
            padding-right: 46%;
        }

        .contactsubmit:focus {
            background-color: #100e0e;
            color: #ffffff !important;
        }


        form.formdata3 {
            font-size: 18px;
        }

        form div label {
            font-size: 16px;
            color: #fff;
        }

        #contact {
            background-color: #fff;
        }

        .carousel-caption {
            top: 20%;
            bottom: auto;
            right: auto;
            left: 18%;
            text-align: left;
            font-family: Cormorant;
        }

        .carousel-caption strong {
            font-family: Cormorant !important;
        }

        .carousel-caption h1 {
            color: #fff;
        }

        .aboutcss a {
            color: #ff0909
        }

        .aboutcss a:hover {
            color: #ff6b3b
        }

        @media (min-width:320px) {
            body {
                font-size: 12px;
            }

            .container {
                width: 300px;
            }

            .carousel-caption h1 {
                margin: -25px 0px;
            }

            .carousel-caption .astro {
                font-size: 14px;
            }

            .carousel-caption {
                top: -25px;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 14px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 12px;
                line-height: 0.3em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 15px !important;
                line-height: 0.5em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 12px;
                padding: 3px 12px;
                margin-top: -20px;
            }

            .carousel-caption p span a {
                margin-top: -20px;
                padding: 5px 12px;
            }

            .navbar-nav li a {
                font-size: 14px;
            }

            .servicebg {
                position: relative;
                width: 60%;
                bottom: auto;
                top: -100px;
            }

            .blog-post-body p {
                font-size: 15px;
            }

            .headerbookappointment {
                font-size: 12px;
                margin-left: 25px;
            }

            .headercall {
                font-size: 12px;
                margin-left: 25px;
            }

            footer.site-footer {
                padding-bottom: 80px !important;
            }

            .headersocial {
                display: none;
            }

            .logoimage1 {
                height: 150px;
                width: auto;
                margin-top: -80px;
                margin-left: -16%;
            }

            .logoimage2 {
                height: 140%;
                width: auto;
                margin-top: -65px;
                margin-left: -14%;
            }

            .nav-solid .navigation {
                height: 30px;
            }

            .nav-solid {
                height: 40px;
            }
        }

        @media (min-width: 576px) {
            body {
                font-size: 16px;
            }

            .container {
                width: 550px;
            }

            .carousel-caption h1 {
                margin: -7px 0px;
            }

            .carousel-caption .astro {
                font-size: 20px;
            }

            .carousel-caption {
                top: 6%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 20px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 14px;
                line-height: 0.5em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 17px !important;
                line-height: 0.5em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 14px;
                padding: 5px 12px;
                margin-top: -8px;

            }

            .carousel-caption p span a {
                margin-top: 8px;
                padding: 8px 26px;
            }

            .navbar-nav li a {
                font-size: 14px;
            }

            .servicebg {
                position: relative;
                width: 60%;
                bottom: auto;
                top: -180px;
            }

            .blog-post-body p {
                font-size: 15px;
            }

            .logoimage1 {
                height: 200px;
                width: auto;
                margin-top: -70px;
                margin-left: -15%;
            }

            .logoimage2 {
                height: 108%;
                width: auto;
                margin-top: -62px;
                margin-left: -12%;
            }

            .nav-solid .navigation {
                height: 60px;
            }

            .headercall {
                font-size: 14px;
                margin-left: 25px;
            }

            .headerbookappointment {
                font-size: 14px;
                margin-left: 25px;
            }

            .headersocial {
                display: block;
            }
        }

        @media (min-width: 768px) {

            body {
                font-size: 16px;
            }

            .servicebg {
                width: 100%;
                bottom: auto;
                top: -280px;
            }

            .container {
                width: 745px;
            }

            .carousel-caption h1 {
                margin: 8px 0px;
            }

            .carousel-caption .astro {
                font-size: 26px;
            }

            .carousel-caption {
                top: 6%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 26px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 18px;
                line-height: 0.7em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 18px !important;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 16px;
                padding: 5px 24px;
                margin-top: 8px;
            }

            .carousel-caption p span a {
                margin-top: 8px;
                padding: 2px 24px;
            }

            .navbar-nav li a {
                font-size: 14px;
            }

            navbar-header {
                width: 100%;
                padding-right: 8px;
                float: none;
            }

            .blog-post-body p {
                font-size: 15px;
            }

            .logoimage1 {
                height: 200px;
                width: auto;
                margin-top: -70px;
                margin-left: -15%;
            }

            .logoimage2 {
                height: 108%;
                width: auto;
                margin-top: -62px;
                margin-left: -12%;
            }

            .nav-solid .navigation {
                height: 60px;
            }

            .headercall {
                font-size: 16px;
                margin-left: 25px;
            }

            .headerbookappointment {
                font-size: 14px;
                margin-left: 25px;
            }
        }

        @media (min-width: 992px) {
            body {
                font-size: 18px;
            }

            .servicebg {
                width: 100%;
                bottom: auto;
                top: -110px;
            }

            .navbar-nav li a {
                font-size: 14px;
            }

            .container {
                width: 970px;
            }

            .carousel-caption .astro {
                font-size: 32px;
            }

            .carousel-caption h1 {
                margin: 12px 0px;
            }

            .carousel-caption {
                top: 10%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 28px;
                font-weight: 500;
            }

            .carousel-caption p {
                font-size: 20px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 20px !important;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 18px;
                padding: 5px 26px;
                margin-top: 8px;
            }

            .carousel-caption p span a {
                margin-top: 8px;
                padding: 5px 26px;
            }

            .blog-post-body p {
                font-size: 16px;
            }

            .logoimage1 {
                height: 200px;
                width: auto;
                margin-top: -70px;
                margin-left: -15%;
            }

            .logoimage2 {
                height: 108%;
                width: auto;
                margin-top: -62px;
                margin-left: -12%;
            }

            .nav-solid .navigation {
                height: 60px;
            }

            .headercall {
                font-size: 16px;
                margin-left: 25px;
            }

            .headerbookappointment {
                font-size: 14px;
                margin-left: 25px;
            }
        }

        @media (min-width: 1200px) {
            .servicebg {
                width: 100%;
                bottom: auto;
                top: -150px;
            }

            .container {
                width: 1170px;
            }

            .carousel-caption .astro {
                font-size: 40px;
            }

            .carousel-caption h1 {
                margin: 15px 0px;
            }

            .carousel-caption {
                top: 21%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 40px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 25px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 25px !important;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 20px;
                padding: 5px 26px;
                margin-top: 8px;
            }

            .carousel-caption p span a {
                font-size: 20px;
                margin-top: 8px;
                padding: 5px 26px;
            }

            .navbar-nav li a {
                font-size: 14px;
            }

            body {
                font-size: 16px;
            }

            .blog-post-body p {
                font-size: 17px;
            }

            .logoimage1 {
                height: 270px;
                width: auto;
                margin-top: -40%;
                margin-left: -15%;
            }

            .logoimage2 {
                height: 105%;
                width: auto;
                margin-top: -85px;
                margin-left: -12%;
            }

            .nav-solid .navigation {
                height: 60px;
            }

            .headercall {
                font-size: 16px;
                margin-left: 25px;
            }

            .headerbookappointment {
                font-size: 14px;
                margin-left: 25px;
            }
        }

        .headerbookappointment {
            background-color: #b4975d;
        }

        .carousel-caption a {
            font-family: 'Lato', sans-serif;
            display: block;
            width: max-content;
            height: auto;
            background: url(../frontend/img/Button-png.png) center;
            text-align: center;
            border: 1px solid #fff;
            border-radius: 4px;
            color: #fff;
            display: block;
        }

        .carousel-caption a:hover {
            color: #ffc6c6;
        }

        .footerlisting {
            background-color: #000 !important;
        }

        .checkoutimage {
            width: 20%;
            background-color: black;
        }

        .chackoutlist .list-group-item {
            background-color: #faf0e6;
            border: none;
        }

        .vl {
            border-left: 6px solid black;
            height: 20px;
        }

        .headerbookappointment {
            padding: 2px 12px;
        }
    </style>
    @include('element.frontheader')
    <!-- Start Intro -->


    <!-- Main content -->
    @yield('content')
    @include('element.frontfooter')

    <!-- Back to top -->
    @include('element.frontmodal')


    <!-- Components Plugin -->
    <script src="{{ URL::to('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::to('frontend/js/smooth-scroll.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.countTo.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ URL::to('frontend/js/retina.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/wow.min.js') }}"></script>
    <script src="{{ URL::to('frontend/inc/owlcarousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ URL::to('frontend/js/contact.js') }}"></script>

    <!-- Custom Plugin -->
    <script src="{{ URL::to('frontend/js/custom.js') }}"></script>
    @stack('scripts')
    @include('element.frontjquery')

</body>



</html>