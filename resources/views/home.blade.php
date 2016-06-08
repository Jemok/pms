@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has("flash_message"))
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{session("flash_message")}}</strong>
            </div>
        </div>
    </div>
    @endif


        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><strong>Welcome to PMS</strong></h5>
                    </div>

                    <div class="panel-body">
                        <p>To proceed,Please create a team!</p>

                        <p style="text-align: center;">
                            <!-- Button trigger modal -->
                            <a href=""> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_team">
                                Create team
                            </button></a>
                        </p>
                       
                        <p style="font-size: 30px; text-align: center;"><strong>OR</strong></p>
                        <p>Send a request to join any existing team you want to be a part of.</p>
                        <p style="text-align: center;">
                            <!-- Button trigger modal -->
                            <a href="#"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_team">
                                Send Request
                            </button></a>
                        </p>


                    </div>
                </div>
            </div>

            <!--search-->
            <div class="col-md-offset-1 col-md-4">

                <a href={{ url('teams/allTeams') }}><h5><strong>View all available teams...</strong></h5></a>

                <!--display teams created-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 style="text-align: center"><strong>Teams that you are a member of</strong></h5>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <td><strong>Team name</strong></td>
                                        <td><strong>User Level</strong></td>
                                        <td><strong>Close team</strong></td>
                                    </tead>


                                @if($teams->count())
                                    @foreach($teams as $team)
                                        <tr>
                                            <td>
                                                <a href="{{ url('teams/teamDetails/'.$team->team->id) }}"><p>{{$team->team->team_name}}</p></a>
                                            </td>
                                            <td>
                                                @if($team->team->admin->where('old_status', '=', 1)->where('team_id', '=', $team->team->id)->first()->user_id == \Auth::user()->id)
                                                        <p><button class="btn btn-sm btn-info">admin</button></p>
                                                @else
                                                        <p><button class="btn btn-sm btn-info">member</button></p>
                                                @endif

                                            </td>
                                            <td>
                                                <p><button class="btn btn-sm btn-info">close</button></p>
                                            <td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                                        <p><strong>You currently have no teams..</strong></p>
                                    </div>
                                @endif
                                @if($teams->count() == 5)
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10">
                                        <a href="{{ url('teams/userTeams') }}" class="btn btn-default btn-block">View more of your teams</a>
                                    </div>
                                </div>
                                @endif
                                </table>
                        </div>
                  </div>
            </div>
            <div class=" col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><strong>Requests Received&nbsp;</strong><span class="badge">12</span></h5>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <td><strong>Email</strong></td>

                            </thead>
                            <tbody>
                            <tr>
                                <td>user@pms.com</td>
                                <td><button class="btn btn-info" name="accept">Accept&nbsp;<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-info" name="reject">Reject&nbsp;<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
