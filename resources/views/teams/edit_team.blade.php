@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 style="text-align: center;"><strong>Edit this team</strong></h5>
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
                            <form class="form-horizontal" method="post" action="{{url('teams/update/'.$team->id)}}">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('team_name') ? ' has-error' : '' }}">
                                    <div class="col-md-4">
                                        <label for="team_name">
                                            Team name
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="team_name" value="{{$team->team_name}}">
                                        @if($errors->has('team_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('team_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
                                    <div class="col-md-4">
                                        <label for="short_description">
                                            Short description
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                <textarea class="form-control" name="short_description" rows="5">{{$team->short_description}}</textarea>
                                        @if($errors->has('short_description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                    <div class="col-md-4">
                                        <label for="edit_team_full_description">
                                            Full description
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                <textarea class="form-control" name="description" rows="10">{{$team->description}}</textarea>
                                        @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-info btn-block" name="save">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-md-3 col-md-offset-1">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 style="text-align: center"><strong>Switch Admin</strong></h5>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="#">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('admin_id') ? ' has-error' : '' }}">
                                    <div class="col-md-7">
                                        <select class="form-control" name="admin_id">
                                            <option value="" >member name</option>
                                            <option>No projects found</option>
                                        </select>
                                        @if ($errors->has('admin_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('admin_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-info btn-sm" name="change">change admin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

@endsection