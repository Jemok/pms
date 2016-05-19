@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h4>Tasks in Sprint(name)</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
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
                    <h5><strong>Milestone</strong></h5>
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
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-1">
                    <p><a href="#">Name</a></p>
                </div>
                <div class="col-md-2">
                    <p>Description</p>
                </div>
                <div class="col-md-2">
                    <p>Deliverable</p>
                </div>
                <div class="col-md-2">
                    <p>Milestone</p>
                </div>
                <div class="col-md-2">
                    <p>Start</p>
                </div>
                <div class="col-md-2">
                    <p>End</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-md-12">
                    <p>Renn</p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 style="text-align: center"><strong>Assign task</strong></h5>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="#">
                                {!! csrf_field() !!}
                                <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <select class="form-control" name="user_id">
                                            <option>name</option>
                                            <option>name</option>
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
                                        <button class="btn btn-info btn-sm" type="submit" name="change">Assign Task</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection