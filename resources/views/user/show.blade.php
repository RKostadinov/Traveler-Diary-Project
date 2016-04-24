@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings</div>
                    <div class="panel-body">
                        {!! Form::model($user,['action'=>['UserController@update', $user->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'files' => true]) !!}
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">Profile picture:</label>
                            <div class="col-sm-9">
                                <div class="image-upload">
                                    <label id="label-profile" for="file-input">
                                        <img id="profile_pic_preview" src="/{{$user->profilePicture}}"/>
                                    </label>

                                    <input id="file-input" type="file" name="profilePicture" style="display: none;"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstName" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9">
                                {!! Form::input("text", "firstName", null,['class'=>'form-control', 'required'=>'']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                {!! Form::input("text", "lastName", null,['class'=>'form-control', 'required'=>'']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <p class="form-control-static">{{$user->email}}</p>
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <div class="col-sm-9">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_pic_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file-input").change(function () {
            readURL(this);
        });
    </script>
@endsection