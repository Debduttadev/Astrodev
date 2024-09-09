@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!-- Start Contact -->
<section id="contact" class="p-top-80 p-bottom-50">
    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="section-title text-center m-bottom-40">
                @if($userpaymentdetails['status'] == 1)
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s" style="color:black">Thank you for
                        your interest. Your appointment has been scheduled. Our team will connect with you, take care of the
                        details, and guide you accordingly.</p>
                @else
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s" style="color:black">Your payment could not be processed. Please try again or use a different payment method.</p>
                @endif
                <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
            </div>
            <!-- === Contact Form === -->
            <div class="col-md-12 col-sm-12 p-bottom-30">
                @if($userpaymentdetails['status'] == 0)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Payment Staus</h5>
                            <p class="card-text">{{  $userpaymentdetails['msg'] }}</p>
                        </div>
                    </div>
                @else
                                <!-- invoice -->
                                <div class="card">
                                    <div class="card-header bg-black"></div>
                                    <div class="card-body">
                                        <div class="container">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <ul class="list-unstyled pull-left">
                                                            <li style="font-size: 30px; color: red;">Customer Details</li>
                                                            <li>Name:{{ $userpaymentdetails['customername'] }}</li>
                                                            <li>Email:{{ $userpaymentdetails['customeremail'] }}</li>
                                                            <li>Phone number:{{ $userpaymentdetails['customerphonenumber'] }}
                                                            </li>
                                                            <li>Transection ID:{{ $userpaymentdetails['merchantTransactionId'] }}</li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-6">
                                                        @php
    $about_contact = aboutalldetails();
                                                        @endphp <ul class="list-unstyled pull-right">
                                                            <li style="font-size: 30px; color: red;">ASTRO</li>
                                                            <li style="font-size: 30px; color: red;">ACHARIYA DEBDUTTA</li>
                                                            <li>
                                                                @foreach ($about_contact->phone as $phone)
                                                                    <a style="font-size: 14px; color: black !important;"
                                                                        href="tel:+91{{$phone}}">+91{{$phone}}</a> &nbsp; &nbsp; &nbsp;
                                                                @endforeach
                                                            </li>
                                                            <li style="font-size: 14px; color: black !important;"><i
                                                                    class="fa fa-whatsapp" aria-hidden="true"></i> +91 <a
                                                                    style="font-size: 14px; color: black !important;"
                                                                    href="https://wa.me/91{{ $about_contact->whatsapp }}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{ $about_contact->whatsapp }}</a>
                                                            </li>
                                                            <li style="font-size: 14px; color: black !important;">
                                                                {{ $about_contact->email }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-center">
                                                <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
                                                <p> ID #{{ $userpaymentdetails['invoiceId']}}</p>
                                            </div>

                                            <div class="row mx-3">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Appointment: {{ $userpaymentdetails['appointmentType']}}</td>
                                                            <td><i class="fa fa-inr"
                                                                    aria-hidden="true"></i>{{ $userpaymentdetails['amount'] }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xl-8" style="margin-left:60px">
                                                    <p class="pull-right"
                                                        style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                                                        Total:
                                                        <span>
                                                            <i class="fa fa-inr"
                                                                aria-hidden="true"></i>{{ $userpaymentdetails['amount'] }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row mt-2 mb-5">
                                                <p class="fw-bold">Date: <span
                                                        class="text-muted">{{ $userpaymentdetails['date']}}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-black"></div>
                                </div>
                @endif  
          </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- End Contact -->
@endsection