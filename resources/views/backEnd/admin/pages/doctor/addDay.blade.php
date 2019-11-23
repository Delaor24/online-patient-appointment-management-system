@extends('backEnd.admin.layout.master')
@section('title','Add Doctor working Day')
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
				Add Doctor Working Day

			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a class="btn btn-info" href="{{route('doctors.index')}}">View All Doctor</a>

				</li>
			</ul>
		</div>
		<div class="body">
			<h2 class="card-inside-title"></h2>
			<div class="row clearfix">

				<form method="POST" action="{{route('doctordays.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('day') is-invalid @enderror" name="day" placeholder="Day" value="{{old('day')}}">
									@error('day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

			

						<div class="form-group mb-5">
							<div class="form-line">
								

								<select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id">
									
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
								

								
							</div>
						</div>



				

						

						<div class="form-group">
							<button type="submit" class="btn btn-success mt-5">Save Doctor Appoint Time</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection