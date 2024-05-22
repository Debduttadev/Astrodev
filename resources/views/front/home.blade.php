@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<section id="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ URL::to('bannervideo')."/".$banner_video[0]->thumbnail }}" alt="...">
            </div>
            @foreach ($banner_video as $key => $thumbnail )
            @if($key != 0)
            <div class="item">
                <img src="{{ URL::to('bannervideo')."/".$thumbnail->thumbnail }}" alt="..." hight="160" width="90">
            </div>
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
    <section class="p-top-80 p-bottom-80">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- Section Title -->
                    <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
                        {!! html_entity_decode($about_contact->title)!!}
                    </div>

                    <a data-scroll href="#about" class="m-top-30 m-bottom-30 btn btn-main wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.8s">Know more</a>
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
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>My mission is to kindle hope in humanity, offering the keys to solving life's puzzles through astrology, Vastu, and palmistry. These ancient sciences, when understood and applied, unlock abundance for all.</em></p>
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
                            <div class="team-item-position">
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

    <!-- Start blog -->
    <section id="youtube" class="p-top-80 p-bottom-80">

        <div class="container ">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Section Title -->
                    <div class="section-title text-center m-bottom-40">
                        <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Blog Posts</h2>
                        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Bed sincerity yet therefore forfeited his certainty neglected questions. Pursuit chamber as elderly amongst on. Distant however warrant farther to of.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                <!-- === blog === -->
                <div id="owl-youtube" class="owl-carousel owl-theme">

                    <!-- === Blog item 1 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b1.jpg') }}" alt=""></a>
                        </div><!--post media-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 2 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b2.jpg') }}" alt=""></a>
                        </div><!--post media-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 3 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b3.jpg') }}" alt=""></a>
                        </div><!--post media-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 4 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b4.jpg') }}" alt=""></a>
                        </div><!--post media-->
                    </div> <!-- /.blog -->

                </div><!-- /#owl-testimonials -->

            </div> <!-- /.row -->

        </div> <!-- /.container -->

    </section>


    <!-- Start Testimonial -->
    <section id="testimonials" class="parallax-bg overlay-dark p-top-80 p-bottom-80" style="background-image:url(img/testimonial-bg.jpg)" data-stellar-background-ratio="0.5">

        <!-- Section Title -->
        <div class="section-title text-center white-color m-bottom-40">
            <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Testimonials</h2>
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
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Bed sincerity yet therefore forfeited his certainty neglected questions. Pursuit chamber as elderly amongst on. Distant however warrant farther to of.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">
                <!-- === blog === -->
                <div id="owl-blog" class="owl-carousel owl-theme">

                    <!-- === Blog item 1 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b1.jpg') }}" alt=""></a>
                        </div><!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i> 12 January 2017</span>
                            <span class="comments"><a href="#"><i class="fa fa-comments"></i> 4 Comments</a></span>
                        </div><!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="#">Working in Cool Head</a></h4>
                            <p class="p-bottom-20">Impossible alteration devonshire to is interested stimulated dissimilar. To matter esteem polite do if. Those an equal point no years do. Depend warmth fat but her but played.</p>
                            <a href="#" class="read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 2 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b2.jpg') }}" alt=""></a>
                        </div><!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i> 06 January 2017</span>
                            <span class="comments"><a href="#"><i class="fa fa-comments"></i> 2 Comments</a></span>
                        </div><!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="#">Sing me to sleep</a></h4>
                            <p class="p-bottom-20">Impossible alteration devonshire to is interested stimulated dissimilar. To matter esteem polite do if. Those an equal point no years do. Depend warmth fat but her but played.</p>
                            <a href="#" class="read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 3 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b3.jpg') }}" alt=""></a>
                        </div><!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i> 02 January 2017</span>
                            <span class="comments"><a href="#"><i class="fa fa-comments"></i> 4 Comments</a></span>
                        </div><!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="#">Hold Me Tight</a></h4>
                            <p class="p-bottom-20">Impossible alteration devonshire to is interested stimulated dissimilar. To matter esteem polite do if. Those an equal point no years do. Depend warmth fat but her but played.</p>
                            <a href="#" class="read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->

                    <!-- === Blog item 4 === -->
                    <div class="blog wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-media">
                            <a href="#"><img src="{{ URL::to('frontend/img/blog/b4.jpg') }}" alt=""></a>
                        </div><!--post media-->

                        <div class="blog-post-info clearfix">
                            <span class="time"><i class="fa fa-calendar"></i> 01 January 2017</span>
                            <span class="comments"><a href="#"><i class="fa fa-comments"></i> 7 Comments</a></span>
                        </div><!--post info-->

                        <div class="blog-post-body">
                            <h4><a class="title" href="#">Only I can do it</a></h4>
                            <p class="p-bottom-20">Impossible alteration devonshire to is interested stimulated dissimilar. To matter esteem polite do if. Those an equal point no years do. Depend warmth fat but her but played.</p>
                            <a href="#" class="read-more">Read More >></a>
                        </div><!--post body-->
                    </div> <!-- /.blog -->

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
                        <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer time dance hero of though narrow marked at.</em></p>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- /.row -->

            <div class="row">

                <!-- === Contact Form === -->
                <div class="col-md-7 col-sm-7 p-bottom-30">
                    <div class="contact-form row">

                        <form name="ajax-form" id="ajax-form" action="contact.php" method="post">
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="name" id="name" type="text" placeholder="Your Name: *" />
                                <span class="error" id="err-name">please enter name</span>
                            </div>
                            <div class="col-sm-6 contact-form-item wow zoomIn">
                                <input name="email" id="email" type="text" placeholder="E-Mail: *" />
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>
                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message"></textarea>
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

                        <p class="m-bottom-30 wow slideInRight">Spring formal no county ye waited. My whether cheered at regular it of promise blushes perhaps.</p>

                        <!-- === Location === -->
                        <div class="m-top-20 wow slideInRight">
                            <div class="contact-info-icon">
                                <i class="fa fa-location-arrow"></i>
                            </div>
                            <div class="contact-info-title">
                                Address:
                            </div>
                            <div class="contact-info-text">
                                149 Null Street, New York, NY 098
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
                                +1-000-1111-3333
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
                                support@tabthemes.com
                            </div>
                        </div>

                    </address>
                </div> <!-- /.col -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <!-- End Contact -->
    @endsection