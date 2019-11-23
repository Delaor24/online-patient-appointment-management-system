@extends('backEnd.admin.layout.master')
@section('title','update Doctor')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Update Appointment

			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a class="btn btn-info" href="{{route('appointments.index')}}">View All Appointment List</a>

				</li>
			</ul>
		</div>
		<div class="body">
			<h2 class="card-inside-title"></h2>
			<div class="row clearfix">

				<form method="POST" action="{{route('appointments.update',['appointment'=>$appointment->id])}}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<label>Patient Name</label>
								<input type="text" class="form-control" name="name" value="{{$appointment->name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								

								<select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id">
									<option value="">Select which Doctor</option>
									@foreach($doctors as $doctor)
									<option value="{{$doctor->id}}" {{($doctor->id == $appointment->doctor_id) ? 'selected' : ''}}>{{$doctor->name}}</option>
									@endforeach

									
								</select>
								@error('doctor_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Doctor visit</label>
								<input type="text" class="form-control" name="doctor_fee" value="{{$appointment->doctor_fee}}">
							</div>
						</div>

					




						<div class="form-group">
							<button type="submit" class="btn btn-success">Update appointment</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection