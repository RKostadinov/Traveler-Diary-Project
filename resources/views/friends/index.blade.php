@extends('layouts.app')

@section('content')
    {{--{!! dd($not_friends) !!}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Places</div>
                    <div class="panel-body">
                        <h2 class="subheader text-center">Your Friends</h2>

                        <table style="width:100%;" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\Auth::user()->friends()->get() as $friend)
                                <tr>
                                    <td>{{ $friend->username }}</td>
                                    <td>{{ $friend->email }}</td>
                                    <td>{!! link_to_action('FriendsController@getRemoveFriend', 'Remove friend', array('id' => $friend->id)) !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <h2 class="subheader text-center">Other People</h2>
                            <table style="width:100%;" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($not_friends as $friend)
                                    <tr>
                                        <td>{{ $friend->username }}</td>
                                        <td>{{ $friend->email }}</td>
                                        <td>{!! link_to_action('FriendsController@getAddFriend', 'Add friend', array('id' => $friend->id)) !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection