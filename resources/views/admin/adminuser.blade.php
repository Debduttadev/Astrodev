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

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Admin User table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Setting</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($adminuserdata as $userdata)
                        @php
                        if($userdata->usertype ==='0'){
                        $usertype = 'Master Admin';
                        }elseif($userdata->usertype ==='1'){
                        $usertype = 'Sub Admin';
                        }elseif($userdata->usertype ==='2'){
                        $usertype = 'Blogger';}
                        @endphp
                        <tr>
                            <td>{{ $userdata->name }}</td>
                            <td>{{ $usertype }}</td>
                            <td>{{ $userdata->email }}</td>
                            <td>
                                @if($userdata->usertype != '0')
                                <a style="font-size: medium;" title="Edit Admin" class="btn btn-warning" href="{{ URL::to('editadmin/' .base64_encode($userdata->id)) }}"><i class="fas fa-edit" style="color:#848795;"></i>Edit Admin</a>

                                <a title="Delete Admin" class="btn btn-danger deleteadmin" adminid="{{ base64_encode($userdata->id)}}"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
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