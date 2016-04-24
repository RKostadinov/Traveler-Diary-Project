@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-10 col-md-offset-1">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading">{{$place->name}} - @if($place->public) Public @else Hidden @endif--}}
    {{--<a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddText">Add--}}
    {{--Text</a>--}}
    {{--<a class="btn btn-default btn-primary pull-right" href="/places/{{$place->id}}/showAddPhoto">Add--}}
    {{--Photo</a>--}}
    {{--<a class="btn btn-default btn-primary pull-right"--}}
    {{--href="/places/{{$place->id}}/toggleVisibility">Change Visibility</a>--}}
    {{--{!!Form::open(["method" => "DELETE", "route" => ["places.destroy", $place->id]])!!}--}}
    {{--<button type="submit" class="btn btn-default btn-danger pull-right">Delete Place</button>--}}
    {{--{!! Form::close()!!}--}}
    {{--</div>--}}
    {{--<div class="panel-body">--}}
    {{--@foreach($text as $txt)--}}
    {{--<div>--}}
    {{--{{$txt->text or ''}}--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--<div id="links">--}}
    {{--@foreach($photos as $photo)--}}
    {{--<div class="col-lg-3 col-md-4 col-xs-6 thumb">--}}
    {{--<a href="/{{$photo->photoUrl}}" title="Banana" class="thumbnail" data-gallery>--}}
    {{--<img class="img-responsive" src="/{{$photo->photoUrl}}" alt="" width="200px" height="200px">--}}
    {{--</a>--}}
    {{--</div>--}}

    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$place->name}}
                    <small>{{$user['username']}}</small>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Options <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/places/{{$place->id}}/showaddphoto">Add photos</a></li>
                            <li><a href="/places/{{$place->id}}/showaddtext">Add Description</a></li>
                            <li><a href="/places/{{$place->id}}/togglevisibility">Change visibility</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a onclick="document.getElementById('deleteForm').submit(); return false;" href="#">Delete place</a></li>
                        </ul>
                    </div>
                </h1>

            </div>

        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="/uploads/{{$place->mainPhoto}}" alt="">
            </div>

            <div class="col-md-4">
                {!!$place->text->text  or "Ne description!"!!}
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Gallery</h3>
            </div>

            @forelse($photos as $photo)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="/{{$photo->photoUrl}}" title="{{$place->name}}" class="thumbnail" data-gallery>
                        <img class="img-responsive" src="/{{$photo->photoUrl}}" alt="" width="200px" height="200px">
                    </a>
                </div>
            @empty
                <p class="center-block">No photos in gallery! :(</p>
            @endforelse
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Travelers Diary 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    {!! Form::open(['action' => ['PlacesController@destroy', $place->id], 'method' => 'delete', 'id' => "deleteForm"]) !!}

    {!! Form::close() !!}
@endsection