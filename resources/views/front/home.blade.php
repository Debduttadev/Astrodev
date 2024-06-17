@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<section id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            @php
            $i="2";
            $item=1;
            @endphp
            @foreach ($banner_video as $key => $thumbnail )
            @if($i <= count($banner_video)) <li data-target="#carousel-example-generic" data-slide-to="{{$item}}">
                </li>
                @php
                $item++;
                $i++;
                @endphp
                @endif
                @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ URL::to('bannervideo')."/".$banner_video[0]->thumbnail }}" alt="...">
                <div class="carousel-caption wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    <h1>Astro Achariya Debdutta</h1>
                    <p> Globally Acclaimed Astrologer</p>
                    <p> Vastu Influencer,</p>
                    <p>Life Coach, Success Guru</p>
                    <a type="button" href="{{ URL::to('/services') }}" id="bannerbtn" class="btn btn-default btn-white btn-main">Your Journey Begins Here</a>
                </div>
            </div>
            @php
            $item=1;
            @endphp
            @foreach ($banner_video as $key => $thumbnail )
            @if($key != 0)
            <div class="item ">
                <img src="{{ URL::to('bannervideo')."/".$thumbnail->thumbnail }}" alt="...">
                <div class="carousel-caption wow fadeInLeft p-3" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    <h1>Astro Achariya Debdutta</h1>
                    <p> Globally Acclaimed Astrologer</p>
                    <p> Vastu Influencer,</p>
                    <p>Life Coach, Success Guru</p>
                    <a type="button" href="{{ URL::to('/services') }}" id="bannerbtn" class="btn btn-default btn-white btn-main">Your Journey Begins Here</a>
                </div>
            </div>
            @php
            $item++;
            @endphp
            @endif
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Start Regular Section -->
    <section id="about" class="p-top-80 p-bottom-80 ">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- Section Title -->
                    <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                        {!! html_entity_decode($about_contact->title)!!}
                    </div>

                    <a href="{{ URL::to('/aboutus') }}" class="m-top-30 m-bottom-30 btn btn-main wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">Know more</a>
                </div> <!-- /.col -->

                <div class="col-md-5 col-md-offset-1">

                    <div class="feature-image parent">
                        <a href="{{ URL::to('/aboutus') }}">
                            <img src="{{ URL::to('admin/img/astro.webp') }}" class="image1" />
                            <img src="{{ URL::to('about/'.$about_contact->image) }}" alt="Feature Image" class="img-responsive wow fadeInRight img-circle image2" data-wow-duration="1s" data-wow-delay="0.6s" />
                        </a>
                    </div>

                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Regular Section -->
    <div class="divider-center divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    <!-- Start Team -->
    <section id="service" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Services</h1>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">My mission is to kindle hope in humanity, offering the keys to solving life's puzzles through {{ $allservices}}. These ancient sciences, when understood and applied, unlock abundance for all.</p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                @foreach ( $servicedata as $servicekey => $services )
                <!-- === Team Item 1 === -->
                <div class="col-md-4 p-30">
                    <div class="team-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="team-item-image">
                            <div class="team-item-image-overlay">
                                <div class="team-item-icons">
                                    @php
                                    // strip out all whitespace
                                    $servicename = preg_replace('/\s*/', '', $services->name);
                                    // convert the string to all lowercase
                                    $servicename = strtolower($servicename);
                                    @endphp
                                    <a href="{{ URL::to('service').'/'.$servicename.'/'.base64_encode($services->id) }}"><img class="servicebg" src="{{ URL::to('frontend/img/astrosignorange.png') }}">
                                    </a>
                                </div>
                            </div>
                            <a href="{{ URL::to('service').'/'.$servicename.'/'.base64_encode($services->id) }}"><img src="{{ URL::to('service').'/'.$services->Image }}" alt="" /></a>
                        </div>
                        <div class="team-item-info">
                            <a href="{{ URL::to('service').'/'.$servicename.'/'.base64_encode($services->id) }}">
                                <div class="team-item-name">
                                    {{$services->name}}
                                </div>
                                <div class="team-item-position p-10">
                                    {!! html_entity_decode($services->shortdescription)!!}
                                </div>
                            </a>
                        </div>
                    </div>
                </div> <!-- /.col -->

                @endforeach

            </div> <!-- /.row -->

        </div> <!-- /.container -->
    </section>
    <!-- End Team -->
    <section id="myjourney" class="p-top-80 p-bottom-80">
        <div>
            <div class="text-center mt-20">
                <h1 class=" text-2xl md:text-3xl lg:text-4xl m-3 font-philosopher">MY JOURNEY</h1>
                <h3 class="font-dancing text-xl myjourneyfont">...what you seek, seeks you</h3>
                <div class="m-auto px-3 text-slate-600 font-sans w-[90%] md:w-[70%] lg:w-[50%] mt-3" style="font-family:Poppins;     padding: 0 20px;">
                    <p>Embarking on a spiritual odyssey in childhood, </p>
                    <p>I cultivated a deep passion for astrology and palm reading. Rigorous meditation birthed my professional journey in astrology, palmistry, numerology, and Vastu.</p>
                    <p>Beyond providing comfort, my services reflect a life well-lived. In times of joy, may we all find support. Welcome to a journey whe b re spirituality meets practical wisdom.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Regular Section -->
    <div class="divider-center divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>

    <!-- Start blog -->
    <section id="youtube" class="p-top-80 p-bottom-80">

        <div class="container ">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Featured Videos</h1>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                <!-- === blog === -->
                <div id="owl-youtube" class="owl-carousel owl-theme">
                    @foreach ($youtube_video as $youtubedata)
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="{{$youtubedata->videolink}}" target="_blank"><img src="{{ URL::to('bannervideo').'/'.$youtubedata->thumbnail }}" alt=""></a>
                        </div><!--post media-->
                    </div> <!-- /.blog -->
                    @endforeach
                </div><!-- /#owl-testimonials -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->

    </section>


    <!-- Start Testimonial -->
    <section id="testimonials" class="parallax-bg overlay-dark p-top-80 p-bottom-80" data-stellar-background-ratio="0.5">

        <!-- Section Title -->
        <div class="section-title text-center white-color m-bottom-40">
            <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Happy Client Testimonials</h2>
            <div class="divider-center-small divider-white wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
        </div>

        <!-- === Testimonials === -->
        <div id="owl-testimonials" class="owl-carousel owl-theme testimonial text-center white-color">

            <!-- === Testimonial item 1 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">He is the best advisor for life. Not just an astrologer a person who resolves any sort of problem within a minute. He gave me certain remedies and I use that properly and all of my problems get resolved.I am extremely overwhelmed to meet him and take his blessings for any guidance. Absolutely accurate prediction in each and every step. I will highly recommend him . He is not just an astrologer but a part of family member as well.</p>
                <div class="testimonial-thumb">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <h5 class="testimonial-author">Kajal Sarkar</h5>
            </div>

            <!-- === Testimonial item 2 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">If you are worried and tensed about your future, then surely contact Achariya Debdutta. In my bad times, when I was suffering and not getting a single way out, he was the one who deducted my tension and anxiety, and guided me, which gave an excellent result. His astrological predictions and remedies are very very accurate to me. Even my family is also very pleased to meet him and come under his guidance.</p>
                <div class="testimonial-thumb">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <h5 class="testimonial-author">Swapan Bhattacharyya</h5>
            </div>

            <!-- === Testimonial item 3 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">I've consulted with several astrologers, but Achariya debdutta stands out for his deep understanding and precise predictions.He doesn't just make general comments or give bad advice. Instead, he carefully thinks about each client's unique situation before giving them personalized advice.</p>
                <div class="testimonial-thumb">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <h5 class="testimonial-author">Ajay Saha</h5>
            </div>

        </div> <!-- /#owl-testimonials -->

    </section>
    <!-- End Testimonial -->


    <!-- Start blog -->
    <section id="blog" class="p-top-80 p-bottom-80">

        <div class="container ">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Blog Posts</h1>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <!-- <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Bed sincerity yet therefore forfeited his certainty neglected questions. Pursuit chamber as elderly amongst on. Distant however warrant farther to of.</em></p> -->
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                <!-- === blog === -->
                <div id="owl-blog" class="owl-carousel owl-theme">
                    @foreach ($blogitems as $blog)
                    <!-- === Blog item 1 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('blog').'/'.$blog['image'] }}" alt=""></a>
                        </div><!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i>{{ $blog['createdat']}}</span>
                        </div><!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="#">{{ $blog['title']}}</a></h4>
                            @php
                            $small = substr( strip_tags($blog['description']), 0, 200);
                            @endphp
                            <p class="p-bottom-20">{!! $small !!}</p>
                            <a href="{{ URL::to('/blog').'/'.base64_encode($blog['id']) }}" class=" read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->
                    @endforeach
                </div><!-- /#owl-testimonials -->

            </div> <!-- /.row -->
            <a href="{{ URL::to('/blogs') }}" class="m-top-30 m-bottom-30 btn btn-main wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">See more Blogs</a>
        </div> <!-- /.container -->

    </section>

    <div class="divider-center divider-theme wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>

    <!-- Start Contact -->
    <section id="contact" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h1>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">

                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-30">
                    <div class="contact-form row">

                        <form class="user" id="contactusform" method="POST" action="{{ URL::to('addcontactus') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="fullname" id="name" type="text" placeholder="Your Name: *" required />
                                <span class="error" id="err-name">please enter name</span>
                            </div>

                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="email" id="email" type="text" placeholder="E-Mail: *" required />
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">+91</span>
                                    <input type="text" maxlength="10" class="form-control" placeholder="Phone Number: *" name="phone" aria-describedby="basic-addon1" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                                    <span class="error" id="err-phone">please enter phone number</span>
                                    <span class="error" id="err-phone">please enter numbers</span>
                                </div>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                            </div>

                            <div class="col-sm-12 contact-form-item">
                                <button type="submit" class="btn contactsubmit">Submit</button>
                            </div>

                            <div class="error errorcontact" id="err-state"></div>

                        </form>

                        <div class="clearfix"></div>
                        <div class="panel panel-default" id="ajaxsuccess">
                            <div class="panel-body">
                                Thank you for writing to us. We have received your message and will get back to you within as soon as possible.
                            </div>
                        </div>
                    </div> <!-- /.contacts-form & inner row -->
                </div> <!-- /.col -->

                <!-- === Contact Information === -->
                <div class="col-md-5 col-sm-5 p-bottom-30">
                    <address class="contact-info">

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
                                {{ $about_contact->phone }}
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
                                <a href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us" style="color: #000;">{{ $about_contact->whatsapp }}</a>
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
                </div> <!-- /.col -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->
    </section>
    <!-- End Contact -->
    @endsection