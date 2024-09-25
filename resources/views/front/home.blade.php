@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
@php
    $about_contact = aboutalldetails();
@endphp
<section id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            @php
                $i = "1";
                $item = 1;
            @endphp
            @foreach ($banner_video as $key => $thumbnail)
                    @if($i <= count($banner_video))
                            <li data-target="#carousel-example-generic" data-slide-to="{{$item}}">
                            </li>
                            @php
                                $item++;
                                $i++;
                            @endphp
                    @endif
            @endforeach
        </ol>
        @php
            $alttagforimages = alttagforimages();
            $alttag1 = $alttagforimages['banner'][$banner_video[0]->id]['alttag'];
            $title1 = $alttagforimages['banner'][$banner_video[0]->id]['title'];
        @endphp
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ URL::to('bannervideo') . "/" . 'default.jpg' }}" alt="{{$alttag1}}" title="{{$title1}}">

                <div class="carousel-caption wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    <h1 class="astro">Achariya Debdutta</h1>
                    </n>
                    <p> Globally Acclaimed Astrologer</p>
                    </n>
                    <p> Vastu Influencer,</p>
                    </n>
                    <p class="m-bottom-20">Life Coach, Success Guru</p>
                    </n>
                    <a type="button" href="{{ URL::to('/services') }}" id="bannerbtn">Your Journey Begins Here</a>
                </div>
            </div>
            @php
                $item = 1;
            @endphp
            @foreach ($banner_video as $key => $thumbnail)
                        @php
                            $alttag = $alttagforimages['banner'][$thumbnail->id]['alttag'];
                            $title = $alttagforimages['banner'][$thumbnail->id]['title'];
                        @endphp
                        <div class="item ">
                            <img src="{{ URL::to('bannervideo') . "/" . $thumbnail->thumbnail }}" alt="{{$alttag}}"
                                title="{{$title}}">
                            <div class="carousel-caption wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                                {!!$thumbnail->bannertext!!}
                            </div>
                        </div>
                        @php
                            $item++;
                        @endphp
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control roundbtn" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control roundbtn" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<!-- Start Regular Section -->
<section id="about1" class="  p-bottom-10 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s" style="color: black;">
                        Discover Your Cosmic Path with Expert</h1>
                    <h1><a href="#service" style="color:#b4975d"><u>Astrology</u> Guidlines</a></h1>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- Start Regular Section -->
