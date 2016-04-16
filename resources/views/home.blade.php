@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in Please create a team!
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label for="team-name" class="col-sm-2 control-label">Team name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="team-name" name="team_name" placeholder="Team name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" name="description" rows="10">

                                   </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Create team</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--search-->
            <div class="col-md-5">
                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <label for="search" class="col-sm-2 control-label">Search for a team</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="search" placeholder="search for a team">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
