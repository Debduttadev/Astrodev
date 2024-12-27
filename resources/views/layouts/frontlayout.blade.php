<!DOCTYPE html>
<html lang="en">
@php
    $fullurl = Request::url();
    $appurl = URL::to('/');

    if ($fullurl == $appurl) {

        $seodetailsperpage = seodetailsperpage('home', 'static');

    } else {

        $page = str_replace($appurl, "", $fullurl);
        $urlname = explode("/", $page);

        if (count($urlname) == 2 || count($urlname) == 1) {
            $seodetailsperpage = seodetailsperpage(end($urlname), 'static');
        } else {
            $seodetailsperpage = seodetailsperpage(end($urlname), $urlname[1]);
        }

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
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link href="{{ URL::to('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::to('frontend/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
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
    <!-- Custom CSS 
        -->
    <link href="{{ URL::to('frontend/css/custome.css') }}" rel="stylesheet">
    @include('element.frontheader')
    <!-- Start Intro -->


    <!-- Main content -->
    @yield('content')
    @include('element.frontfooter')

    <!-- Back to top -->
    @include('element.frontmodal')


    <!-- Components Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="{{ URL::to('frontend/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::to('frontend/js/smooth-scroll.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/wow.min.js') }}"></script>
    <script src="{{ URL::to('frontend/inc/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/contact.js') }}"></script>

    <!-- Custom Plugin -->
    <script src="{{ URL::to('frontend/js/custom.js') }}"></script>
    @stack('scripts')
    @include('element.frontjquery')
</body>



</html>