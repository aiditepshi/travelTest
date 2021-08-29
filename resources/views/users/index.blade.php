@extends('users/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Laravel CRUD Example For Users</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
                <a href="{{ route('login') }}" class="btn btn-success">LogIn</a>
            </div>
        </div>
    </div>


    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="push-top">
        @if ($message = Session::get('completed'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table ">
            <thead>
            <tr class="table-primary text-center fw-bold ">
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Role</td>
                <td>Agency ID</td>
                <td>Customer ID</td>
                <td class="text-center">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($allUsers as $userRecord)
                <tr>
                    <td>{{$userRecord->id}}</td>
                    <td>{{$userRecord->name}}</td>
                    <td>{{$userRecord->email}}</td>
                    <td>{{$userRecord->role}}</td>
                    <td>@if($userRecord->agency){{$userRecord->agency->name}}@endif</td>
                    <td>@if($userRecord->customer){{$userRecord->customer->first_name}}@endif</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('users.show',$userRecord->id) }}">Show</a>
                        <a href="{{ route('users.edit', $userRecord->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $userRecord->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
