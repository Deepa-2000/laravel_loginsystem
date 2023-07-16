@extends('main')

@section('content')

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
		<div class="card-header">Edit Profile</div>
		<div class="card-body">
			<form action="{{ url('validate_edit/'.Auth::user()->id)}}" method="POST">
				@csrf
                @method('PUT')
				<div class="form-group mb-3">
					<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" />
				</div>
				<div class="form-group mb-3">
					<input type="text" name="email" class="form-control" value="{{Auth::user()->email}}" />
				</div>
				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" value="{{Auth::user()->password}}" />
				</div>
				<div class="d-grid mx-auto">
					<button type="submit" class="btn btn-dark btn-block">Update</button>
                    <button type="button" class="close mt-2" data-dismiss="alert">Cancel</button>

				</div>
			</form>
		</div>
	</div>
</div>

@endsection('content')
