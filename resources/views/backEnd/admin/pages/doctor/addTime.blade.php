@extends('backEnd.admin.layout.master')
@section('title','Add Doctor Visit Time')
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
				Add Doctor Visit Time

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

				<form method="POST" action="{{route('doctortimes.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-sm-12">

						<div class="form-group mb-5">
							<div class="form-line">
								
                               <label><strong>Select Doctor Name </strong><span style="color: red">*</span></label>
								<select class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" id="doctor_id">
									
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



						<div class="form-group mb-5">
							<div class="form-line">
								<label><strong>Select day</strong><span style="color: red">*</span></label>
								

								<select class="form-control @error('day_id') is-invalid @enderror" name="day_id" id="day_id">
									<option value="">select Day</option>
									

									
								</select>
								@error('day_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>



						<div class="form-group">
							<div class="form-line">
								<label><strong>Time</strong><span style="color: red">*</span></label>
								<input type="text" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="Time" value="{{old('time')}}">
								@error('time')
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



@push('js')

<script type ="text/javascript">
	
		$("#doctor_id").change(function(){
			var doctor_id = $("#doctor_id").val();

            


        //send an ajax request to the  server with this division
        
        $("#day_id").html("");

        var option = "";

        $.get("http://127.0.0.1:8000/admin/doctor/"+doctor_id,

        	function(data){
        		data = JSON.parse(data);

        		if(data == 0){
        			alert("No Day Added For this Doctor");
        		}else{
        			data.forEach(function(element){
        			option+= "<option value='"+element.id+"'>"+ element.day +"</option>";
        		});

        		$("#day_id").html(option);
        		}
        		

        	});


        });




</script>

@endpush