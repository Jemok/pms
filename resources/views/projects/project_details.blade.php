@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        @if(Session::has("flash_message") || Session::has("flash_message_error") )
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-dismissible {{Session::has('flash_message_error') ? 'alert-warning' : 'alert-success' }}" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{session("flash_message")}}</strong>
                        <strong>{{session("flash_message_error")}}</strong>

                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="row">
                <h4><strong>Project, {{$project->project_name}},members</strong></h4>
            </div>
            <div class="row">
                <table class="table">

                    <thead>
                    <td><strong>Name</strong></td>
                    </thead>
                    @if($project_users->count())
                        @foreach($project_users as $user)
                        <tr>
                            <td><a href="{{ url('profile/userProfile/'.$user->id) }}">{{$user->user->name}}</a></td>
                        </tr>
                        @endforeach
                    @else

                    @endif
                </table>
            </div>
        </div>
            <div class="col-md-7 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3">
                        <h5><strong>Description</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><strong>Status</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>Start</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>End</strong></h5>
                    </div>
            </div>

                <div class="row">
                        <div class="col-md-3">
                            <p>{{$project->project_description}}</p>
                        </div>
                        <div class="col-md-2">
                            @if($project->project_status == 0)
                                <p>Not Started</p>
                             @endif
                                                   ​
                             @if($project->project_status == 1)
                                 <p>Ongoing</p>
                             @endif
                                                   ​
                             @if($project->project_status == 2)
                                 <p>Completed</p>
                             @endif
                                                   ​
                             @if($project->project_status == 3)
                                 <p>Shelved</p>
                             @endif
                        </div>
                        <div class="col-md-3">
                            <p>2 hrs ago</p>
                        </div>
                        <div class="col-md-3">
                            <p>5 day to go</p>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-3">
                        <div class="row">
                            <h4><strong>Add member to project</strong></h4>
                        </div>
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 style="text-align: center"><strong>Member Assign</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="post" action="{{ url('projects/addMember/'.$project->id) }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                 <?php $user = new \App\User(); ?>
                                                <select class="form-control" name="user_id">
                                                    @if($team_users->count())
                                                        @foreach($team_users as $team_user)
                                                            <option value="{{$user->where('id', '=', $team_user->user_id)->first()->id}}">{{ $user->where('id', '=', $team_user->user_id)->first()->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option selected>No team members found</option>

                                                    @endif
                                                </select>
                                                @if($errors->has('user_id'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <button class="btn btn-info btn-sm" type="submit" name="change">Assign member</button>
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

    <div class="row">
        <div class="col-md-5">
            <h4>Sprints in project</h4>
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
            <h5><strong>Deliverable</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>Status</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>Start</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>End</strong></h5>
        </div>
        <div class="col-md-1">
            <h5><strong>Created by</strong></h5>
        </div>
    </div>
    @if($sprints->count())
        @foreach($sprints as $sprint)
    <div class="row">
        <div class="col-md-1">
            <p><a href="{{ url('sprints/show') }}">{{$sprint->sprint->sprint_name}}</a></p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->sprint_description}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->deliverable}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->milestone}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->started_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->ended_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-1">
            <p><a href="{{ url('profile/userProfile/'.$sprint->sprint->creator->user_id)}}">{{$sprint->sprint->creator->user->name}}</a></p>
        </div>
    </div>
    {!! $sprints->links() !!}
    @endforeach
    @else
    No sprints found for this project
    @endif

    <div class="row">

    </div>
</div>
@endsection