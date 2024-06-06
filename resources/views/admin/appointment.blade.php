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

        <div class="card mb-4">
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#addblog">Add new Blog</button>
        </div>

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
                Appointments
            </div>
            <div class="card-body">

                @if(count($appointments) === 0)
                <h5>No Appointments are available</h5>
                @else
                <table id="datatablesSimple" class="servicetable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Whatsapp Number</th>
                            <th>Appointment Type</th>
                            <th>Booking Date</th>
                            <th>Chamber</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Whatsapp Number</th>
                            <th>Appointment Type</th>
                            <th>Booking Date</th>
                            <th>Chamber</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $a=0;
                        @endphp
                        @foreach ($appointments as $data)
                        <tr>
                            <td>{{$a}}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phoneNumber }}</td>
                            <td><a href="https://wa.me/91{{$data->whatsappNumber}}?text=Thank%20you%20behalf%20of%20Astro%20Achariya%20debdutta%20for%20connecting%20with%20us">{{ $data->whatsappNumber }}</a></td>
                            @if($data->appointmentType == "o")
                            <td><i class="fa fa-video-camera" aria-hidden="true"></i> Online </td>
                            @else
                            <td><i class="fa fa-male" aria-hidden="true"></i> Offline </td>
                            @endif
                            <td>{{ $data->bookingDate }}</td>
                            @if($data->appointmentType == "o")
                            <td>No Chamber</td>
                            @else
                            <td>{{ $data->locationname }}</td>
                            @endif
                            @if($data->invoiceId == null)
                            <td>New</td>
                            @else
                            <td>{{$data->invoicestatus}}</td>
                            @endif
                            <td>
    
                            </td>
                        </tr>
                        @php
                        $a++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
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