@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!--BLog single section-->
<!-- Start Price -->
<section id="price" class="p-top-80 p-bottom-50">
    <div class="container">
        <div class="row chamberlist">

            <!-- Section Title -->
            <div class="section-title text-center m-bottom-40">
                <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Chamber</h2>
                <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
            </div>
            @php
            $i=1;
            @endphp
            @foreach ($chamberdata as $chamber)
            <!-- === Price Item 3 === -->
            <div class="col-md-offset-3 col-md-6 col-sm-6 p-bottom-30">
                <div class="price-item text-center wow flipInX" data-wow-delay="0.8s">
                    <div class="price-item-header price-item-header-alt">
                        <h4> Chamber {{$i}} Details </h4>
                    </div>
                    <ul class="price-item-features list-unstyled">
                        <li>
                            <h5>Location :</h5> {{ $chamber->locationname}}
                        </li>
                        <li>
                            <h5>Available Days :</h5> {{ $chamber->availabledays}}
                        </li>
                        <li>
                            <h5>Help Line Phone Number :</h5> {{ $chamber->description}}
                        </li>
                    </ul>
                    <a href="#" class="btn btn-main btn-theme">Book Now</a>
                </div>
            </div> <!-- /.col -->
            @php
            $i++;
            @endphp
            @endforeach

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!-- End Price -->
@endsection