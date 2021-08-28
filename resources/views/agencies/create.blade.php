@extends('agencies/layout')

@section('content')

<style>
table, td, th {  
  border: 1px solid black ;
  text-align: left;
}

table {
  border-collapse: collapse;
  width:100%;
}
th {
  background-color:LightGray;
  color: black;
}
th, td {
  padding: 15px;
}
button {
  background-color:MediumSeaGreen;
}
.button1{
  background-color:#DC143C;
  
}
.button3{
  background-color:CornflowerBlue;
}
</style>

<div class="card-header">
  <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Create Agency</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('agencies.index') }}"> Back</a>
        </div>
    </div>
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

  <div class="card-body">
      <form method="post" action="{{ route('agencies.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="nipt">Nipt</label>
              <input type="nipt" class="form-control" name="nipt"/>
          </div>
          <div class="form-group">
              <label for="active">Active</label>

              <input type="checkbox"  name="active" value="active"/>
              
          </div>
          <button type="submit" class="btn btn-block btn-primary">Create Agency</button>
      </form>
  </div>
</div>
@endsection