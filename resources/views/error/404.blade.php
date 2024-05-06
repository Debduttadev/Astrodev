@extends('layouts.userservicelayout')

@section('content')

<!-- Breadcrumb Area Start -->
<section class="breadcrumb-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <img src="{{URL::to('img/core-img/opps.png')}}">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="breadcrumb-content">
                    <h2>Page Not Found</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Looks like you tried </br>opening a broken link.</br>
                                <a class="btn akame-btn active mt-30" href="{{ URL::to('/') }}">Go to <i class="icon_house_alt"></i>Home page</a>
                            </li>
                        </ol>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->
@endsection