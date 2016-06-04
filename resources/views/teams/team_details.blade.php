@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <h4><strong>{{$team->team_name}} details.</strong></h4>
            </div>
        </div>
        ​
        <div class="row">
            <div class="col-md-2">
                <p><strong>User level</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>Team admin</strong></p>
            </div>
            @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == \Auth::user()->id)
            <div class="col-md-2">
                <p><strong>Edit team</strong></p>
            </div>
            @endif
        </div>
        ​
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Name: </strong> {{$team->team_name}}</li>
                    <li class="list-group-item"><strong>Description: </strong> {{$team->short_description}}</li>
                    <li class="list-group-item"><strong>Description: </strong> {{$team->description}}</li>
                </ul>
            </div>


            <div class="col-md-2">

                @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == \Auth::user()->id)
                <p><button class="btn btn-sm btn-info">Admin</button></p>
                @else
                    <p><button class="btn btn-sm btn-info">Member</button></p>
                @endif
            </div>
            <div class="col-md-2">
                <?php $user_id = $team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id;?>
                <a href="{{ url('profile/userProfile/'.$user_id) }}"><?php $user= new \App\User(); ?>{{$user->where('id', '=', $user_id)->first()->name}}</a>
            </div>
            @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == \Auth::user()->id)
            <div class="col-md-2">
                <p><a href="{{ url('teams/editTeam/'.$team->id) }}" class="btn btn-default">edit this team</a></p>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="row">
                    <h4><strong>Team members</strong></h4>
                </div>
                <div class="row">
                    <table class="table">

                        <thead>
                        <td><strong>Name</strong></td>
                        <td><strong>User level</strong></td>
                        </thead>

                        @if($members->count())
                             @foreach($members as $member)
                        <tr>

                            <td><a href="{{ url('profile/userProfile/'.$member->user->id) }}">{{$member->user->name}}</a></td>
                            <td>
                             @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == $member->user->id)
                                 <p><button class="btn btn-sm btn-info">Admin</button></p>
                             @else
                                 <p><button class="btn btn-sm btn-info">Member</button></p>
                             @endif
                            </td>
                            @endforeach
                        @else
                            No teams found
                        @endif
                         </tr>
                    </table>
                </div>
            </div>
        </div>
        ​
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <h4><strong>Projects belonging to {{$team->team_name}}.</strong></h4>
            </div>
        </div>
        ​
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
        ​
        @if($projects->count())
            @foreach($projects as $project)
                <div class="row">
                    <div class="col-md-1">
                        <p><a href="{{url ('projects/projectDetails/'.$project->project->id) }}">{{$project->project->project_name}}</a></p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$project->project->project_description}}</p>
                    </div>
                    <div class="col-md-2">
                        @if($project->project->project_status == 0)
                            <p>Not Started</p>
                        @endif
                        ​
                        @if($project->project->project_status == 1)
                            <p>Ongoing</p>
                        @endif
                        ​
                        @if($project->project->project_status == 2)
                            <p>Completed</p>
                        @endif
                        ​
                        @if($project->project->project_status == 3)
                            <p>Shelved</p>
                        @endif
                        ​
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