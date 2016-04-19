@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <h4>Create a project to enable you work!!</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <form class="form-horizontal" method="post" action="{{ url('/') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="team-list">Allocate to team</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" name="team_list">
                                <option>POS</option>
                                <option>mafisi</option>
                                <option>malion</option>
                                <option>Pizza</option>
                                <option>execution</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group {{ $errors->has('project_name') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="project_name">Project Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="project name" name="project_name" value="">

                            @if ($errors->has('project_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="description">Project Description</label>
                        </div>
                        <div class="col-md-9">
                        <textarea class="form-control" name="description" rows="10">

                        </textarea>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('project_status') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="project_status">Project Status</label>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" value="" >Not Started

                            @if ($errors->has('project_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" value="" >Ongoing

                            @if ($errors->has('project_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="project_status" >Completed

                            @if ($errors->has('project_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control"  name="project_status" >Shelved

                            @if ($errors->has('project_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('project_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="started_at">Started at</label>
                        </div>
                        <div class="col-md-9 input-group date" data-provide="datepicker">
                            <input type="text"  name="started_at" class="form-control" placeholder="Started at">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="ended_at">Ended at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="datetime" name="ended_at" class="form-control" placeholder="Ended at" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-5">
                            <input type="submit" class="btn btn-lg btn-default" name="save" value="Save">
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection