@extends('layout')

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
 Add Agency
  </div>
  

  <div class="card-body">
      <form method="POST" action="/agencies/create">
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
              <input type="number" class="form-control" name="active"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Add Agency</button>
      </form>
  </div>

@endsection