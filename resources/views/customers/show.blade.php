@extends('customers/layout')

@section('content')

<div class="card push-top">
  <div class="card-header">
    <h3 class="pull-left"> Show Customer Details</h3>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $oneCustomer->first_name }}
            </div>
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $oneCustomer->last_name }}
            </div>
            <div class="form-group">
                <strong>Phone:</strong>
                {{ $oneCustomer->telephone }}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $oneCustomer->email }}
            </div>
            <div class="form-group">
                <strong>Age:</strong>
                {{ $oneCustomer->age }}
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
