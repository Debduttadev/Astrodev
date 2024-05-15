@extends('layouts.adminlayout')
@section('content')
<!-- Begin Page Content -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            @if ($page_name === null)
            client
            @else
            {{ $page_name}}
            @endif
        </h1>

        <!-- <div class="card mb-4">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#addaboutcontactus">Add new About us details and Contact us</button>
        </div> -->

        <!-- to show the session status message -->
        @php
        $sessiondata = session()->all();

        @endphp
        @if(session()->has('status') && session()->has('msg'))
        @if($sessiondata['status'] === '1')
        <div class="alert alert-info sessiondata" role="alert">{{ $sessiondata['msg'] }}</div>
        @else
        <div class="alert alert-danger sessiondata" role="alert">{{ $sessiondata['msg'] }}</div>
        @endif
        @php
        session()->forget(['status', 'msg']);
        @endphp
        @endif


        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                About us Contact us details
            </div>
            <div class="card-body">

                @if(empty($aboutcontactus))
                <h5>No About us and Contact us are added</h5>
                @else
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                About us details
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show " data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <button type="button" class="btn btn-primary btn-sm col-md-2 " data-bs-toggle="modal" data-bs-target="#editaboutus">Edit</button>
                                </div>
                                <div>
                                    <img src="{{ URL::to('about')."/".$aboutcontactus->image }}" class="rounded img-fluid  float-end img-thumbnail" id="showimage" alt="no old image" hight=20% width=20%>
                                </div>
                                <div class="row">
                                    <p>
                                        {!! html_entity_decode($aboutcontactus->title) !!}
                                    </p>
                                    {!! html_entity_decode($aboutcontactus->description) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Contact us Detais
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="row align-items-center mt-1-9 mt-sm-n2-9">
                                    <div class=" mt-1-9 mt-sm-2-9 order-2 order-lg-1">
                                        <div>
                                            <div class="title-three mb-1-9 mb-md-5">
                                                <h2 class="text-secondary mb-0">Get In Touch</h2>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div>
                                                    <i class="fa-solid fa-location-dot fa-xl"></i>
                                                </div>
                                                <div class="ps-4">
                                                    <h4 class="h5">Location</h4>
                                                    <p class="mb-0">{{$aboutcontactus->address}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div>
                                                    <i class="fa-solid fa-phone fa-xl"></i>
                                                </div>
                                                <div class="ps-4">
                                                    <h4 class="h5 ">Phone</h4>
                                                    <p class="mb-0">{{$aboutcontactus->phone}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div>
                                                    <i class="fa-brands fa-whatsapp fa-xl"></i></i>
                                                </div>
                                                <div class="ps-4">
                                                    <h4 class="h5 ">Whatsapp</h4>
                                                    <p class="mb-0">{{$aboutcontactus->whatsapp}}</p>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <div>
                                                    <i class="fa-regular fa-envelope fa-xl"></i>
                                                </div>
                                                <div class="ps-4">
                                                    <h4 class="h5 ">Email</h4>
                                                    <p class="mb-0">{{$aboutcontactus->email}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </div>

        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>

    </div>
</main>
<!-- /.container-fluid -->
@endsection