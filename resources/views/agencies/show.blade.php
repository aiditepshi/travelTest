@extends('agencies/layout')

@section('content')
<style>

.details{
    color:CornflowerBlue;
}
.info{
    color:CornflowerBlue;
}
</style>
<div class="card push-top">
  <div class="card-header">
    <h3 class="pull-left info"> Agency Details</h3>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('agencies.index') }}"> Back</a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h5 class ="details">Name:</h5>
                {{ $showagency->name }}
            </div>
            <div class="form-group">
               <h5 class ="details">Address:</h5>
                {{ $showagency->address}}
            </div>
            <div class="form-group">
                <h5 class ="details">Nipt:</h5>
                {{ $showagency->nipt}}
            </div>
            <div class="form-group">
               <h5 class ="details">Active:</h5>
                {{ $showagency->active}}
            </div>
            <div class="form-group">
               <h5 class ="details">Active:</h5>
                {{ $showagency->active}}
            </div>   <div class="form-group">
               <h5 class ="details">Image:</h5>
                {{ $showagency->image}}
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                  <img src="{{asset($showagency->image)}}"  width="500" height="333">

                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
