@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><p style="text-align: center;">Profile</p></strong>
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

                            <div class="col-md-3">
                                <label for="username">
                                    username
                                </label>
                            </div>
                            <div class="col-md-9">
                                <p>{{\Auth::user()->name}}</p>

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
                                <p>{{\Auth::user()->email}}</p>

                                @if($errors->has('email'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
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