@extends('layout')

@section('content')
<
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
    Edit & Update
  </div>

  <div class="card-body">
      <form method="POST" action="/agencies/update">
          <div class="form-group">
              @csrf
              <input type="text" class="form-control" name="name" value="{{ $agency->name }}"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $agency->address}}"/>
          </div>
          <div class="form-group">
              <label for="nipt">Nipt</label>
              <input type="nipt" class="form-control" name="nipt" value="{{ $agency->nipt }}"/>
          </div>
          <div class="form-group">
              <label for="active">Active</label>
              <input type="text" class="form-control" name="active" value="{{ $agency->active }}"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update Agency</button>
      </form>
  </div>

@endsection