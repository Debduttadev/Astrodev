@extends('layouts.adminlayout')
@section('content')
<!-- Begin Page Content -->
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
        <div class="row">
            @foreach ( $appointments as $appointment )

            <div class="col-xl-3 col-md-6 p-bottom-20">
                <div class="card text-bg-light">
                    <a href="{{ URL::to('appoinmentdetails').'/'.base64_encode($appointment->id) }}">
                        <div class="card-header">
                            <h5>{{$appointment->name}}</h5>
                        </div>
                    </a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $appointment->email }}</li>
                        <li class="list-group-item">{{ $appointment->phoneNumber }}</li>
                        <li class="list-group-item"><a href="https://wa.me/91{{$appointment->whatsappNumber}}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{ $appointment->whatsappNumber }}</a></li>
                        <li class="list-group-item">{{ $appointment->bookingDate }}</li>
                        @if($appointment->appointmentType == "o")
                        <li class="list-group-item"><i class="fa fa-video-camera" aria-hidden="true"></i> Online </li>
                        @else
                        <li class="list-group-item"><i class="fa fa-male" aria-hidden="true"></i> Offline </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<!-- /.container-fluid -->
@endsection