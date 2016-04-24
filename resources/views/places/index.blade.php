@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Places</div>
                    <div class="panel-body">
                        @foreach($places as $place)
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="/places/{{$place->id}}">
                                        <img class="img-responsive" src="/uploads/{{$place->mainPhoto}}" width="350px" height="550px">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>{{$place->name}}</h3>
                                    {{--<h5>by {{$friend->username}}</h5>--}}
                                    <h4>Period: {{$place->dateFrom}} - {{$place->dateTo}}</h4>
                                    <a class="btn btn-primary" href="/places/{{$place->id}}">View Place <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            </div>
                            <!-- /.row -->

                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection