@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <strong><p>View Team Details</p></strong>
                @if($teams->count())
                    @foreach($teams as $team)
                        {{$team->team_name}}
                    @endforeach
                @endif
                Description...
            </div>
        </div>
    </div>
@endsection