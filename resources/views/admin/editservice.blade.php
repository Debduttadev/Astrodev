@extends('layouts.adminlayout')
@section('content')
<!-- Begin Page Content -->
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Edit Service</h3>
        <div class="row">

            <form class="user" id="formdata" method="POST" action="{{ URL::to('updateservice') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="mt-4">
                    <label class="control-label">Service Name</label>
                    <input type="text" class="form-control form-control-user" placeholder="Service Name" name="name" value="{{$servicedata->name}}" required autofocus>
                </div>

                <div class="mt-4">
                    <label class="control-label">Short Description</label>
                    limit <span class="limit">0</span>/100
                    <textarea name="shortdescription" class="form-control form-control-user" id="shortdescription" aria-describedby="shortdescription" placeholder="{{$servicedata->shortdescription}}" value="{{$servicedata->shortdescription}}" maxlength="100"></textarea>
                </div>

                <div class="mt-4">
                    <label class="control-label">Description</label>
                    limit <span class="limit">0</span>/2000
                    <textarea name="description" class="form-control form-control-user" id="description" aria-describedby="description" placeholder="{{$servicedata->description}}" value="{{$servicedata->description}}" maxlength="2000" rows="10" cols="50"></textarea>
                </div>

                <div class="mt-4">
                    <label>Upload Service Image</label>
                    <inpuT type="hidden" name="oldimage" value="{{$servicedata->image}}">
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required="">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Edit Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- /.container-fluid -->
@endsection