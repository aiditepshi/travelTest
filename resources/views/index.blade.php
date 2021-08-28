
@extends('layout')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 class="header">CRUD AGENCY</h3>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('agencies.create') }}">Create</a>
            </div>
        </div>
    </div>


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
  color:green;
}
</style>

<table>
 <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Nipt</th>
    <th>Active</th>
    <th class="colspan=2" >Action</th>    
 </tr>  
  @foreach($agency as $getagencies)
    <tr>
      <td>{{ $getagencies->id}}</td>
      <td>{{ $getagencies->name}}</td>
      <td>{{ $getagencies->address}}</td>
      <td>{{ $getagencies->nipt}}</td>
      <td>{{ $getagencies->active}}</td>
     <td class="text-center">
            <a class="btn btn-primary btn-sm" href="{{ route('agencies.edit', $getagencies->id)}}" >Edit</a>
            <a class="btn btn-info btn-sm" href="{{ route('agencies.show',$getagencies->id) }}">Show</a>
            <form action="{{ route('agencies.destroy',$getagencies->id)}}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>
      </td> 
    </tr> 
  @endforeach
</table>  

@endsection









