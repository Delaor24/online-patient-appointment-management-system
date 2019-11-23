@extends('frontEnd.layout.master')
@section('title','Doctor Single Page')

@section('content')
<div class="container-fluid">
	
	<div class="row mt-2">
		<img src="{{asset('backEnd/images/banner.jpg')}}" width="100%" class="img-fluid" style="height: 200px!important">
	</div>
	
</div>

<div class="container">
	<div class="row p-2 mt-5">
		<div class="col-md-4">
			<img src="@if(isset($doctor->avatar)) {{Storage::disk('public')->url('profile/'.$doctor->avatar)}}  @else {{asset('backEnd/images/user.png')}} @endif" class="img-fluid" width="100%" style="height:300px!important">
		</div>
		<div class="col-md-8">
			<h3 class="text-danger"><strong>{{$doctor->name}}</strong></h3>
			<h6 style="color: black"><strong>Specialty -</strong> {{$doctor->specialist->name}}</h6>
			<h6 style="color: black"><strong>Degree - </strong> {{$doctor->degree}}</h6>
			<h6 style="color: black"><strong>Duty -</strong> {{$doctor->day}}</h6>
			<h6 style="color: black"><strong>Start Time and End Time - </strong> {{$doctor->start_time}} - {{$doctor->end_time}}</h6>

			@if(isset($doctor->aboutMe))
			 <p>{{$doctor->aboutMe}}</p>
			@else
              <p>Square Hospitals Limited is a 400 beds tertiary care hospital and the leading contributor of private healthcare services in Bangladesh. This has been achieved only through consistent commitment to improving the lives of people through utmost service excellence since its inception on 16th December 2006. Square Hospital is one of the ventures of Square Group which is the top business group of the country .</p>
			@endif

			<div class="mt-5">
				<a href="{{route('frontEnd.appointment.create',['id'=>$doctor->id,'title'=>$doctor->name])}}" class="btn btn-success btn-lg">Get Appointment</a>
			</div>
		</div>
	</div>
</div>

<?php
 $specialistId = $doctor->specialist_id;

 $doctors = App\Specialist::findOrFail($specialistId)->doctors;


?>



<div class="container">
   <hr>
	<h3 class="mt-2" style="text-align: center;color: #40B176"><strong>{{$doctor->specialist->name }}<span class="text-danger">  Specialist Doctors</span></strong></h3>
		<hr>

	<div class="row mt-1">
		@foreach($doctors as $doctor)
		<div class="col-md-6 mb-3">
			<div class="card p-2">
				
				<div class="row">

					
					<div class="col-md-4">
						<img src="@if(isset($doctor->avatar)) {{Storage::disk('public')->url('profile/'.$doctor->avatar)}}  @else {{asset('backEnd/images/user.png')}} @endif" class="img-fluid" width="100%" style="height:158px!important">
					</div>
					<div class="col-md-8">
						<h3 class="text-danger"><strong>{{$doctor->name}}</strong></h3>
						<h6 style="color: black"><strong>Specialty -</strong> {{$doctor->specialist->name}}</h6>
						<h6 style="color: black"><strong>Degree - </strong> {{$doctor->degree}}</h6>

						<div class="mt-5">
							<a href="{{route('frontEnd.appointment.create')}}" class="btn btn-success btn-sm">Get Appointment</a>
							<a href="{{route('doctor.singlePage',['id'=>$doctor->id])}}" class="btn btn-success btn-sm">View Details</a>
						</div>
					</div>
					
				</div>

				
			</div>
		</div>

		@endforeach
		
	</div>
</div>


@endsection