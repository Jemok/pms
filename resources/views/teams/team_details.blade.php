@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h4><strong>(Team name) Details.</strong></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <p><strong>Team name</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>Team short description</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>Team full description</strong></p>
            </div>
            <div class="col-md-2">
                <p><strong>User level</strong></p>
            </div>
            <div>
                <p><strong>Edit team</strong></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <p>Team 1</p>
            </div>
            <div class="col-md-2">
                <p>blah blah blah</p>
            </div>
            <div class="col-md-2">
                <p>blah blah blah</p>
            </div>
            <div class="col-md-2">
                <p><button class="btn btn-sm btn-info">level</button></p>
            </div>
            <div>
                <p><button class="btn btn-default">edit</button> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <h4><strong>Projects belonging to (team name).</strong></h4>
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
                <h5><strong>Status</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>Started_at</strong></h5>
            </div>
            <div class="col-md-2">
                <h5><strong>End</strong></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <p>project 1</p>
            </div>
            <div class="col-md-2">
                <p>blah blah blah</p>
            </div>
            <div class="col-md-2">
                <p>2</p>
            </div>
            <div class="col-md-2">
                <p>3 weeks ago</p>
            </div>
            <div class="col-md-2">
                <p>2 weeks to come</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    <p><strong>There are no registered projects</strong></p>
                </div>
            </div>
        </div>
    </div>
@endsection