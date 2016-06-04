@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        {{--flash message--}}

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

{{--project details--}}
        <div class="row">
            {{--left content--}}
            <div class="col-md-5">
                <div class="col-md-6">
                    <div class="row">
                        <h5><strong>Details</strong></h5>
                    </div>

                    <div class="row">
                        <ul class="list-group list-unstyled">
                            <li><strong>Description:&nbsp;</strong>{{$project->project_description}}</li>
                            <li><strong>Status:&nbsp;</strong>
                                @if($project->project_status == 0)
                                Not Started
                                @endif
                                ​
                                @if($project->project_status == 1)
                                Ongoing
                                @endif
                                ​
                                @if($project->project_status == 2)
                                Completed
                                @endif
                                ​
                                @if($project->project_status == 3)
                                Shelved
                                @endif
                            </li>
                            <li><strong>Start:&nbsp;</strong>time here</li>
                            <li><strong>End:&nbsp;</strong>time here</li>
                        </ul>
                    </div>
                </div>

                {{--edit projects button--}}
                <div class="col-md-5 col-md-offset-1">
                    <div class="row">
                        <h5><strong>Edit</strong></h5>
e                    </div>
                    <div class="row">
                        <ul class="list-group list-unstyled">
                            <li><a href="{{ url('projects/edit') }}"><button class="btn btn-default">Edit project</button></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--end left content--}}

            {{--right content--}}
            <div class="col-md-5 col-sm-offset-1">
                <div class="col-md-5">
                    <div class="row">
                        <h5><strong>Sprint in this project</strong></h5>
                    </div>
                    <div class="row">
                        @if($sprints->count())
                        @foreach($sprints as $sprint)
                        <ul class="list-group list-unstyled">
                            <li><strong>Name:&nbsp;</strong><a href="{{ url('sprints/show/'.$sprint->sprint->id) }}">{{$sprint->sprint->sprint_name}}</a></li>
                        </ul>
                        {!! $sprints->links() !!}
                        @endforeach
                        @else
                        No sprints found for this project
                        @endif
                    </div>
                </div>
            </div>
            {{--end right content--}}
        </div>

{{--adding members--}}
        <div class="row">
            {{--left column --}}
            <div class="col-md-5">
                <div class="col-md-5">
                    <div class="row">
                        <h5><strong>Add member to project</strong></h5>
                    </div>
                    <div class="row">
                        <div class="panel panel-default">
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

                {{--members of a project--}}
                <div class=" col-md-offset-1 col-md-6">
                    <div class="row">
                        <h5><strong>{{$project->project_name}} members</strong></h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                                No members for this project
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--end of major column--}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <h4><strong>Sprints in project</strong></h4>
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
            <p><a href="{{ url('sprints/show/'.$sprint->sprint->id) }}">{{$sprint->sprint->sprint_name}}</a></p>
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