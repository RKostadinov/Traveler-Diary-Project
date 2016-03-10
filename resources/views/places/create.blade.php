@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new place</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => "PlacesController@store" , "enctype" => "multipart/form-data"]) !!}
                        @include('places.place_form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var pickerOpts = {
                dateFormat: "yy-mm-dd"
            };
            $( "#dateFrom" ).datepicker(pickerOpts);
                $( "#dateTo" ).datepicker(pickerOpts);

        });


    </script>
@endsection