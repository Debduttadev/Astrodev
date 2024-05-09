@extends('layouts.adminlayout')
@section('content')
<!-- Begin Page Content -->
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Edit Admin User</h3>
        <div class="row">

            <form class="user" id="formdata6" method="POST" action="{{ URL::to('addbannervideo') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" value="{{$bannervideodata->id}}" name="id">
                <div class="mt-4">
                    <img src="{{ URL::to('bannervideo')."/".$bannervideodata->thumbnail }}" class="rounded img-fluid" id="showimage" alt="no old iamge" hight=10% width=10%>
                </div>

                <div class="mt-4">
                    <label>Upload Thumbnail Image</label>
                    <inpuT type="hidden" name="oldimage" value="{{$bannervideodata->thumbnail}}">
                    <input <input type="file" class="form-control" name="fileToUpload" id="fileToUpload2" required="" accept="image/png, image/gif, image/jpeg, image/jpg" required>
                </div>

                <div class="mt-4">
                    <label class="control-label">Video link </label>
                    <input type="url" pattern="https://.*" class="form-control form-control-user" placeholder="https://www.youtube.com/watch?v=tZJeArQpsrI" name="videolink" value="{{$bannervideodata->videolink}}" autofocus>
                </div>

                <div class="mt-4">
                    <label class="control-label">File Type</label>

                    <div class="form-check">
                        @php
                        $banner="";
                        $video="";
                        $hide="";
                        $show="";
                        @endphp

                        @if($bannervideodata->thumbnailtype == 0)
                        @php


                        $banner="checked";
                        @endphp
                        @else
                        @php
                        $video="checked";
                        @endphp
                        @endif
                        @endphp
                        <input class="form-check-input" type="radio" name="thumbnailtype" id="flexRadioDefault1" value="0" {{$banner}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Banner
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="thumbnailtype" id="flexRadioDefault2" value="1" {{$video}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Video panel
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="control-label">File Visibility</label>
                    @if($bannervideodata->show == 0)
                    @php
                    $hide="checked";
                    @endphp
                    @else
                    @php
                    $show="checked";
                    @endphp
                    @endif
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="show" id="flexRadioDefault3" value="0" {{$hide}}>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Hide
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="show" id="flexRadioDefault4" value="1" {{$show}}>
                        <label class="form-check-label" for="flexRadioDefault4">
                            Show
                        </label>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-user btn-block">
                        Edit Banner or Video
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- /.container-fluid -->
@endsection