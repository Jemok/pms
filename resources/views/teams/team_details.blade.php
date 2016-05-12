@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h4><strong>{{$team->team_name}} details.</strong></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="col-md-2">
                    <h5><strong>Team name</strong></h5>
                    <p>{{$team->team_name}}</p>
                </div>
                <div class="col-md-2">
                    <h5><strong>Short description</strong></h5>
                    <p>{{$team->short_description}}</p>
                </div>
                <div class="col-md-2">
                    <h5><strong>Full description</strong></h5>
                    <p>{{$team->description}}</p>
                </div>
                <div class="col-md-2">
                    <h5><strong>User level</strong></h5>
                    @if($team->admin->user_id == \Auth::user()->id)
                        <p><button class="btn btn-sm btn-info">Admin</button></p>
                    @else
                        <p><button class="btn btn-sm btn-info">Member</button></p>
                        @endif
                </div>
                <div class="col-md-2">
                    <h5><strong>Team admin</strong></h5>
                    <p><a href="{{ url('profile/userProfile') }}">{{$team->admin->user->name}}</a></p>
                </div>
                <div class="col-md-2">
                    <h5><strong>Edit team</strong></h5>
                    <p><a href="{{ url('teams/editTeam/'.$team->id) }}" class="btn btn-default">edit this team</a></p>
                </div>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <div class="row">
                    <h5><strong>Switch Admin</strong></h5>
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

        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <h4><strong>Projects belonging to {{$team->team_name}}.</strong></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <h5><strong>Name</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>Description</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>Status</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>Started_at</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>End</strong></h5>
            </div>
        </div>

        @if($projects->count())
            @foreach($projects as $project)
            <div class="row">
                <div class="col-md-1">
                    <p>{{$project->project->project_name}}</p>
                </div>
                <div class="col-md-2">
                    <p>{{$project->project->description}}</p>
                </div>
                <div class="col-md-2">
                    @if($project->project->project_status == 0)
                        <p>Not Started</p>
                    @endif

                    @if($project->project->project_status == 1)
                        <p>Ongoing</p>
                    @endif

                    @if($project->project->project_status == 2)
                         <p>Completed</p>
                    @endif

                     @if($project->project->project_status == 3)
                          <p>Shelved</p>
                     @endif

                </div>
                <div class="col-md-2">
                    <p>{{$project->project->started_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-2">
                    <p>{{$project->project->ended_at->diffForHumans()}}</p>
                </div>
            </div>
            @endforeach
            {!! $projects->links() !!}
            @else
                   <div class="row">
                           <div class="col-md-5 col-md-offset-2">
                               <div class="alert alert-info alert-dismissible" role="alert">
                                   <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                   <p><strong>There are no registered projects</strong></p>
                               </div>
                           </div>
                       </div>
            @endif
    </div>
@endsection