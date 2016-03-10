@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Places</div>
                    <div class="panel-body">
                        @foreach($places as $place)
                            <div>
                           <a href="/places/{{$place->id}}">
                               <img src="/uploads/{{$place->mainPhoto}}">
                           </a>
                           <span>{{$place->name}}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection