@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$place->name}}
                        <a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddText">Add Text</a>
                        <a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddPhoto">Add Photo</a>
                    </div>
                    <div class="panel-body">
                        @foreach($text as $txt)
                        <div>
                            {{$txt->text or ''}}
                        </div>
                        @endforeach
                        @foreach($photos as $photo)
                            <div>
                                <img src="{{public_path($photo)}}">
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection