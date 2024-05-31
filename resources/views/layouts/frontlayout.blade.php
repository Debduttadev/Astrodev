<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Title -->
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::to('admin/img/llogo icon-01-01.png') }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ URL::to('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- CSS Files For Plugin -->
    <link href="{{ URL::to('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::to('frontend/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('frontend/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/css/YTPlayer.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/inc/owlcarousel/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/inc/owlcarousel/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::to('frontend/css/datepicker.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ URL::to('frontend/css/style.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ URL::to('frontend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::to('frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <link type="text/css" href="{{ URL::to('frontend/css/timepicker.less') }}" />

    <script type="text/javascript" src="{{ URL::to('frontend/js/bootstrap-timepicker.min.js') }}"></script>

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
            color: #241b1b;
        }

        .servicecss {
            background-color: #e3dbce;
            font-size: 16px;
            color: #483120;
        }

        .servicebg {
            position: relative;
            width: 50% !important;
            top: -200%;

        }

        .social {
            font-size: 20px;
            color: #ecd1a3;
        }

        .twitter {
            filter: sepia(100%);
        }

        .parent {
            position: relative;
            top: 0;
            left: 0;
        }

        .image1 {
            position: relative;
            top: 0;
            left: 0;
            animation: spin;
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
            font-size: 16px;
            line-height: 18px;
            border-bottom: 1px solid #fff;
            padding-bottom: 10px;
            width: 100%;
            display: block;
        }

        .aboutcss {
            background-color: #40362e;
        }

        .myjourneyfont {
            font-family: cursive;
            font-size: smaller;
            color: burlywood;
        }

        .datepicker .datepicker-months table {
            background-color: #393b42;
        }

        .datepicker td span.active {
            background-image: linear-gradient(to bottom, #849aa5, #565960);
        }

        .datepicker-years .table-condensed {
            background-color: #393b42;
        }

        select.booking option {
            height: 50px;
        }

        .appoinmentcss {

            background-color: #857a7a;
        }

        .appoinmentsubmit {
            background-color: #3e3b38;
            color: #fff;
            padding-left: 46%;
            padding-right: 46%;
        }

        form.formdata3 {
            font-size: 18px;
        }

        form div label {
            font-size: 16px;
            font-weight: 10;
            color: #fff;
        }
    </style>
    @include('element.frontheader')
    <!-- Start Intro -->


    <!-- Main content -->
    @yield('content')
    @include('element.frontfooter')
    <!-- Back to top -->

    <a href="#appoinment" id="appoinment" class="btn btn-default btn-lg" title="Back to top">Book an Appoinment</a>
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>


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
    <script src="{{ URL::to('frontend/js/bootstrap-datepicker.js') }}"></script>
    <!-- Contact Form -->
    <script src="{{ URL::to('frontend/js/contact.js') }}"></script>

    <!-- Custom Plugin -->
    <script src="{{ URL::to('frontend/js/custom.js') }}"></script>
    @stack('scripts')
    @include('element.frontjquery')

</body>

</html>