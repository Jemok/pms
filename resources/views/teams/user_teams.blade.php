@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><strong>More of the teams you participate in</strong></h5>
                    </div>
                    <div class="panel-body">
                        {{--heading--}}
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <h5><strong>Team name</strong></h5>
                            </div>
                            <div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1">
                                <h5><strong>Short description</strong></h5>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <h5><strong>User level</strong></h5>
                            </div>
                        </div>{{--end of heading--}}

                        {{--display data--}}

                        @if($teams->count())
                             @foreach($teams as $team)
                                  <div class="row">
                                       <div class="col-md-3">
                                            <a href="{{ url('teams/teamDetails/'. $team->team->id)}}"><p>{{$team->team->team_name}}</p></a>
                                       </div>
                                       <div class="col-md-4">
                                                              <p>{{$team->team->short_description}}</p>
                                       </div>
                                  <div class="col-md-3">
                                 @if($team->team->admin->user_id == \Auth::user()->id)
                                       <p><button class="btn btn-sm btn-info">admin</button></p>
                                 @else
                                       <p><button class="btn btn-sm btn-info">member</button></p>
                                 @endif
                                 </div>
                                 </div>
                         @endforeach
                         {!! $teams->links() !!}
                         @else
                         <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                               <p><strong>You currently have no teams..</strong></p>
                         </div>
                        @endif
                        {{--end of display--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection