
@extends('main')
@section('content')

<div class="card">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">Dashboard</div>

            <div class="col-2">Welcome {{Auth::user()->name}} </div>
        </div>
    </div>

	<div class="card-body">
		You are Login in Laravel Login System Application.
	</div>
    <div class="container mb-3">

        <a href="edit/{{Auth::user()->id}}" class="btn btn-warning">Edit Profile</a>
        
    </div>

</div>

@endsection('content')
