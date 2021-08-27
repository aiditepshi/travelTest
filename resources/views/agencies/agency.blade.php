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
<!-- {{dd($agency)}} -->
<h2>Agency Table</h2>
<table>
 <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Nipt</th>
    <th>Active</th>
    <th class="colspan=2" >Action</th>    
 </tr>  
  @foreach($agency as $agencies)
    <tr>
      <td>{{ $getagencies->id}}</td>
      <td>{{ $getagencies->name}}</td>
      <td>{{ $getagencies->address}}</td>
      <td>{{ $getagencies->nipt}}</td>
      <td>{{ $getagencies->active}}</td>
      
    </tr> 
  @endforeach
</table>  

@endsection







<!-- <td class="text-center">
            <a href="{{ route('agencies.edit', $agency->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <form action="{{ route('agencies.destroy', $agency->id)}}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>
      </td> --> 

