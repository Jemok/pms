@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h4>Sprints in project</h4>
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
    <div class="row">
        <div class="col-md-1">
            <p><a href="{{ url ('sprints/show') }}">Name</a></p>
        </div>
        <div class="col-md-2">
            <p>Description</p>
        </div>
        <div class="col-md-2">
            <p>Deliverable</p>
        </div>
        <div class="col-md-2">
            <p>ongoing</p>
        </div>
        <div class="col-md-2">
            <p>Start</p>
        </div>
        <div class="col-md-2">
            <p>End</p>
        </div>
        <div class="col-md-1">
            <p>Renn</p>
        </div>
    </div>
</div>
@endsection