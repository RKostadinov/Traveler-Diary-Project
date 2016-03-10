@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$place->name}} -  @if($place->public) Public @else Hidden @endif
                        <a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddText">Add Text</a>
                        <a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddPhoto">Add Photo</a>
                        <a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/toggleVisibility">Change Visibility</a>
                        {!!Form::open(["method" => "DELETE", "route" => ["places.destroy", $place->id]])!!}
                             <button type="submit" class="btn btn-default btn-danger pull-right">Delete Place</button>
                        {!! Form::close()!!}
                    </div>
                    <div class="panel-body">
                        @foreach($text as $txt)
                        <div>
                            {{$txt->text or ''}}
                        </div>
                        @endforeach
                        @foreach($photos as $photo)

                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <a class="thumbnail" href="#">
                                        <img class="img-responsive" src="\{{$photo->photoUrl}}" alt="">
                                    </a>
                                </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection