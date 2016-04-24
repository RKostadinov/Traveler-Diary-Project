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

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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

        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            var text = $(this).parents('.input-group').find(':text');
            text.val(label);

        });

    </script>
@endsection