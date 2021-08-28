@extends('trips/layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3>Show Trips</h3>
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
            <td>Name</td>
            <td>Date</td>
            <td>Duration</td>
            <td>Destination</td>
            <td>Price</td>
            <td>Max_Participiants</td>
            <td>Payment_Due_Date</td>
            <td>Details</td>
            <td>Agency_ID</td>
        </tr>
        </thead>
        <tbody>
        @foreach($alltrips as $triprecord)
        <tr>
            <td>{{$triprecord->id}}</td>
            <td>{{$triprecord->name}}</td>
            <td>{{$triprecord->date}}</td>
            <td>{{$triprecord->duration}}</td>
            <td>{{$triprecord->destination}}</td>
            <td>{{$triprecord->price}}</td>
            <td>{{$triprecord->max_participiants}}</td>
            <td>{{$triprecord->payment_due_date}}</td>
            <td>{{$triprecord->details}}</td>
            <td>{{$triprecord->agency_id}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        @endsection
