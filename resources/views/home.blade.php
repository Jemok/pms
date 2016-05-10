@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in Please create a team!
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
                                    <button type="submit" class="btn btn-default" name="create_team"><span class="glyphicon glyphicon-plus"></span> team</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--search-->
            <div class="col-md-offset-1 col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <a href={{'teams/allTeams'}}><h5><strong>View all available teams...</strong></h5></a>
                    </div>
                </div>

                <!--display teams created-->
                <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Teams that you are a member of</strong>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <strong>Team name</strong>
                                    </div>
                                    <div class="col-md-5">
                                        <strong>Description</strong>
                                    </div>
                                </div>

                                @if($teams->count())
                                    @foreach($teams as $team)
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="{{'teams/index'}}">{{$team->team->team_name}}</a>
                                            </div>
                                            <div class="col-md-5">
<<<<<<< HEAD
                                               {{$team->team->description}}
=======
                                               {{$team->description}}
                                            </div>
                                            <div class="col-md-1">
                                                <a href="#"><button class="btn btn-default" name="view_teams">View Project</button></a>
>>>>>>> d57a6a81578ff59c44461dac138c496025ccea7d
                                            </div>
                                             @if($team->user_category == 0)
                                               <button class="btn btn-small btn-info">.</button>
                                             @endif
                                        </div>
                                    @endforeach
                                @else
                                    <h4>No teams found</h4>
                                @endif
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-3">
                                        <button class="btn btn-default btn-group">View more of your teams</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
