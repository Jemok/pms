@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <h4><strong>All Existing Projects</strong></h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <h5><strong>Name</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>Description</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>Status</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>Started at</strong></h5>
        </div>
        <div class="col-md-2">
            <h5><strong>End </strong></h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <p>Project 1</p>
        </div>
        <div class="col-md-2">
            <p>blah blah blah</p>
        </div>
        <div class="col-md-2">
            <p>1</p>
        </div>
        <div class="col-md-2">
            <p>12 hours</p>
        </div>
        <div class="col-md-2">
            <p>5 weeks to go</p>
        </div>
    </div>
</div>
@endsection