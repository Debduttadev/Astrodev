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
            </div>
            @php
            $item=1;
            @endphp
            @foreach ($banner_video as $key => $thumbnail )
            @if($key != 0)
            <div class="item">
                <img src="{{ URL::to('bannervideo')."/".$thumbnail->thumbnail }}" alt="..." hight="160" width="90">
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

                    <a data-scroll href="{{ URL::to('about') }}" class="m-top-30 m-bottom-30 btn btn-main wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">Know more</a>
                </div> <!-- /.col -->

                <div class="col-md-4 col-md-offset-2">

                    <div class="feature-image">
                        <img src="{{ URL::to('about/'.$about_contact->image) }}" alt="Feature Image" class="img-responsive wow fadeInRight img-circle" data-wow-duration="1s" data-wow-delay="0.6s" />
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
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Services</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>My mission is to kindle hope in humanity, offering the keys to solving life's puzzles through {{ $allservices}}. These ancient sciences, when understood and applied, unlock abundance for all.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                @foreach ($servicedata as $servicekey => $services )
                <!-- === Team Item 1 === -->
                <div class="col-md-4 p-30">
                    <div class="team-item wow zoomIn" data-wow-duration="1s" data-wow-delay="0.9s">
                        <div class="team-item-image">
                            <div class="team-item-image-overlay">
                                <div class="team-item-icons">
                                    <a href="#">more..</a>
                                </div>
                            </div>
                            <img src="{{ URL::to('service').'/'.$services->Image }}" alt="" />
                        </div>
                        <div class="team-item-info">
                            <div class="team-item-name">
                                {{$services->name}}
                            </div>
                            <div class="team-item-position p-10">
                                {!! html_entity_decode($services->shortdescription)!!}
                            </div>
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
                <h3 class="font-dancing text-xl text-slate-800" style="font-family:Garamond;"><small>...what you seek, seeks you</small></h3>
                <div class="m-auto px-3 text-slate-600 font-sans w-[90%] md:w-[70%] lg:w-[50%] mt-3" style="font-family:Lucida Sans">
                    <p>Embarking on a spiritual odyssey in childhood, </p>
                    <p>I cultivated a deep passion for astrology and palm reading. Rigorous meditation birthed my professional journey in astrology, palmistry, numerology, and Vastu.</p>
                    <p>Beyond providing comfort, my services reflect a life well-lived. In times of joy, may we all find support. Welcome to a journey where spirituality meets practical wisdom.</p>
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
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Featured Videos</h2>
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
                            <a href="{{$youtubedata->videolink}}"><img src="{{ URL::to('bannervideo').'/'.$youtubedata->thumbnail }}" alt=""></a>
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
                <p class="testimonial-desc">Residence you satisfied and rapturous certainty two. Procured outweigh as outlived so so. On in bringing graceful proposal blessing of marriage outlived. Son rent face our loud near.</p>
                <div class="testimonial-thumb">
                    <img class="img-responsive" src="{{ URL::to('frontend/img/testimonial/1.jpg') }}" alt="">
                </div>
                <h5 class="testimonial-author">Jenny Doe - Star Inc</h5>
            </div>

            <!-- === Testimonial item 2 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">Excellent so to no sincerity smallness. Removal request delight if on he we. Unaffected in we by apartments astonished to decisively themselves. Offended ten old consider speaking.</p>
                <div class="testimonial-thumb">
                    <img class="img-responsive" src="{{ URL::to('frontend/img/testimonial/2.jpg') }}" alt="">
                </div>
                <h5 class="testimonial-author">Kathy Doe - Service Corp</h5>
            </div>

            <!-- === Testimonial item 3 === -->
            <div class="testimonial-item text-center">
                <p class="testimonial-desc">Advanced and procured civility not absolute put continue. Overcame breeding or my concerns removing desirous so absolute. My melancholy unpleasing imprudence considered in advantages.</p>
                <div class="testimonial-thumb">
                    <img class="img-responsive" src="{{ URL::to('frontend/img/testimonial/3.jpg') }}" alt="">
                </div>
                <h5 class="testimonial-author">Jack Doe - Inka Design</h5>
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
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Blog Posts</h2>
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
                            <h4><a class="title" href="#">Working in Cool Head</a></h4>
                            @php
                            $small = substr( strip_tags($blog['description']), 0, 200);
                            @endphp
                            <p class="p-bottom-20">{!! $small !!}</p>
                            <a href="#" class="read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->
                    @endforeach
                </div><!-- /#owl-testimonials -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->

    </section>

    <!-- Start Contact -->
    <section id="contact" class="p-top-80 p-bottom-50">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Contact</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">

                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-30">
                    <div class="contact-form row">

                        <form name="ajax-form" id="ajax-form" action="contact.php" method="post">
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="name" id="name" type="text" placeholder="Your Name: *" required />
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
                                    <span class="error" id="err-emailvld">please enter numbers</span>

                                </div>
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>
                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="col-sm-12 contact-form-item">
                                <button class="send_message btn btn-main btn-theme wow fadeInUp" id="send" data-lang="en">submit</button>
                            </div>
                            <div class="clear"></div>
                            <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
                            <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
                            <div class="error" id="err-state"></div>
                        </form>

                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

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
                                {{ $about_contact->email }}
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