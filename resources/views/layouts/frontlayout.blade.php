<!DOCTYPE html>
<html lang="en">
@php
$fullurl= Request::url();
$appurl=URL::to('/');

if($fullurl == $appurl){

$seodetailsperpage = seodetailsperpage('home');

}else{

$page=str_replace($appurl,"",$fullurl);
$urlname=explode("/",$page);
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

    @foreach ($seodetailsperpage['metadata'] as $metaseo )
    {!! $metaseo !!}
    @endforeach

    <!-- Bootstrap CSS -->
    <link href="{{ URL::to('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <!-- CSS Files For Plugin -->
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
            font-size: 20px;
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
            -webkit-animation: spin 15s linear infinite;
            -moz-animation: spin 15s linear infinite;
            animation: spin 15s linear infinite;
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

        .image2 {
            position: absolute;
            width: 67%;
            top: 17%;
            left: 17%;
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
            background-color: #ff0000;
            color: #fff;
            padding-left: 45%;
            padding-right: 45%;
        }

        .allblogsbutton {
            background-color: #ff0000;
        }

        .blogfilter {
            background-color: #ffe4ce;
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

            .carousel-caption h1 {
                /* margin: -10px 0px !important; */
                margin: -10px 0px;
            }

            .carousel-caption p span a {
                /* margin-top: 8px !important;
                padding: 8px 26px !important; */
                margin-top: 8px;
                padding: 8px 26px;
            }

            .carousel-caption .astro {
                font-size: 20px;
            }

            .carousel-caption {
                top: 1%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 20px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 12px;
                line-height: 0.3em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                /* font-size: 17px !important; */
                font-size: 17px;
                line-height: 0.5em;
                margin-top: 15px;
            }

            .carousel-caption a {
                /* font-size: 12px !important;
                padding: 3px 12px !important;
                margin-top: -8px !important; */
                font-size: 12px;
                padding: 3px 12px;
                margin-top: -8px;
            }

            .servicebg {
                position: relative;
                /* width: 60% !important; */
                width: 60%;
                bottom: auto;
                top: -145px;
            }
        }

        @media (min-width: 576px) {
            .container {
                width: 550px;
            }

            .carousel-caption h1 {
                /* margin: -7px 0px !important; */
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
                /* font-size: 17px !important; */
                font-size: 17px;
                line-height: 0.5em;
                margin-top: 15px;
            }

            .carousel-caption a {
                /* font-size: 12px !important;
                padding: 5px 12px !important; */
                font-size: 12px;
                padding: 5px 12px;

            }

            .servicebg {
                position: relative;
                /* width: 60% !important; */
                width: 60%;
                bottom: auto;
                top: -145px;
            }
        }

        @media (min-width: 768px) {

            .container {
                width: 750px;
            }

            .servicebg {
                width: 100%;
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
                /* font-size: 18px !important; */
                font-size: 18px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 16px;

            }

            .navbar-nav li a {
                font-size: 20px;
            }

            navbar-header {
                width: 100%;
                /* padding-right: 8px !important; */
                padding-right: 8px;
                float: none;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 970px;
            }

            .carousel-caption .astro {
                font-size: 32px;
            }

            .servicebg {
                width: 100%;
            }

            .navbar-nav li a {
                font-size: 17px;
            }

            .carousel-caption {
                top: 16%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 28px;
            }

            .carousel-caption p {
                /* font-size: 20px !important; */
                font-size: 20px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                /* font-size: 20px !important; */
                font-size: 20px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 18px;
                padding: 5px 35px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }

            .carousel-caption .astro {
                font-size: 43px;
            }

            .servicebg {
                width: 100%;
            }

            .carousel-caption {
                top: 18%;
                bottom: auto;
            }

            .carousel-caption strong {
                font-size: 43px;
                font-weight: 700;
            }

            .carousel-caption p {
                font-size: 28px;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption p span {
                font-size: 28px !important;
                line-height: 1.2em;
                margin-top: 15px;
            }

            .carousel-caption a {
                font-size: 18px;
            }

            .navbar-nav li a {
                font-size: 20px;
            }
        }

        .carousel-caption a {
            font-family: "Poppins", sans-serif;
            display: block;
            width: max-content;
            height: auto;
            background: url(../frontend/img/Button-png.png) center;
            padding: 5px 35px;
            text-align: center;
            border: 1px solid #fff;
            border-radius: 4px;
            color: #fff;
            display: block;
        }

        .carousel-caption a:hover {
            color: #ffc6c6;
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