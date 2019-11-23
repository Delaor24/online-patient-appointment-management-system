@extends('backEnd.admin.layout.master')
@section('title','Create Appointment')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Add Appointment

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

				<form method="POST" action="{{route('appointments.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-sm-12">
			

				

					










                       <div class="form-group">
							<div class="form-line">
								<label><strong>Name</strong> <span style="color: red">*</span></label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Patient Name" value="{{old('name')}}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label><strong>Disease Name</strong> <span style="color: red">*</span></label>
								<input type="text" class="form-control @error('disease') is-invalid @enderror" name="disease" placeholder="What is your problem? disease" value="{{old('disease')}}">
								@error('disease')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>


								<div class="form-group">
							<div class="form-line">
								

								<select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id">
									<option value="">Select which Doctor</option>
									@foreach($doctors as $doctor)
									  <option value="{{$doctor->id}}">{{$doctor->name}}</option>
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
								<label><strong>Which day you want to appointment?</strong> <span style="color: red">*</span></label>
								
								<div class="input-group date" data-provide="datepicker">
									<input type="text" class="form-control @error('visit_day') is-invalid @enderror" name="visit_day" value="{{old('visit_day')}}">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>

									@error('visit_day')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label><strong>When you want to appointment?</strong> <span style="color: red">*</span></label>
								<select class="form-control" name="visit_time">
									<option>10.00 AM</option>
									<option>10.15 AM</option>
									<option>10.30 AM</option>
									<option>10.45 AM</option>
									<option>11.00 AM</option>



								</select>
							</div>
						</div>





						<div class="form-group">
							<div class="form-line">

								<label><strong>Doctor Fee</strong> <span style="color: red">*</span></label>
								<input type="text" class="form-control @error('doctor_fee') is-invalid @enderror" name="doctor_fee" value="BDT: 700 Tk" placeholder="Doctor visit (fee = 700 Tk)">

								@error('doctor_fee')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>



						


						<div class="form-group">
							<div class="form-line">

								<label><strong>Mobile Number</strong> <span style="color: red">*</span></label>
								<input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="phone number" value="{{old('phone_number')}}">

								@error('phone_number')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>


						<div class="form-group">
							<div class="form-line">
								<label><strong>Address</strong> <span style="color: red">*</span></label>
								<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" value="{{old('address')}}">

								@error('address')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>


















						<div class="form-group">
							<button type="submit" class="btn btn-success">Save Appointment</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection