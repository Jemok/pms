@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <h4>Divide your sprint into tasks.</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-md-5">
                <form class="form-horizontal" method="post" action="{{ url('tasks/store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="spring-list">Select from Sprint</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="sprint_id">
                            @if($sprints->count())
                                @foreach($sprints as $sprint)
                                    <option value="{{$sprint->sprint->id}}">
                                    {{$sprint->sprint->sprint_name}}/
                                    <?php $sprint_id = $sprint->sprint->id ?>
                                    <?php $project_id = $sprint_project->where('sprint_id', '=', $sprint_id)->first()->project_id ?>
                                    {{$project->findOrFail($project_id)->project_name}}/
                                    {{$sprint->sprint->project->first()->project->team->team->team_name}}
                                    </option>
                                @endforeach
                            @else
                                <option> No Sprint found</option>
                            @endif
                            </select>
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('task_name') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="task_name">Task Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Task name" name="task_name" value="{{ old('task_name')}}">

                            @if ($errors->has('task_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('task_description') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="description">Task Description</label>
                        </div>
                        <div class="col-md-9">
                        <textarea class="form-control" name="task_description" rows="10" value="{{ old('task_description')}}"></textarea>

                            @if ($errors->has('task_description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('deliverable') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="deliverable">Deliverable</label>
                        </div>
                        <div class="col-md-9 ">
                            <input type="text" class="form-control" placeholder="Deliverable" name="deliverable" value="{{ old('deliverable')}}" >

                            @if ($errors->has('deliverable'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('deliverable') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('task_status') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="task_status">Task Status</label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="task_status">Not Started
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="task_status">Ongoing
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="task_status">Completed
                        </div>
                        @if ($errors->has('task_status'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('task_status') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="started_at">Started at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="started_at" class="form-control" placeholder="Started at" value="{{ old('started_at')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="ended_at">Ended at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="ended_at" class="form-control" placeholder="Ended at" value="{{ old('ended_at')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-5">
                            <input type="submit" class="btn btn-lg btn-default" name="save" value="Save">
                        </div>

                    </div>

                </form>
            </div>
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
        </div>
    </div>

@endsection

