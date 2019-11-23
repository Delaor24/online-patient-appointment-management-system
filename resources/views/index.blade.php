@extends('frontEnd.layout.master')
@section('title','home')
@section('slider')
 @include('frontEnd.layout.partial.slider')
@endsection
@section('content')
<div class="container">
	@if(count($doctors) > 0)
		<h3 style="text-align: center;color: #40B176">Our Doctors</h3>
		<hr>
		@endif


	<div class="row">
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
							<a href="{{route('frontEnd.appointment.create',['id'=>$doctor->id,'title'=>$doctor->name])}}" class="btn btn-success btn-sm">Get Appointment</a>
							<a href="{{route('doctor.singlePage',['id'=>$doctor->id])}}" class="btn btn-success btn-sm">View Details</a>
						</div>
					</div>
					
				</div>

				
			</div>
		</div>

		@endforeach
		
	</div>
	{{ $doctors->links() }}
	
</div>
@endsection