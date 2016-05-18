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
                                    <input type="text" class="form-control" id="team-name" name="team_name" placeholder="Team name" value="{{ old('team_name')}}">

                                    @if($errors->has('team_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('team_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('short_description') ? ' has-error' : '' }}">
                                <label for="short_description" class="col-sm-2 control-label">Short Description</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" name="short_description" rows="5" value="{{ old('short_description')}}"></textarea>
                                    @if ($errors->has('short_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-sm-2 control-label"> Full Description</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" name="description" rows="10" value="{{ old('description')}}"></textarea>
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
                        <a href={{ url('teams/allTeams') }}><h5><strong>View all available teams...</strong></h5></a>
                    </div>
                </div>

                <!--display teams created-->
                <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="text-align: center"><strong>Teams that you are a member of</strong></h5>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5><strong>Team name</strong></h5>
                                    </div>
                                    <div class="col-md-4 col-md-offset-1">
                                        <h5><strong>Short Description</strong></h5>
                                    </div>

                                     <div class="col-md-3">
                                        <h5><strong>User Level</strong></h5>
                                     </div>
                                </div>

                                @if($teams->count())
                                    @foreach($teams as $team)
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="{{ url('teams/teamDetails/'.$team->team->id) }}"><p>{{$team->team->team_name}}</p></a>
                                            </div>
                                            <div class="col-md-4 col-md-offset-1">
                                               <p>{{$team->team->short_description}}</p>
                                            </div>
                                            <div class="col-md-3">
                                                @if($team->team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->team->id)->first()->user_id == \Auth::user()->id)
                                                        <p><button class="btn btn-sm btn-info">admin</button></p>
                                                @else
                                                        <p><button class="btn btn-sm btn-info">member</button></p>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        <p><strong>You currently have no teams..</strong></p>
                                    </div>
                                @endif
                                @if($teams->count() == 5)
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10">
                                        <a href="{{ url('teams/userTeams') }}" class="btn btn-default btn-block">View more of your teams</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
