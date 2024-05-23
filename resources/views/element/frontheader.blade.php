<!-- Start Navigation -->

<div class="container">
    <div class="social-icon pull-right">
        <ul class="list-inline">
            @foreach ($socialdata as $social)
            <li>
                @if($social['name'] == 'Facebook')
                <a data-scroll href="{{$social['url']}}" title="{{$social['name']}}"><i class="fa fa-facebook social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Youtube')
                <a data-scroll href="{{$social['url']}}" title="{{$social['name']}}"><i class="fa fa-youtube-play social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Instagram')
                <a data-scroll href="{{$social['url']}}" title="{{$social['name']}}"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Linkedin')
                <a data-scroll href="{{$social['url']}}" title="{{$social['name']}}"><i class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Twitter')
                <a data-scroll href="{{$social['url']}}" title="{{$social['name']}}"><i class="social"><img src="{{ URL::to('admin/img/twitter1.png') }}" class="twitter" style="height: 19px; width: 20px;"></i></a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>

<header class="nav-solid" id="home">


    <nav class="navbar navbar-fixed-top" id="fixednavbar">

        <div class="navigation">
            <div class="container-fluid">
                <div class="row">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Astro achariya</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo-container">
                            <div class="logo-wrap local-scroll">
                                <a href="#home">
                                    <img class="logo" src="{{ URL::to('admin/img/astroachariyalogo.png') }}" alt="logo" data-rjs="2" height="80">
                                </a>
                            </div>
                        </div>
                    </div> <!-- end navbar-header -->

                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a data-scroll href="#home">Home</a></li>
                                <li><a data-scroll href="#service">Service</a></li>
                                <li><a href="#appoinment">Appointment</a></li>
                                <li><a data-scroll href="#blog">Blog</a></li>
                                <li><a href="#chefsdf">Chamber</a></li>
                                <li><a href="{{ URL::to('/about') }}">About</a></li>
                                <li><a data-scroll href="#contact">Contact us</a></li>
                            </ul>
                        </div>
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!--/.container -->
        </div> <!-- /.navigation-overlay -->
    </nav> <!-- /.navbar -->

</header>
<!-- End Navigation -->