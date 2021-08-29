@extends('users/layout')

@section('content')

    <div class="card push-top">
        <div class="card-header">
            <h3 class="pull-left"> Show User Details </h3>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{--                        'agency_id',--}}
                        {{--                        'customer_id'--}}
                        <strong>Name:</strong>
                        {{ $oneUser->name }}
                    </div>
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $oneUser->email }}
                    </div>
                    <div class="form-group">
                        <strong>Password:</strong>
                        {{ $oneUser->password }}
                    </div>
                    <div class="form-group">
                        <strong>Role:</strong>
                        {{ $oneUser->role }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
