@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80 servicecss">

    <!--Container-->
    <div class="container clearfix ">
        <div class="row p-bottom-50 " style="text-align: center; ">
            <h3 style="color:#483120;"><strong>{{$servicedata->name}}</strong></h3>
        </div>
        <div class="row p-bottom-50 ">

            <div class="col-md-offset-3 col-md-6 col-md-offset-3 ">
                <div class="feature-image parent ">
                    <img src="{{ URL::to('admin/img/astro.webp') }}" class="image1" />
                    <img src="{{ URL::to('service/'.$servicedata->Image) }}" alt="Feature Image" class="img-responsive wow fadeInRight img-circle image2" data-wow-duration="1s" data-wow-delay="0.6s" />
                </div>

            </div> <!-- /.col -->

        </div> <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    {!! html_entity_decode($servicedata->description)!!}
                </div>
            </div> <!-- /.col -->
        </div>
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection