@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><p style="text-align: center;">My Profile</p></strong>
                </div>
                    <div class="panel-body">

                        @if(Session::has("flash_message"))
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>{{session("flash_message")}}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form class="form-horizontal" method="post" action="{{url('profile/update')}}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-3">
                                    <label for="username">
                                        username
                                    </label>
                                </div>
                                <div class="col-md-9">
                                    <strong><input type="text" name="name" value="{{\Auth::user()->name}}" class="form-control"></strong>

                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-3">
                                        <label for="email">
                                            E-mail
                                        </label>
                                    </div>

                                    <div class="col-md-9">
                                        <strong><input type="email" name="email" value="{{\Auth::user()->email}}" class="form-control"></strong>
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button class="btn btn-info btn-block" name="password">Edit your password</button>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-5">
                                    <input type="submit" class="btn btn-default" name="edit" value="edit profile">
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection