@extends('users/layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back </a>
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
                </div><br/>
            @endif
            <form id="forma" method="post" action="{{ route('users.update', $userEdit->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    {{--                    'agency_id',--}}
                    {{--                    'customer_id'--}}
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $userEdit->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $userEdit->email }}"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ $userEdit->password }}"/>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select onchange="changeRole()" id="roleSelect" name="role" form="forma">
                        <option @if($userEdit->role === 'customer') selected @endif value="customer">customer</option>
                        <option @if($userEdit->role === 'employee') selected @endif   value="employee">employee</option>
                    </select>
                </div>


                <div @if($userEdit->role !== 'employee') style="display: none;" @endif id="agencyDiv" class="form-group">
                    <label for="role">Agency</label>
                    <select name="agency_id" id="angency_id" form="forma">
                        @foreach($agencies as $agency)
                            <option @if($userEdit->agency_id && $userEdit->agency_id === $agency->id) selected @endif
                            value="{{$agency->id}}">{{$agency->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div @if($userEdit->role !== 'customer') style="display: none;" @endif id="customerDiv"
                     class="form-group">
                    <label for="role">Customer ID</label>
                    <select name="customer_id" id="customer_id" form="forma">
                        @foreach($customers as $customer)
                            <option @if($userEdit->customer_id && $userEdit->customer_id === $customer->id) selected @endif
                            value="{{$customer->id}}">{{$customer->first_name}}</option>
                        @endforeach                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
@endsection

<script>

    function changeRole() {


        var selected = document.getElementById('roleSelect').value;
        if (selected === 'customer') {
            document.getElementById('customerDiv').style.display = 'block';
            document.getElementById('agencyDiv').style.display = 'none';
        } else {
            document.getElementById('agencyDiv').style.display = 'block';
            document.getElementById('customerDiv').style.display = 'none';
        }
    }
</script>
