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
                            <div class="col-md-3">
                                <h5><strong>Team name</strong></h5>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h5><strong>Short description</strong></h5>
                            </div>
                            <div class="col-md-2">
                                <h5><strong>User level</strong></h5>
                            </div>
                        </div>{{--end of heading--}}

                        {{--display data--}}
                        <div class="row">
                            <div class="col-md-3">
                                <p><strong>Team 1</strong></p>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <p><strong>blah blah blah</strong></p>
                            </div>
                            <div class="col-md-2">
                                <p><button type="button" class="btn btn-info btn-sm">level</button></p>
                            </div>
                        </div>{{--end of display--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection