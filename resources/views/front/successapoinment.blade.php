@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->

<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80 appoinmentcss">
    <div class="section-title-bg text-center m-bottom-20">
        <h2 class="wow fadeInDown no-margin" data-wow-duration="1s" data-wow-delay="0.6s">
            <strong>Appointment is Successful</strong>
        </h2>
        <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
    </div>
    <!--Container-->
    <div class="container clearfix ">
        <div class="row p-bottom-50 ">
            <div class="col-md-12" style="text-align: center;">
                @if($allchamber != null)
                <div class=" col-md-2"></div>
                @php
                $i=1;
                @endphp
                @foreach ($allchamber as $chamber)
                <!-- === Price Item 3 === -->
                <div class=" col-md-4 col-sm-4 p-bottom-30">
                    <div class="" data-wow-delay="0.8s">
                        <div class="">
                            <h4> Chamber {{$i}} Details </h4>
                        </div>
                        <ul class="">
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
                    </div>
                </div> <!-- /.col -->
                @php
                $i++;
                @endphp
                @endforeach
                @else
                @endif
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->

    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection