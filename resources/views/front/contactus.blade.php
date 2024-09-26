@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!-- Start Contact -->
<section id="contact" class="p-top-40  p-bottom-10">
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
        @php
            $about_contact = aboutalldetails();
        @endphp
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