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
.header{
  color:blue;
}
</style>
<div class="card-header">
      <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 class="header">Edit & Update Agency</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agencies.index') }}" enctype="multipart/form-data"> Back</a>
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
      <form method="POST" action="{{ route('agencies.update', $editagency->id) }}" enctype="multipart/form-data" >
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="id">ID</label>
              <input type="text" class="form-control" name="id" value="{{ $editagency->id }}"/>
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $editagency->name }}"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $editagency->address}}"/>
          </div>
          <div class="form-group">
              <label for="nipt">Nipt</label>
              <input type="nipt" class="form-control" name="nipt" value="{{ $editagency->nipt }}"/>
          </div>
          <div class="form-group">
              <label for="active">Active</label>
              <input type="checkbox"
                @if ($editagency ->active)
                checked
                @endif
                 name="active"
                 value="{{ $editagency->active }}" />
          </div>
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" value="image"/>
              <img src="{{asset($editagency->image)}}" width="300px">
          </div>
          <button type="submit" class="btn btn-block btn-primary">Update Agency</button>
      </form>
  </div>
</div>
@endsection
