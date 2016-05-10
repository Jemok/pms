@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <!-- search for a team-->
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="{{ url('/') }}">
                        {!! csrf_field() !!}
                        <div class="form-group  {{ $errors->has('search') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                <label for="search">Search for a team</label>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="search" name="search" placeholder="search for a team">
                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end of search-->
            </div>
            <!--display all teams panel-->
            <div class="row">
                <div class="col-md-12">
                   <h5><strong>All available teams!!</strong></h5>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection