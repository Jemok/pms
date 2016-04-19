@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in Please create a team!
                        <form class="form-horizontal" method="post" action="{{ url('teams/store') }}">
                            {!! csrf_field() !!}
                            <div class="form-group {{ $errors->has('team_name') ? ' has-error' : '' }}">
                                <label for="team_name" class="col-sm-2 control-label">Team name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="team-name" name="team_name" placeholder="Team name">

                                    @if ($errors->has('team_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('team_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" name="description" rows="10">

                                   </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default" name="create_team">Create team</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--search-->
            <div class="col-md-offset-1 col-md-5">
                <div class="row">
                    <form class="form-horizontal" method="post" action="{{ url('/') }}">
                        {!! csrf_field() !!}
                        <div class="form-group  {{ $errors->has('search') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                <label for="search">Search for a team</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="search" name="search" placeholder="search for a team">
                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-default">search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--display teams created-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Teams that you created
                    </div>
                    <div class="panel-body">
                        display here
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
