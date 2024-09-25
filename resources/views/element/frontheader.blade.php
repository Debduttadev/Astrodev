<!-- Start Navigation -->

<div class="container">
    <div class="row">
        <div class="col-md-10 col-sm-8 col-xs-6 m-top-15" style="border-right: 1px solid black; height: 35px;">
            <div class="row">
                <div class="social-icon pull-right headersocial">
                    <ul class="list-inline">
                        @php
                            $socialdata = scociallinks();
                        @endphp
                        @foreach ($socialdata as $social)
                            <li>
                                @if($social['name'] == 'Facebook')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="fa fa-facebook social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Youtube')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="fa fa-youtube-play social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'WhatsApp')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="fa fa-whatsapp social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Instagram')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="fa fa-instagram social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Linkedin')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Twitter')
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                                            class="social"><img src="{{ URL::to('frontend/img/twitter1.png') }}" class="twitter"
                                                alt="Twitter account"></i></a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 text-center">
            <div class="row m-top-10"><a href="{{ URL::to('/appointment') }}" type="button"
                    class="btn btn-default headerbookappointment ">Book an
                    Appointment</a></div>
            <div class="row m-top-5">
                @php
                    $aboutcontact = aboutalldetails();
                @endphp
                <div class="headercall">Call:
                    +91 {{$aboutcontact->phone['0']}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <header class="nav-solid" id="home">
        <nav class="navbar navbar-fixed-top" id="fixednavbar">
            <div class="navigation">
                <div class="container-fluid" style="height: inherit;">
                    <div class="row" style="height: inherit;">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-collapse">
                                <span class="sr-only">Astro achariya</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Logo -->
                            <div class="logo-container">
                                <div class="logo-wrap local-scroll logoparent">
                                    <a href="{{ URL::to('/') }}">
                                        <img src="{{ URL::to('admin/img/sun.png') }}" class="logoimage1"
                                            id="logoimage1" />
                                        <img src="{{ URL::to('admin/img/roundlogo.png') }}" alt="Feature Image"
                                            class="logo img-responsive logoimage2" id="logoimage2" />
                                        <img src="{{ URL::to('admin/img/navlogo3.png') }}" alt="Feature Image"
                                            class="logo img-responsive logoimage3" id="logoimage3" />
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end navbar-header -->

                        <div class="col-md-8 col-xs-12 nav-wrap">
                            <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                                    <li class="servicemenu" style="display:none"><a
                                            href="{{ URL::to('/services') }}">Service</a></li>
                                    @php
                                        $servicelistfooter = servicelistfooter();
                                    @endphp
                                    <li class="dropdown servicedropdown" style="display:block">
                                        <a href="#" class="dropdown-toggle servicenav" data-toggle="dropdown"
                                            role="button" aria-haspopup="true" aria-expanded="false" status="0">Service
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu sevicesubmenu">
                                            @foreach ($servicelistfooter as $key => $service)
                                                                                        @php    $servicename = preg_replace('/\s*/', '', $service['name']);

                                                                                            $servicename = strtolower($servicename);
                                                                                        @endphp
                                                                                        <li><a
                                                                                                href="{{ URL::to('service') . '/' . $service['nameurl'] }}">{{strtoupper($service['name'])}}</a>
                                                                                        </li>
                                            @endforeach
                                        </ul>
                                    </li>

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

    <a href="{{ URL::to('/appointment') }}" id="appoinment" class="btn btn-default btn-lg pull-right">Book an
        Appointment</a>

    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up roundbtn"></i></a>
    @php
        $aboutcontact = aboutalldetails();
    @endphp

    <a aria-label="Chat on WhatsApp" class="btn pull-right" href="https://wa.me/91{{$aboutcontact->whatsapp}}"
        id="whatsappbtn"> <img alt="Chat on WhatsApp" src="{{ URL::to('frontend/img/whatsappIcon.png') }}"
            title="Please visit us on whatsapp" /></a>
</div>