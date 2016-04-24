@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new description to <b>{{$place->name}}</b></div>
                    <div class="panel-body">
                        {!! Form::model($text, ['action' => ["PlacesController@addText" , "id" => $place->id]]) !!}
                        @include('texts.text_form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'text' );
    </script>



@endsection