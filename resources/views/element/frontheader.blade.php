<!-- Start Navigation -->

<div class="container">
    <div class="social-icon pull-right">
        <ul class="list-inline">
            @php
            $socialdata=scociallinks();
            @endphp
            @foreach ($socialdata as $social)
            <li>
                @if($social['name'] == 'Facebook')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-facebook social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Youtube')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-youtube-play social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'WhatsApp')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-whatsapp social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Instagram')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Linkedin')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Twitter')
                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="social"><img src="{{ URL::to('frontend/img/twitter1.png') }}" class="twitter" alt="Twitter account"></i></a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="container">
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
                                    <a href="{{ URL::to('/') }}">
                                        <img class="logo" src="{{ URL::to('admin/img/astroachariyalogo.png') }}" alt="logo" data-rjs="2" height="80">
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end navbar-header -->

                        <div class="col-md-8 col-xs-12 nav-wrap">
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                                    @if(Request::is('/'))
                                    <li><a data-scroll href="#service">Services</a></li>
                                    @else
                                    <li><a href="{{ URL::to('/services') }}">Services</a></li>
                                    @endif
                                    <li><a href="{{ URL::to('/appointment') }}">Appointment</a></li>
                                    @if(Request::is('/'))
                                    <li><a data-scroll href="#blog">Blog</a></li>
                                    @else
                                    <li><a href="{{ URL::to('/blogs') }}">Blog</a></li>
                                    @endif
                                    <li><a href="{{ URL::to('/chambers') }}">Chamber</a></li>
                                    <li><a href="{{ URL::to('/aboutus') }}">About</a></li>
                                    @if(Request::is('/'))
                                    <li><a data-scroll href="#contact">Contact us</a></li>
                                    @else
                                    <li><a href="{{ URL::to('/contactus') }}">Contact us</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div> <!-- /.col -->
                    </div> <!-- /.row -->
                </div> <!--/.container -->
            </div> <!-- /.navigation-overlay -->
        </nav> <!-- /.navbar -->
    </header>

    <a href="{{ URL::to('/appointment') }}" id="appoinment" class="btn btn-default btn-lg pull-right">Book an Appointment</a>

    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up roundbtn"></i></a>
    @php
    $aboutcontact=aboutalldetails();
    @endphp

    <a aria-label="Chat on WhatsApp" class="btn pull-right" href="https://wa.me/91{{$aboutcontact->whatsapp}}" id="whatsappbtn"> <img alt="Chat on WhatsApp" src="{{ URL::to('frontend/img/whatsappIcon.png') }}" title="Please visit us on whatsapp" /></a>
</div>