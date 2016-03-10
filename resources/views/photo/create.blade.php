@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new text to <b>{{$place->name}}</b></div>
                    <div class="panel-body">
                        {!! Form::open(['action' => ["PlacesController@addPhoto" , "id" => $place->id]]) !!}
                        @include('photo.photo_form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
