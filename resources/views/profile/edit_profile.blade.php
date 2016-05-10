@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><p style="text-align: center;">My Profile</p></strong>
                </div>
                    <div class="panel-body">
                        @if($users->count())
                            @foreach($users as $user)
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="username">
                                        username
                                    </label>
                                </div>

                                <div class="col-md-9">
                                    <strong><input type="text" name="username" value="{{$user->name}}" class="form-control"></strong>
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-md-3">
                                        <label for="email">
                                            E-mail
                                        </label>
                                    </div>

                                    <div class="col-md-9">
                                        <strong><input type="email" name="email" value="{{$user->email}}" class="form-control"></strong>
                                    </div>
                            </div>
                            <div class="form-group">
                                        <div class="col-md-3">
                                            <label for="password">
                                                Password
                                            </label>
                                        </div>

                                        <div class="col-md-9">
                                            <input type="text" name="password" value="password" class="form-control">
                                        </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-5">
                                    <input type="submit" class="btn btn-default" name="edit" value="edit profile">
                                </div>
                            </div>
                        </form>
                            @endforeach
                        @else
                        @endif
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>





@endsection