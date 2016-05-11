@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><strong>Edit this team</strong></h5>
                    </div>
                    <div class="panel-body">
                            <form class="form-horizontal" method="post" action="">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="edit_team_name">
                                            Team name
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="edit_team_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="edit_team_short_description">
                                            Short description
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                <textarea class="form-control" name="edit_team_short_description" rows="5">

                                </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="edit_team_full_description">
                                            Full description
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                <textarea class="form-control" name="edit_team_full_description" rows="10">

                                </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-info btn-block" name="save">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection