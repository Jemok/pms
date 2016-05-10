@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- heading-->
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <h4>Create a project to enable you work!!</h4>
            </div>
        </div>

        <!--flash message if statement-->
        @if(Session::has("flash_message"))
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{session("flash_message")}}</strong>
                    </div>
                </div>
            </div>
        @endif
        <!--project creation form-->
        <div class="row">
            <div class="col-md-5">
                <form class="form-horizontal" method="post" action="{{ url('projects/store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="team_id">Allocate to team</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="team_id">
                                @if($teams->count())
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">{{$team->team_name}}</option>
                                    @endforeach
                                @else
                                    <option>no teams found</option>
                                @endif
                            </select>
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('project_name') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="project_name">Project Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="project name" name="project_name">

                            @if ($errors->has('project_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('project_description') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="description">Project Description</label>
                        </div>
                        <div class="col-md-9">
                        <textarea class="form-control" name="project_description" rows="10">

                        </textarea>

                            @if ($errors->has('project_description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('project_status') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="project_status">Project Status</label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" value="0">Not Started
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" value="1">Ongoing
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" value="2">Completed
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control"  name="project_status" value="3">Shelved
                        </div>
                        @if ($errors->has('project_status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('project_status') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="started_at">Started at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date"  name="started_at" class="form-control" placeholder="Started at">
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="ended_at">Ended at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="ended_at" class="form-control" placeholder="Ended at">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-5">
                            <input type="submit" class="btn btn-lg btn-default" value="Save">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <h4><strong>Registered Projects</strong></h4>
                <div class="row" id="project_heading">
                    <div class="col-md-2">
                        <strong>Name</strong>
                    </div>
                    <div class="col-md-4">
                        <strong>Description</strong>
                    </div>
                    <div class="col-md-1">
                        <strong>Status</strong>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <strong>Started_at</strong>
                    </div>
                    <div class="col-md-2">
                        <strong>Ended_at</strong>
                    </div>
                </div>

<!--output projects-->
                <!--start for each-->
                @if($projects->count())
                @foreach($projects as $project)
                    <div class="row">
                        <div class="col-md-2">
                            {{$project->project_name}}
                        </div>
                        <div class="col-md-4">
                            {{$project->project_description}}
                        </div>
                        <div class="col-md-1">
                            {{$project->project_status}}
                        </div>
                        <div class="col-md-2 col-md-offset-1">
                            {{$project->started_at}}
                        </div>
                        <div class="col-md-2">
                            {{$project->ended_at}}
                        </div>
                    </div>
                @endforeach
                    @else
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    <p><strong>There are no registered projects</strong></p>
                </div>
                    @endif
            </div>
        </div>
    </div>
@endsection