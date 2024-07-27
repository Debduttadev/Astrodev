@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!--BLog single section-->
<section id="blog-single" class="p-top-80 p-bottom-80 aboutcss">

    <!--Container-->
    <div class="container clearfix ">
        <div class="row p-bottom-50 ">

            <div class="col-md-6">
                <!-- Section Title -->
                <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    {!! html_entity_decode($about_contact->title)!!}
                </div>
            </div> <!-- /.col -->
            @php
            $alttagforimages =alttagforimages();
            $alttag=$alttagforimages['about_contact'][$about_contact->id]['alttag'];
            $title=$alttagforimages['about_contact'][$about_contact->id]['title'];
            @endphp
            <div class="col-md-5 col-md-offset-1 ">
                <div class="feature-image parent ">
                    <img src="{{ URL::to('admin/img/astro.webp') }}" class="image1" />
                    <img src="{{ URL::to('about/'.$about_contact->image) }}" alt="{{$alttag}}" title="{{$title}}" class="img-responsive wow fadeInRight img-circle image2" data-wow-duration="1s" data-wow-delay="0.6s" />
                </div>

            </div> <!-- /.col -->

        </div> <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <!-- Section Title -->
                <div class="wow fadeInLeft" data-wow-duration="0.7s" data-wow-delay="0.5s">
                    {!! html_entity_decode($about_contact->description)!!}
                </div>
            </div> <!-- /.col -->
        </div>
    </div> <!-- /.container -->

</section><!--End blog single section-->
@endsection