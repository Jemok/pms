@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <h4>Divide your sprint into tasks.</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <form class="form-horizontal" method="post" action="{{ url('/') }}">
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('task_name') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="task_name">Task Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Task name" name="task_name" value="">

                            @if ($errors->has('task_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="col-md-3">
                            <label for="description">Task Description</label>
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
                            <input type="text" class="form-control" placeholder="Deliverable" name="deliverable" value="" >

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
                            <input type="radio" class="form-control" name="task_status" value="" >Not Started

                            @if ($errors->has('task_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="task_status" value="" >Ongoing

                            @if ($errors->has('task_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" class="form-control" name="task_status" >Completed

                            @if ($errors->has('task_status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('task_status') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="started_at">Started at</label>
                        </div>
                        <div class="col-md-9">
                            <input type="datetime" name="started_at" class="form-control" placeholder="Started at" value="<?php  echo date("d-m-y @ h:i:sa",time());?>">
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
