@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!-- Start Contact -->
<section id="contact" class="p-top-80 p-bottom-50">
    <div class="container">
        <div class="row">
            <!-- === Contact Form === -->
            <div class="col-md-12 col-sm-12 p-bottom-30">
                <!-- invoice -->
                <div class="card">
                    <div class="card-header bg-black"></div>
                    <div class="card-body">
                        <div class="container">
                            <!-- <div class="row">
                                <div class="logo-container col-md-2 pull-left">
                                    <div class="logo-wrap local-scroll">
                                        <a href="{{ URL::to('/') }}">
                                            <img class="logo" src="{{ URL::to('admin/img/astroachariyalogo.png') }}"
                                                alt="logo" data-rjs="2" height="80"
                                                style="background-color: black; border-radius: 10%;">
                                        </a>
                                    </div>
                                </div>
                            </div> -->

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
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- End Contact -->
@endsection