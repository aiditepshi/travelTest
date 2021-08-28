@extends('customers/layout')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Laravel CRUD Example For Customers</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}">Create New Customer</a>
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
          <td>First Name</td>
          <td>Last Name</td>
          <td>Phone</td>
          <td>Email</td>
          <td>Age</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($allcustomers as $customerrecord)
        <tr>
            <td>{{$customerrecord->id}}</td>
            <td>{{$customerrecord->first_name}}</td>
            <td>{{$customerrecord->last_name}}</td>
            <td>{{$customerrecord->telephone}}</td>
            <td>{{$customerrecord->email}}</td>
            <td>{{$customerrecord->age}}</td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="{{ route('customers.show',$customerrecord->id) }}">Show</a>
                <a href="{{ route('customers.edit', $customerrecord->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('customers.destroy', $customerrecord->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
