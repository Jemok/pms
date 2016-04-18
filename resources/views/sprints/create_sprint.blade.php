@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <h4>Divide your project into sprints.</h4>
            </div>

        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <form class="form-horizontal" method="post" action="{{ url('/') }}">
                    {!! csrf_field() !!}
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