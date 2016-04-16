@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="post" action="">

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="project name">Project Name</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="project name">Project Description</label>
                    </div>
                    <div class="col-md-5">
                        <textarea class="form-control" name="description" rows="10">

                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="project name">Project Status</label>
                    </div>
                    <div class="col-md-5">
                        <input type="checkbox" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Started
                    </div>
                    <div class="col-md-5">
                        <input type="checkbox" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Ongoing
                    </div>
                    <div class="col-md-5">
                        <input type="checkbox" class="form-control" placeholder="project name" name="project_name" value="" required autofocus>Completed
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection