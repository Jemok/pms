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
    @if($sprints->count())
        @foreach($sprints as $sprint)
    <div class="row">
        <div class="col-md-1">
            <p><a href="{{ url('sprints/show') }}">{{$sprint->sprint->sprint_name}}</a></p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->sprint_description}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->deliverable}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->milestone}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->started_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-2">
            <p>{{$sprint->sprint->ended_at->diffForHumans()}}</p>
        </div>
        <div class="col-md-1">
            <p><a href="{{ url('profile/userProfile/'.$sprint->sprint->creator->user_id)}}">{{$sprint->sprint->creator->user->name}}</p>
        </div>
    </div>
    {!! $sprints->links() !!}
    @endforeach
    @else
    No sprints found for this project
    @endif
</div>
@endsection