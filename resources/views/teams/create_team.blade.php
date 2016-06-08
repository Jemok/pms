@extends('layout.app')
@section('content')
<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="create_team" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Team</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ url('teams/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('team_name') ? ' has-error' : '' }}">
                            <label for="team_name" class="col-md-2 control-label">Team name</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" id="team-name" name="team_name" placeholder="Team name" value="{{ old('team_name')}}">

                                @if($errors->has('team_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('team_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-2 control-label"> Full Description</label>

                            <div class="col-md-10">
                                <textarea class="form-control" name="description" rows="6" value="{{ old('description')}}"></textarea>

                                @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-default" name="create_team"><span class="glyphicon glyphicon-plus"></span> team</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="create_team" ><span class="glyphicon glyphicon-plus"></span>Create team</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection