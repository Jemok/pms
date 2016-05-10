@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <!-- search for a team-->
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="{{ url('/') }}">
                        {!! csrf_field() !!}
                        <div class="form-group  {{ $errors->has('search') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                <label for="search">Search for a team</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="search" name="search" placeholder="search for a team">
                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end of search-->
            </div>
            <!--display all teams panel-->
            <div class="row">
                <div class="col-md-12">
                   <h4><strong>All available teams!!</strong></h4>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h5><strong>Team name</strong></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><strong>Team full Description</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>Created at</strong></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><strong>Team Admin</strong></h5>
                    </div>
                </div>
            </div>

            @if($teams->count())
                @foreach($teams as $team)
            <div class="row">
                <div class="col-md-2">
                    <p>{{$team->team_name}}</p>
                </div>
                <div class="col-md-4">
                    <p>{{$team->description}}</p>
                </div>
                <div class="col-md-3">
                    <p>{{$team->created_at->diffForHumans()}}</p>
                </div>
                <div class="col-md-3">
                    <p>{{$team->admin->user->name}}</p>
                </div>
            </div>
                @endforeach
                {!! $teams->links() !!}
            @else
                No teams found
            @endif
        </div>
    </div>
</div>
@endsection