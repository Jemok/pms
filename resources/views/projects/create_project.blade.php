@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <h4>Create a project name to enable you work!!</h4>
            </div>

        </div>

        <div class="row">
            <form class="form-horizontal" method="post" action="">

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="project_name">Project Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="description">Project Description</label>
                    </div>
                    <div class="col-md-5">
                        <textarea class="form-control" name="description" rows="10">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="project_name">Project Status</label>
                    </div>
                    <div class="col-md-1">
                        <input type="radio" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Not Started
                    </div>
                    <div class="col-md-1">
                        <input type="radio" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Ongoing
                    </div>
                    <div class="col-md-1">
                        <input type="radio" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Completed
                    </div>
                    <div class="col-md-1">
                        <input type="radio" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Shelved
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="started_at">Started at</label>
                    </div>
                    <div class="col-md-5">
                        <input type="datetime" name="started_at" class="form-control" placeholder="Started at" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="ended_at">Ended at</label>
                    </div>
                    <div class="col-md-5">
                        <input type="datetime" name="ended_at" class="form-control" placeholder="Ended at" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-3">
                        <input type="submit" class="btn btn-lg btn-default" name="save" value="Save">
                    </div>

                </div>

            </form>
        </div>
    </div>

@endsection