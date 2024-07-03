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
            <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#addadminuser">Add new admin</button>
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
                Admin User table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Page</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Page</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($seodetails as $seo1)
                        <tr>
                            @if($seo1['page'] == 'home')
                            <td><a href="{{URL::to('/') }}" target="_blank">{{URL::to('/') }}</a></td>
                            @else
                            <td><a href="{{URL::to('/')."/".$seo1['page'] }}" target="_blank">{{URL::to('/')."/".$seo1['page'] }}</a></td>
                            @endif
                            <td><a href="{{URL::to('editseo').'/'.$seo1['pagetype'].'/'.$seo1['page'] }}" class="btn btn-secondary">Seo Details</a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Services & Blogs</td>
                        </tr>
                        @foreach ($newseo as $seo)
                        <tr>
                            <td><a href="{{URL::to('/')."/".$seo['page'] }}" target="_blank">{{URL::to('/')."/".$seo['page'] }}</a></td>
                            <td><a href="{{URL::to('editseo').'/'.$seo['page'] }}" class="btn btn-secondary">Seo Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <ol class="breadcrumb mb-4">
            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>

    </div>
</main>
<!-- /.container-fluid -->
@endsection