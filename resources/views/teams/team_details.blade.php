@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        {{--left content--}}
        <div class="col-md-8">

                {{--details title--}}
                <div class="col-md-5">
                    <div class="row"><h5><strong><u>{{$team->team_name}} details.</u></strong></h5></div>

                    {{--details--}}
                        <div class="row">
                            <ul class="list-group list-unstyled">
                                <li><strong>Name:&nbsp;</strong> {{$team->team_name}}</li>
                                <li><strong>Description:&nbsp;</strong>{{$team->description}}</li>
                            </ul>
                        </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h5><strong><u>{{$team->team_name}}&nbsp;credentials</u></strong></h5>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row"><h5><strong>User level</strong></h5></div>
                            <div class="row">
                                @if($members->count())
                                @foreach($members as $member)
                                <p><a href="{{ url('profile/userProfile/'.$member->user->id) }}">{{$member->user->name}}</a></p>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row"><h5><strong>Team admin</strong></h5></div>
                            <div class="row">
                                @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == \Auth::user()->id)
                                <p><button class="btn btn-sm btn-info">Admin</button></p>
                                @else
                                <p><button class="btn btn-sm btn-info">Member</button></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row"><h5><strong>Edit Team</strong></h5></div>
                            <div class="row">
                                @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == \Auth::user()->id)
                                    <p><a href="{{ url('teams/editTeam/'.$team->id) }}" class="btn btn-default">edit this team</a></p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        {{--end left top content--}}


        {{--right content--}}
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h5><strong><u>Projects in {{$team->team_name}}</u></strong></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">


                            @if($projects->count())
                        <thead>
                        <td><strong>Name</strong></td>
                        <td><strong>Close project</strong></td>
                        </thead>
                            @foreach($projects as $project)
                               <tr>
                                   <td><a href="{{url ('projects/projectDetails/'.$project->project->id) }}">{{$project->project->project_name}}</a></td>
                                   <td><p><button class="btn btn-sm btn-info">Close</button></p></td>
                            @endforeach

                            {!! $projects->links() !!}
                            @else
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        <p><strong>There are no registered projects</strong></p>
                                    </div>
                            @endif

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="col-md-9">
                <div class="row">
                    <h5><strong><u>Team members</u></strong></h5>
                </div>
                <div class="row">
                    <table class="table">

                        <thead>
                        <td><strong>Name</strong></td>
                        <td><strong>User level</strong></td>
                        <td><strong>Remove member</strong></td>
                        </thead>

                        @if($members->count())
                        @foreach($members as $member)
                        <tr>

                            <td><a href="{{ url('profile/userProfile/'.$member->user->id) }}">{{$member->user->name}}</a></td>
                            <td>
                                @if($team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->id)->first()->user_id == $member->user->id)
                                <p><button class="btn btn-sm btn-info">Admin</button></p>
                                @else
                                <p><button class="btn btn-sm btn-info">Member</button></p>
                                @endif
                            </td>
                            <td>
                                <p><button class="btn btn-sm btn-info">Remove</button></p>
                            </td>
                            @endforeach
                            @else
                            No teams found
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection