<div class="divider-center divider-footer divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
<!-- Start Footer -->
<section id="footerlisting" class="p-top-20 p-bottom-10 footerlisting">
    <div class="container">
        <div class="row footerlist">
            <div class="col-md-12">
                <div class="col-md-4  col-sm-4  pull-left listfooter">
                    @php
$servicelistfooter = servicelistfooter();
                    @endphp
                    <h2 class="m-bottom-30">Services</h2>
                    @foreach ($servicelistfooter as $key => $service)
                                        @php
    // strip out all whitespace
    $servicename = preg_replace('/\s*/', '', $service['name']);
    // convert the string to all lowercase
    $servicename = strtolower($servicename);
                                        @endphp

                                        <a href="{{ URL::to('service') . '/' . $service['nameurl'] }}"><i class="fa fa-circle-thin"
                                                aria-hidden="true"></i>{{ucfirst($service['name'])}}</a><br>
                    @endforeach
                </div>

                <div class="col-md-4 col-sm-4 pull-left listfooter">
                    <h2 class="m-bottom-30">Quick Link</h2>
                    <a href="{{ URL::to('/') }}"><i class="fa fa-circle-thin" aria-hidden="true"></i>Home</a><br>
                    <a href="{{ URL::to('/aboutus') }}"><i class="fa fa-circle-thin"
                            aria-hidden="true"></i>About</a><br>
                    <a href="{{ URL::to('/contactus') }}"><i class="fa fa-circle-thin" aria-hidden="true"></i>Contact Us</a><br>
                    <a href="{{ URL::to('/blogs') }}"><i class="fa fa-circle-thin" aria-hidden="true"></i>Blog</a><br>
                    <a href="{{ URL::to('/terms-conditions') }}"><i class="fa fa-circle-thin"
                            aria-hidden="true"></i>Terms & Condition</a><br>
                    <a href="{{ URL::to('/privacy-policy') }}"><i class="fa fa-circle-thin"
                            aria-hidden="true"></i>Privacy Policy</a><br>
                    <a href="{{ URL::to('/refund-policy') }}"><i class="fa fa-circle-thin" aria-hidden="true"></i>Refund Policy</a><br>
                </div>

                <div class="col-md-4 col-sm-4 pull-right">
                    <div class="row">
                        <div class="social-icon pull-right">
                            <!-- <ul class="list-inline">
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
                                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="social"><img src="{{ URL::to('admin/img/twitter1.png') }}" class="twitter" style="height: 29px; width: 25px;"></i></a>
                                    @endif
                                </li>
                                @endforeach
                            </ul> -->
                        </div>
                    </div>
                    <div class="row">
                        @php
$about_contact = aboutalldetails();
                        @endphp
                        <!-- === Contact Information === -->
                        <div class="contact-info footercontact">
                            <!-- === Location === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
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
                                <div class="contact-info-text">
                                    @foreach ($about_contact->phone as $phone)
                                        <a href="tel:+91{{$phone}}" style="color: black;">+91{{$phone}}</a><br />
                                    @endforeach
                                </div>
                            </div>

                            <!-- === Whatsapp === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </div>
                                <div class="contact-info-text">
                                    +91 <a
                                        href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{
    $about_contact->whatsapp }}</a>
                                </div>
                            </div>

                            <!-- === Mail === -->
                            <div class="m-top-20 wow slideInRight">
                                <div class="contact-info-icon roundbtn">
                                    <i class="fa fa-envelope"></i>
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
</section>

<div class="divider-center divider-footer divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>

<footer class="site-footer">
    <div class="container">
        <small class="copyright pull-left">Copyrights © 2024 All Rights Reserved By <a
                href="https://astroachariyadebdutta.com/">Achariya Debdutta</a>.</small>
        <div class="social-icon pull-right">
            @php
$socialdata = scociallinks();
            @endphp
            @foreach ($socialdata as $social)
                @if($social['name'] == 'Facebook')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-facebook social"
                            aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Youtube')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                            class="fa fa-youtube-play social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'WhatsApp')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-whatsapp social"
                            aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Instagram')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i class="fa fa-instagram social"
                            aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Linkedin')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><i
                            class="fa fa-linkedin-square social" aria-hidden="true"></i></a>
                @elseif($social['name'] == 'Twitter')
                    <a href="{{$social['url']}}" title="{{$social['name']}}" target="_blank"><img
                            src="{{ URL::to('admin/img/twitter1.png') }}" class="twitter"
                            style="height: 26px; width: 26px;"></a>
                @endif
            @endforeach
        </div>
    </div>
    <!-- /container -->
</footer>
<!-- End Footer -->