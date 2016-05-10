@extends('layouts.app')

@section('content')

    <div class="container">
        <!--header row-->
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <h4>Divide your project into sprints.</h4>
            </div>
        </div>
        <!--if session for flash message-->
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
        <!--form row-->
        <div class="row">
            <div class="col-md-5">
                <form class="form-horizontal" method="post" action="{{ url('sprints/store') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="project-list">Select from Project</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="project_list">
                                @if($projects->count())
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}" >{{$project->project_name}}</option>
                                    @endforeach
                                @else
                                    <option>No projects found</option>
                                @endif
                            </select>
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('sprint_name') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="sprint_name">Sprint Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="sprint name" name="sprint_name" value="">

                            @if ($errors->has('sprint_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('sprint_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="description">Sprint Description</label>
                        </div>
                        <div class="col-md-9">
                        <textarea class="form-control" name="description" rows="10" >

                        </textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('deliverable') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                <label for="deliverable">Deliverable</label>
                            </div>
                            <div class="col-md-9 ">
                                <input type="text" class="form-control" placeholder="deliverable" name="deliverable" value="" >

                                @if ($errors->has('deliverable'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('deliverable') }}</strong>
                                        </span>
                                @endif
                            </div>
                       </div>
                    <div class="form-group {{ $errors->has('milestone') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="milestone">Milestone</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="milestone" name="milestone" value="" >

                            @if ($errors->has('milestone'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('milestone') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="started_at">Started at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="started_at" class="form-control" placeholder="Started at" value="<?php  echo date("d-m-y @ h:i:sa",time());?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="ended_at">Ended at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="ended_at" class="form-control" placeholder="Ended at" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-5">
                            <input type="submit" class="btn btn-lg btn-default" name="save" value="Save">
                        </div>
                    </div>
                </form>
            </div>

            {{--<div class="col-md-6">--}}
                {{--<div class="row">--}}
                    {{--<h4><strong>Registered Sprints</strong></h4>--}}
                {{--</div>--}}
                {{--<div class="row" id="sprint_heading">--}}
                    {{--<div class="col-md-2">--}}
                        {{--<strong>Name</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<strong>Description</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-1">--}}
                        {{--<strong>Deliverable</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-1  col-md-offset-1">--}}
                        {{--<strong>Milestone</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-1  col-md-offset-1">--}}
                        {{--<strong>Started_at</strong>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-1  col-md-offset-1">--}}
                        {{--<strong>End</strong>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <!-- output for sprints-->
            {{--@if($sprints->count())--}}
            {{--@foreach($sprints as $sprint)--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-2">--}}
                        {{--{{$sprints->sprint_name}}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--{{$sprints->description}}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--{{$sprints->deliverable}}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--{{$sprints->milestone}}--}}
                    {{--</div>--}}

                    {{--<div class="col-md-2 col-md-offset-1">--}}
                        {{--{{$project->started_at->diffForHumans()}}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-2">--}}
                        {{--{{$project->ended_at->diffForHumans()}}--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--@endforeach--}}
            {{--@else--}}
                {{--<div class="alert alert-info alert-dismissible" role="alert">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<p><strong>There are no registered sprints</strong></p>--}}
                {{--</div>--}}
            {{--@endif--}}

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
    </div>


@endsection