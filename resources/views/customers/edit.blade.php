@extends('customers\layout')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
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
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('customers.update', $customertoedit->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" value="{{ $customertoedit->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" value="{{ $customertoedit->last_name }}"/>
          </div>
          <div class="form-group">
              <label for="telephone">Phone</label>
              <input type="tel" class="form-control" name="telephone" value="{{ $customertoedit->telephone }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $customertoedit->email }}"/>
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" name="age" value="{{ $customertoedit->age }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Customer</button>
      </form>
  </div>
</div>
@endsection
