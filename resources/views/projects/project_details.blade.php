@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <h4><strong>Project (name) members</strong></h4>
            </div>
            <div class="row">
                <table class="table">

                    <thead>
                    <td><strong>Name</strong></td>
                    <td><strong>User level</strong></td>
                    </thead>
                    <tr>
                        <td><a href="{{'/'}}">name</a></td>
                        <td>

                            <p><button class="btn btn-sm btn-info">Admin</button></p>

                            <p><button class="btn btn-sm btn-info">Member</button></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

            <div class="col-md-7 col-md-offset-1">
                <div class="row">
                    <div class="col-md-3">
                        <h5><strong>Description</strong></h5>
                    </div>
                    <div class="col-md-2">
                        <h5><strong>Status</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>Start</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>End</strong></h5>
                    </div>
            </div>

                <div class="row">
                        <div class="col-md-3">
                            <p>dkkgekrgjrk</p>
                        </div>
                        <div class="col-md-2">
                            <p>md,fgj</p>
                        </div>
                        <div class="col-md-3">
                            <p>2 hrs ago</p>
                        </div>
                        <div class="col-md-3">
                            <p>5 day to go</p>
                        </div>
                </div>
        </div>

    </div>

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
            <p><a href="{{ url('profile/userProfile/'.$sprint->sprint->creator->user_id)}}">{{$sprint->sprint->creator->user->name}}</a></p>
        </div>
    </div>
    {!! $sprints->links() !!}
    @endforeach
    @else
    No sprints found for this project
    @endif
</div>
@endsection