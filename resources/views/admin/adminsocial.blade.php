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
                Social Links
            </div>
            <div class="card-body">

                @if(count($socialdata) === 0)
                <h5>No Social Links are added</h5>
                @else
                <table id="datatablesSimple" class="servicetable">
                    <thead>
                        <tr>
                            <th>Social Platform Name</th>
                            <th>Url</th>
                            <th>icon</th>
                            <th>Visibility</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Social Platform Name</th>
                            <th>Url</th>
                            <th>icon</th>
                            <th>Visibility</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($socialdata as $data)

                        <tr>
                            <td>{{ $data['name'] }}</td>

                            <td>
                                <p class="row">
                                    @php
                                    $placeholder = "add url"
                                    @endphp
                                    @if($data['url'] !="")
                                    <a href="{{ urldecode($data['url']) }}" target="_blank">{{ urldecode($data['url']) }}</a>
                                    @php $placeholder = "edit url" @endphp
                                    @endif
                                </p>

                                <input type="url" name="url" class="form-control addediturl" id="social" socialid="{{ $data['id'] }}" placeholder="{{$placeholder}}">
                            </td>

                            <td>
                                {!!$data[$data['name']]!!}
                            </td>
                            <td>
                                <div class="mt-4">
                                    <label class="control-label">Link Visibility</label>
                                    @php
                                    $hide="";
                                    $show="";
                                    if($data['visibility'] == 0){
                                    //echo "hide";
                                    $hide="checked";
                                    }else{
                                    //echo "show";
                                    $show="checked";
                                    }
                                    @endphp

                                    <div class="form-check">
                                        <input class="form-check-input urlradio" type="radio" name="visibility{{ $data['id']}}" id="editflexRadioDefault{{ $data['id']}}" value="1" {{$show}} linkid="{{ $data['id']}}">
                                        <label class="form-check-label" for="editflexRadioDefault{{ $data['id']}}">
                                            Show
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input urlradio" type="radio" name="visibility{{ $data['id']}}" id="editflexRadioDefault{{ $data['id']}}" value="0" {{$hide}} linkid="{{ $data['id']}}">
                                        <label class="form-check-label" for="editflexRadioDefault{{ $data['id']}}">
                                            Hide
                                        </label>

                                    </div>
                                </div>
                            </td>

                        </tr>
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