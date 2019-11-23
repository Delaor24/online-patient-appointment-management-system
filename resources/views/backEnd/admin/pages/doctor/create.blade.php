@extends('backEnd.admin.layout.master')
@section('title','Create Specialist')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div>
			@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		</div>
		<div class="header">
			<h2>
				Add Doctor

			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a class="btn btn-info" href="{{route('doctors.index')}}">View All Doctor List</a>

				</li>
			</ul>
		</div>
		<div class="body">
			<h2 class="card-inside-title"></h2>
			<div class="row clearfix">

				<form method="POST" action="{{route('doctors.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Doctor Name" value="{{old('name')}}">
									@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" placeholder="Doctor Degree" value="{{old('degree')}}">
									@error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								

								<select class="form-control @error('specialist_id') is-invalid @enderror" name="specialist_id">
									<option value="">Select which specialist</option>
									@foreach($specialists as $specialist)
									  <option value="{{$specialist->id}}">{{$specialist->name}}</option>
									@endforeach

									
								</select>
									@error('specialist_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>


						<div class="form-group">
							<div class="form-line">
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}">

									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}">

									@error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>


						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{old('address')}}">

									@error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control" name="day" placeholder="Working Day (optional)">

									
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control" name="start_time" placeholder="Start Time (optional)">
									
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control" name="end_time" placeholder="End Time (optional)">

									
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Profile (optional)</label>
								<input type="file" class="form-control" name="avatar">
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success">Save Doctor</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection