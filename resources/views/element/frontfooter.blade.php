<!-- Start Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row footerlist">
            <div class="col-md-12">
                <div class="col-md-4 pull-left listfooter">
                    @php
                    $servicelistfooter=servicelistfooter();
                    @endphp
                    <h2>Services</h2>
                    @foreach ($servicelistfooter as $key => $service)
                    @php
                    // strip out all whitespace
                    $servicename = preg_replace('/\s*/', '', $service['name']);
                    // convert the string to all lowercase
                    $servicename = strtolower($servicename);
                    @endphp
                    <a href="{{ URL::to('service').'/'.$service['nameurl'] }}">{{strtoupper($service['name'])}}</a><br>
                    @endforeach
                </div>

                <div class="col-md-4 pull-left listfooter">
                    <h2>Quick Link</h2>
                    <a href="{{ URL::to('/') }}">HOME</a><br>
                    <a href="{{ URL::to('/aboutus') }}">ABOUT</a><br>
                    @if(Request::is('/'))
                    <a data-scroll href="#contact">CONTACT US</a><br>
                    @else
                    <a href="{{ URL::to('/contactus') }}">CONTACT US</a><br>
                    @endif
                    <a href="{{ URL::to('/terms_conditions') }}">TREM & CONDITIONS</a><br>
                    <a href="{{ URL::to('/privacy_policy') }}">PRIVACY POLICY</a><br>
                    <a href="{{ URL::to('/refund_policy') }}">REFUND POLICY</a><br>
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
                        <div class="contact-info footercontact">
                            <!-- === Location === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-location-arrow"></i>
                                </div>
                                <div class="contact-info-title">
                                    ADDRESS:
                                </div>
                                <div class="contact-info-text">
                                    {{ $about_contact->address }}
                                </div>
                            </div>

                            <!-- === Phone === -->
                            <div class="m-top-20 wow slideInRight m-bottom-10">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-info-title">
                                    PHONE NUMBER:
                                </div>
                                <div class="contact-info-text">
                                    @foreach ($about_contact->phone as $phone )
                                    <a href="tel:+91{{$phone}}">+91{{$phone}}</a> &nbsp; &nbsp; &nbsp;
                                    @endforeach
                                </div>
                            </div>

                            <!-- === Whatsapp === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </div>
                                <div class="contact-info-title">
                                    WHATSAPP:
                                </div>
                                <div class="contact-info-text">
                                    +91 <a href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{ $about_contact->whatsapp }}</a>
                                </div>
                            </div>

                            <!-- === Mail === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="contact-info-title">
                                    EMAIL:
                                </div>
                                <div class="contact-info-text">
                                    {{ $about_contact->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <small class="copyright">Copyrights © 2024 All Rights Reserved By Astroachariyadebdutta.com</small>
                <!-- /social-icon -->
            </div>
        </div>
    </div>
    <!-- /container -->
</footer>
<!-- End Footer -->