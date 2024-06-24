@extends('layouts.frontlayout')
@section('content')
<!-- Begin Page Content -->
<!--SERVICE LIST section-->
<section id="service" class="p-top-80 p-bottom-50">
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Section Title -->
                <div class="section-title text-center m-bottom-40">
                    <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.6s">Services</h2>
                    <div class="divider-center-small wow zoomIn" data-wow-duration="1s" data-wow-delay="0.6s"></div>
                    <p class="section-subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"><em>My mission is to kindle hope in humanity, offering the keys to solving life's puzzles through {{ $allservices}}. These ancient sciences, when understood and applied, unlock abundance for all. {{ numberService() }}</em></p>
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
                                @php
                                // strip out all whitespace
                                $servicename = preg_replace('/\s*/', '', $services->name);
                                // convert the string to all lowercase
                                $servicename = strtolower($servicename);
                                @endphp
                                <a href="{{ URL::to('service').'/'.base64_encode($services->id).'/'.$servicename }}"><img class="servicebg" src="{{ URL::to('frontend/img/astrosignorange.png') }}">
                                </a>
                            </div>
                        </div>
                        <a href="{{ URL::to('service').'/'.base64_encode($services->id).'/'.$servicename }}"><img src="{{ URL::to('service').'/'.$services->Image }}" alt="" /></a>
                    </div>
                    <div class="team-item-info">
                        <a href="{{ URL::to('service').'/'.base64_encode($services->id).'/'.$servicename }}">
                            <div class="team-item-name">
                                {{$services->name}}
                            </div>
                            <div class="team-item-position p-10">
                                {!! html_entity_decode($services->shortdescription)!!}
                            </div>
                        </a>
                    </div>
                </div>
            </div> <!-- /.col -->

            @endforeach

        </div> <!-- /.row -->

    </div> <!-- /.container -->
</section>
@endsection