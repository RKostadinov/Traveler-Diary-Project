@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new photos to <b>{{$place->name}}</b></div>
                    <div class="panel-body">

                        <div class="dropzone" id="dropzoneFileUpload"></div>
                        <button id="addBtn">Add photos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl+"/places/{{$place->id}}/addphoto",
            params: {
                _token: token
            },
            autoProcessQueue: false

        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {

            }
        };
        $('#addBtn').click(function(){
            myDropzone.processQueue();
        });

    </script>

@endsection
