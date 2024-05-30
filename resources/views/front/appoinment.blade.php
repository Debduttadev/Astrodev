@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80 aboutcss">

    <!--Container-->
    <div class="container clearfix ">
        <div class="row p-bottom-50 ">
            <div class="col-md-5 col-md-offset-1 ">
                <div class="feature-image parent ">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl mt-7 font-semibold mb-4 font-philosopher text-center">Book an Appointment</h2>
                    <h3>Unlock Solutions, Embrace Serenity.</h3>
                    <div>
                        <p>In years of practicing astrology, I've discovered a profound truth - every problem is a lock with a key. Whether it's delving into horoscopes, tarot, or palmistry, I provide seekers with remedies, unlocking doors to happiness and goals.</p>
                        <p>Life becomes precious, and the lessons learned are cherished for good. Find solutions, feel sorted, and embrace the journey towards a fulfilled life.</p>
                    </div>
                </div>
            </div> <!-- /.col -->

            <div class="col-md-5">
                <!-- Section Title -->
                <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    <div class="contact-form row">

                        <form name="ajax-form" id="ajax-form" action="contact.php" method="post">

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="name">Full Name</label>
                                <input name="name" id="name" type="text" placeholder="Full Name: *" required />
                                <span class="error" id="err-name">Please enter full name</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="text" placeholder="E-Mail: *" required />
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="phonenumber">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">+91</span>
                                    <input type="text" maxlength="10" class="form-control" placeholder="Phone Number: *" name="phone" aria-describedby="basic-addon1" id="phonenumber" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                                    <span class="error" id="err-phone">please enter phone number</span>
                                    <span class="error" id="err-emailvld">please enter numbers</span>
                                </div>
                                <span class="error" id="err-email">please enter e-mail</span>
                                <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="dp2">Date of Birth</label>
                                <input type="text" class="span2 dateblog" typeblog="created_at" search="" value="01-05-2024" id="dp2">
                                <span class="error" id="err-email">please enter date of birth</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <div class="input-group bootstrap-timepicker">
                                    <input id="timepicker1" type="text" class="input-small">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                </div>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Female
                                    </label>
                                </div>
                                <div class="radio ">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                        Others
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="placecity">Place of Birth City</label>
                                <input name="name" id="placecity" type="text" placeholder="Full Name: *" required />
                                <span class="error" id="err-name">Please enter full name</span>
                            </div>

                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <label for="placestate">Place of Birth State</label>
                                <input name="name" id="placestate" type="text" placeholder="Full Name: *" required />
                                <span class="error" id="err-name">Please enter full name</span>
                            </div>


                            <div class="col-sm-12 contact-form-item wow zoomIn">
                                <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="col-sm-12 contact-form-item">
                                <button class="send_message btn btn-main btn-theme wow fadeInUp" id="send" data-lang="en">submit</button>
                            </div>
                        </form>

                        <div class="clearfix"></div>
                        <div id="ajaxsuccess">Successfully sent!!</div>
                        <div class="clear"></div>

                    </div> <!-- /.contacts-form & inner row -->
                </div>
            </div> <!-- /.col -->

        </div> <!-- /.row -->

    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection