@extends('layouts.app')
@section('content')
    <div class="container">
        <?php

        $project_sprint = new \App\ProjectSprint();

        $project_id = $project_sprint->where('sprint_id', '=', $sprint->id)->first()->project_id;

        $project_team = new \App\ProjectTeam();

        $team_id = $project_team->where('project_id', '=', $project_id)->first()->team_id;

        $team_admin = \App\TeamAdmin::where('team_id', '=', $team_id)->first()->user_id;

        ?>
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
                    <h4><strong>Sprints {{$sprint->sprint_name}} members</strong></h4>
                </div>
                <div class="row">
                    <div class="table">
                        <table class="table">
                            <thead>
                            <strong>Name</strong>
                            </thead>
                            @if($sprint_users->count())
                                @foreach($sprint_users as $user)
                                    <tr>
                                        <td><a href="{{ url('profile/userProfile/'.$user->id) }}">{{$user->user->name}}</a></td>
                                    </tr>
                                @endforeach
                            @else
                                No members for this project
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-md-offset-1">
                <div class="row">
                    <div class="col-md-2">
                        <h5><strong>Description</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><strong>Deliverables</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>Milestone</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><strong>Start</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><strong>End</strong></h5>
                    </div>
                    <div class="col-md-1">
                        <h5><strong>Edit</strong></h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <p>{{$sprint->sprint_description}}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$sprint->deliverable}}</p>
                    </div>
                    <div class="col-md-3">
                        <p>{{$sprint->milestone}}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$sprint->started_at->diffForHumans()}}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{$sprint->ended_at->diffForHumans()}}</p>
                    </div>
                    @if($team_admin = \Auth::user()->id)
                    <div class="col-md-1">
                        <p><a href="{{url ('sprints/edit')}}"><button class="btn btn-default">Edit sprint</button></a></p>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-2">
                        <div class="row">
                            <h4><strong>Add member to Sprint</strong></h4>
                        </div>
                        <div class="row">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 style="text-align: center"><strong>Member Assign</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="post" action="{{ url('sprints/addMember/'.$sprint->id) }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                <?php $user = new \App\User(); ?>
                                                <select class="form-control" name="user_id">
                                                    @if($project_users->count())
                                                        @foreach($project_users as $project_user)
                                                            <option value="{{$user->where('id', '=', $project_user->user_id)->first()->id}}">{{ $user->where('id', '=', $project_user->user_id)->first()->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option selected>No project members found</option>
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
                <h4>Tasks in Sprint(name)</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-2">
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
            </div>
            <div class="col-md-3">
                <div class="col-md-5">
                    <h5><strong>Assigned to</strong></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-5">
                    <h5><strong>Reassign</strong></h5>
                </div>
            </div>
        </div>
        @if($tasks->count())
            @foreach($tasks as $task)
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-2">
                    <p><a href="#">{{$task->task->task_name}}</a></p>
                </div>
                <div class="col-md-2">
                    <p>{{$task->task->task_description}}</p>
                </div>
                <div class="col-md-2">
                    <p>{{$task->task->deliverable}}</p>
                </div>
                <div class="col-md-2">
                        @if($task->task->task_status == 0)
                            <p>Not Started</p>
                        @endif

                        @if($task->task->task_status == 1)
                            <p>Ongoing</p>
                        @endif

                        @if($task->task->task_status == 2)
                            <p>Completed</p>
                        @endif
                </div>
                <div class="col-md-2">
                    <p>{{$task->task->started_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-2">
                    <p>{{$task->task->ended_at->diffForHumans()}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <?php $task_user = new  \App\Task_user(); ?>
                        @if($task_user->where('task_id', '=', $task->task->id)->exists())
                            <?php $user = $task_user->where('task_id', '=', $task->task->id)->where('activity', '=', 1)->with('user')->first(); ?>
                        <p><a href="{{ url('profile/userProfile/'.$user->user->id)  }}">{{ $user->user->name  }}</a> </p>
                        @else

                        @if($team_admin == \Auth::user()->id)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="text-align: center"><strong>Assign task to user</strong></h5>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" method="post" action="{{ url('tasks/assignMember/'.$task->task->id) }}">
                                    {!! csrf_field() !!}
                                    <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            @if($sprint_users->count())
                                            <select class="form-control" name="user_id">
                                                <option selected>Select a user</option>
                                                @foreach($sprint_users as $user)
                                                    <option value="{{$user->user->id}}">{{$user->user->name}}</option>
                                                @endforeach
                                            </select>
                                            @else
                                                No users for sprint
                                            @endif
                                            @if($errors->has('user_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <button class="btn btn-info btn-sm" type="submit" name="change">Assign Task</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12">
                    <div class="col-md-12">
                        @if($team_admin == \Auth::user()->id)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 style="text-align: center"><strong>Assign task to user</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="post" action="{{ url('tasks/assignMember/'.$task->task->id) }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                            <div class="col-md-12">
                                                @if($sprint_users->count())
                                                    <select class="form-control" name="user_id">
                                                        <option selected>Select a user</option>
                                                        @foreach($sprint_users as $user)
                                                            <option value="{{$user->user->id}}">{{$user->user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    No users for sprint
                                                @endif
                                                @if($errors->has('user_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <button class="btn btn-info btn-sm" type="submit" name="change">Assign Task</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
                @endforeach
            @else
                No tasks found
            @endif

        </div>

        </div>
    </div>

@endsection