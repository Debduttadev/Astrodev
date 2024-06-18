<!-- Start Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row footerlist">
            <div class="col-md-4 pull-left listfooter">
                @php
                $servicelistfooter=servicelistfooter();
                @endphp
                <h2>Services</h2>
                @foreach ($servicelistfooter as $key => $service)
                @php
                // strip out all whitespace
                $servicename = preg_replace('/\s*/', '', $service);
                // convert the string to all lowercase
                $servicename = strtolower($servicename);
                @endphp
                <a href="{{ URL::to('service').'/'.$servicename.'/'.base64_encode($key) }}">{{$service}}</a><br>
                @endforeach
            </div>

            <div class="col-md-4 pull-left listfooter">
                <h2>Quick Link</h2>
                <a href="{{ URL::to('/') }}">Home</a><br>
                @if(Request::is('/'))
                <a data-scroll href="#service">Services</a><br>
                @else
                <a href="{{ URL::to('/services') }}">Services</a><br>
                @endif
                <a href="{{ URL::to('/appointment') }}">Appointment</a><br>
                @if(Request::is('/'))
                <a data-scroll href="#blog">Blog</a><br>
                @else
                <a href="{{ URL::to('/blogs') }}">Blog</a><br>
                @endif
                <a href="{{ URL::to('/chambers') }}">Chamber</a><br>
                <a href="{{ URL::to('/aboutus') }}">About</a><br>
                @if(Request::is('/'))
                <a data-scroll href="#contact">Contact us</a><br>
                @else
                <a href="{{ URL::to('/contactus') }}">Contact us</a><br>
                @endif
            </div>

            <div class="col-md-4 pull-right">
                <div class="row">
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
                                @elseif($social['name'] == 'Instagram')
                                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Linkedin')
                                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                                @elseif($social['name'] == 'Twitter')
                                <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="social"><img src="{{ URL::to('admin/img/twitter1.png') }}" class="twitter" style="height: 29px; width: 25px;"></i></a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    @php
                    $about_contact=aboutalldetails();
                    @endphp
                    <!-- === Contact Information === -->
                    <address class="contact-info footercontact">
                        <!-- === Location === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <div class="contact-info-title">
                                Address:
                            </div>
                            <div class="contact-info-text">
                                {{ $about_contact->address }}
                            </div>
                        </div>

                        <!-- === Phone === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-info-title">
                                Phone number:
                            </div>
                            <div class="contact-info-text">
                                @foreach ($about_contact->phone as $phone )
                                <p><a href="tel:+91{{$phone}}">+91{{$phone}}</a></p>
                                @endforeach
                            </div>
                        </div>

                        <!-- === Whatsapp === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </div>
                            <div class="contact-info-title">
                                WhatsApp:
                            </div>
                            <div class="contact-info-text">
                                +91 <a href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{ $about_contact->whatsapp }}</a>
                            </div>
                        </div>

                        <!-- === Mail === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-title">
                                Email:
                            </div>
                            <div class="contact-info-text">
                                {{ $about_contact->email }}
                            </div>
                        </div>
                    </address>
                </div>
            </div>
        </div>
        <small class="copyright pull-left">Copyrights © 2024 All Rights Reserved By Astroachariyadebdutta.com</small>
        <!-- /social-icon -->
    </div>
    <!-- /container -->
</footer>
<!-- End Footer -->