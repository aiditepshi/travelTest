@extends('trips/layout')

@section('content')

<div class="card push-top">
    <div class="card-header">
        <h3 class="pull-left"> Show Trip Details</h3>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('trips.index') }}"> Back</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $oneTrip->name }}
                </div>
                <div class="form-group">
                    <strong>Date:</strong>
                    {{ $oneTrip->date }}
                </div>
                <div class="form-group">
                    <strong>Duration:</strong>
                    {{ $oneTrip->duration }}
                </div>
                <div class="form-group">
                    <strong>Destination</strong>
                    {{ $oneTrip->destination }}
                </div>
                <div class="form-group">
                    <strong>Payment Due Date:</strong>
                    {{ $oneTrip->payment_due_date }}
                </div>
                <div class="form-group">
                    <strong>Details:</strong>
                    {{ $oneTrip->details }}
                </div>
                <div class="form-group">
                    <strong>Agency ID:</strong>
                    {{ $oneTrip->agency_id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