<section id="about" class="  p-bottom-20 ">
    <div class="container">
        <div class="row">
            <div class="col-md-8  p-bottom-10">
                <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    {!! html_entity_decode($about_contact->title)!!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">

                    <div class="feature-image parent">
                        <a href="{{ URL::to('/aboutus') }}">
                            <img src="{{ URL::to('admin/img/astro.png') }}" class="image1" />
                            <img src="{{ URL::to('about/' . $about_contact->image) }}" alt="Feature Image"
                                class="img-responsive wow fadeInRight image2" data-wow-duration="1s"
                                data-wow-delay="0.6s" />
                        </a>
                    </div>
                </div> <!-- /.col -->

                <div class="col-md-6 ">
                    <!-- Section Title -->
                    <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                        {!! html_entity_decode($about_contact->homedescription)!!}
                    </div>

                    <a href="{{ URL::to('/aboutus') }}" class="m-top-10 m-bottom-10 btn btn-main roundbtn wow fadeInUp"
                        data-wow-duration="0.7s" data-wow-delay="0.5s">Take a Tour</a>
                </div> <!-- /.col -->
            </div>

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<!-- Start Team -->
<section id="service" class="  p-bottom-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Services</h1>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">My mission
                        is to kindle hope in humanity, offering the keys to solving life's puzzles through
                        {{ $allservices}}. These ancient sciences, when understood and applied, unlock abundance for
                        all.
                    </p>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
    <div class="container">
        <div class="row">
            @foreach ($servicedata as $servicekey => $services)
                        <!-- === Team Item 1 === -->
                        <div class="col-md-3 col-xs-6 p-10">
                            <div class="team-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                <div class="team-item-name">
                                    {{$services->name}}
                                </div>
                                <div class="team-item-image">
                                    @php
                                        $alttag = $alttagforimages['Service'][$services->id]['alttag'];
                                        $title = $alttagforimages['Service'][$services->id]['title'];
                                    @endphp
                                    <a href="{{ URL::to('service') . '/' . $services->nameurl }}">
                                        <img class="img-circle" src="{{ URL::to('service') . '/' . $services->Image }}"
                                            alt="{{$alttag}}" title="{{ $title }}" />
                                    </a>
                                </div>
                                <div class="team-item-info">
                                    <a href="{{ URL::to('service') . '/' . $services->nameurl }}">
                                        <div class="team-item-position p-10">
                                            {!! html_entity_decode($services->shortdescription)!!}
                                        </div>
                                        <a href="{{ URL::to('service') . '/' . $services->nameurl }}"
                                            class="m-top-10 m-bottom-10 btn btn-service roundbtn wow fadeInUp"
                                            data-wow-duration="0.7s" data-wow-delay="0.5s">Get Started</a>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- /.col -->
            @endforeach
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<section id="happyclient" class="p-top-20 p-bottom-10">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Happy Clients</h1>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
</section>

<!-- Start Testimonial -->
<section id="testimonials" class="parallax-bg overlay-dark p-top-50  p-bottom-30" data-stellar-background-ratio="0.5">
    <!-- === Testimonials === -->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div id="owl-testimonials" class="owl-carousel owl-theme testimonial text-center">
                    @foreach ($reviews as $review)
                        <!-- === Testimonial item 1 === -->
                        <div class="testimonial-item text-center">
                            <i class="fa fa-user-o" style="font-size:40px;color: #9b8354;" aria-hidden="true"></i>
                            <p class="testimonial-desc "><i class="fa fa-quote-left" aria-hidden="true"
                                    style="font-size: 30px;color: #9b8354;"></i> {{ $review->review}}<i
                                    class="fa fa-quote-right" aria-hidden="true"
                                    style="font-size: 30px;color: #9b8354;"></i></p>
                            <h5 class="testimonial-author">
                                {{ $review->user_name}}
                            </h5>
                        </div>
                    @endforeach
                </div> <!-- /#owl-testimonials -->
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial -->

<!-- Start blog -->
<section id="blog" class=" p-top-30 p-bottom-10">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20 ">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Blog Posts</h1>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <!-- === blog === -->
                <div id="owl-blog" class="owl-carousel owl-loaded owl-drag owl-theme col-md-4">
                    @foreach ($blogitems as $blog)
                                        @php
                                            $alttag = $alttagforimages['blog'][$blog['id']]['alttag'];
                                            $title = $alttagforimages['blog'][$blog['id']]['title'];
                                        @endphp
                                        <!-- === Blog item 1 === -->
                                        <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                                            <div class="blog-media">
                                                <a href="{{ URL::to('/blog') . '/' . $blog['nameurl'] }}"><img
                                                        src="{{ URL::to('blog') . '/' . $blog['image'] }}" alt="{{$alttag}}"
                                                        title="{{$title}}"></a>
                                            </div>
                                            <!--post media-->
                                            <div>
                                                <div class="team-item-name text-center" style="height:60px">
                                                    {{ucfirst($blog['title'])}}
                                                </div>
                                            </div>
                                            <div class="blog-post-info clearfix">
                                                <span class="time"><i class="fa fa-calendar"></i>{{ $blog['createdat']}}</span>
                                            </div>
                                            <!--post info-->

                                            <div class="blog-post-body">
                                                @php
                                                    $small = substr(strip_tags($blog['description']), 0, 120);
                                                @endphp
                                                <p class="p-bottom-10">{!! $small !!}.....</p>
                                                <a class="btn btn-service roundbtn" href="{{ URL::to('/blog') . '/' . $blog['nameurl'] }}"
                                                    class="read-more">Read More
                                                    >></a>
                                            </div>
                                            <!--post body-->
                                        </div> <!-- /.blog -->
                    @endforeach
                </div><!-- /#owl-testimonials -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::to('/blogs') }}"
                        class="pull-left m-top-10 m-bottom-10 btn btn-main roundbtn wow fadeInUp"
                        data-wow-duration="0.7s" data-wow-delay="0.5s">See more Blogs</a>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
</section>

<!-- Start blog -->
<section id="youtube" class="  p-bottom-30">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Featured Videos</h1>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <!-- === blog === -->
                <div id="owl-youtube" class="owl-carousel owl-theme col-md-4">
                    @foreach ($youtube_video as $youtubedata)
                                        @php
                                            $alttag2 = $alttagforimages['videos'][$youtubedata->id]['alttag'];
                                            $title2 = $alttagforimages['videos'][$youtubedata->id]['title'];
                                        @endphp
                                        <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                                            <div class="blog-media">
                                                <a href="{{$youtubedata->videolink}}" target="_blank">
                                                    <img src="{{ URL::to('bannervideo') . '/' . $youtubedata->thumbnail }}"
                                                        alt="{{$alttag2}}" title="{{$title2}}">
                                                </a>
                                            </div>
                                            <!--post media-->
                                        </div> <!-- /.blog -->
                    @endforeach
                </div><!-- /#owl-testimonials -->
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<!-- Start Contact -->
<section id="contact" class="  p-bottom-10">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-20">
                    <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h1>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-10">
                    <div class="contact-form">

                        <form class="user" id="contactusform" method="POST" action="{{ URL::to('addcontactus') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6 contact-form-item wow zoomIn">
                                    <input name="fullname" id="name" type="text" placeholder="Your Name: *" required />
                                    <span class="error" id="err-name">please enter name</span>
                                </div>

                                <div class="col-md-6 contact-form-item wow zoomIn">
                                    <input name="email" id="email" type="email" placeholder="E-Mail: *" required />
                                    <span class="error" id="err-email">please enter e-mail</span>
                                    <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 contact-form-item wow zoomIn">
                                    <div class="input-group">
                                        <div class="input-group-addon" id="basic-addon1">+91</div>
                                        <input type="text" maxlength="10" placeholder="Phone Number: *" name="phone"
                                            aria-describedby="basic-addon1" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                            aria-describedby="basic-addon1" required>
                                        <span class="error" id="err-phone">please enter phone number</span>
                                        <span class="error" id="err-phone">please enter numbers</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 contact-form-item wow zoomIn">
                                    <textarea name="message" id="message" placeholder="Your Message"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 contact-form-item">
                                    <button type="submit" class="btn contactsubmit roundbtn">Submit</button>
                                </div>
                            </div>
                            <div class="error errorcontact" id="err-state"></div>
                        </form>

                        <div class="clearfix"></div>
                        <div class="panel panel-default" id="ajaxsuccess">
                            <div class="panel-body">
                                Thank you for writing to us. We have received your message and will get back to you
                                within as soon as possible.
                            </div>
                        </div>
                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                <!-- === Contact Information === -->
                <div class="col-md-5 col-sm-5 p-bottom-10">
                    <div class="contact-info">

                        <!-- === Location === -->
                        <div class="m-top-10 wow slideInRight">
                            <div class="contact-info-icon roundbtn">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="contact-info-text">
                                {{ $about_contact->address }}
                            </div>
                        </div>

                        <!-- === Phone === -->
                        <div class="m-top-10 wow slideInRight">
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
                        <div class="m-top-10 wow slideInRight">
                            <div class="contact-info-icon roundbtn">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </div>
                            <div class="contact-info-text">
                                <a href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us"
                                    style="color: #000;">{{ $about_contact->whatsapp }}</a>
                            </div>
                        </div>

                        <!-- === Mail === -->
                        <div class="m-top-10 wow slideInRight">
                            <div class="contact-info-icon roundbtn">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                {{ $about_contact->email }}
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col -->
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- End Contact -->
@endsection