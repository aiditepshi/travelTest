@extends('users\layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
            </div>
        </div>
    </div>
    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="card-header">
            Add Customers
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('users.store') }}">
                <div class="form-group">
                    @csrf
                    {{--                    'agency_id',--}}
                    {{--                    'customer_id'--}}
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <label for="role">Choose a Role:</label>
                    <select name="role" form="form-control">
                        <option value="customer">customer</option>
                        <option value="employee">employee</option>
                    </select>
                </div>

                <div class="form-group">
                    @csrf
                    {{--                    'agency_id',--}}
                    {{--                    'customer_id'--}}
                    <label for="agency_id">Agency-ID</label>
                    <select name="agency_id" form="form-control">
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    {{--                    'agency_id',--}}
                    {{--                    'customer_id'--}}
                    <label for="customer_id">Customer-ID</label>
                    <select name="customer_id" form="form-control">
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create User</button>
            </form>
        </div>
    </div>
@endsection

