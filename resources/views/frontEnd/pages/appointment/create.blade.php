@extends('frontEnd.layout.master')
@section('title','appointment create')

@section('content')
<div class="container-fluid">
	
	<div class="row mt-2">
		<img src="{{asset('backEnd/images/banner.jpg')}}" width="100%" class="img-fluid" style="height: 200px!important">
	</div>
	
</div>

<div class="container">
	<div class="row">
		<div class="col-8 offset-2">
			<h3 class="text-center text-info py-3">Appointment</h3>
			<hr>
			<div>


				<form method="POST" action="{{route('frontEnd.appointment.store')}}" enctype="multipart/form-data">
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

						<input type="hidden"  class="form-control" value="{{$doctorSelect->id}}" name="doctor_id">



						<div class="form-group">
							<div class="form-line">
								<label><strong>These days doctor available</strong></label>
								<input type="text"  class="form-control" disabled  value="{{$doctorSelect->day}}">

							</div>
						</div>






						<div class="form-group">
							<div class="form-line">
								<label><strong>Which day you want to appointment?</strong> <span style="color: red">*</span></label>

								
								
								<div class="row">
									<div class="col-md-3">
										<label>Date <span style="color: red">*</span></label>
										<select class="form-control" name="date">
											<option value="1" <?php $month =  Date('d'); $m = strcmp($month,'1'); if($m == 0) { echo 'selected'; }?>>1</option>
											<option value="2" <?php $month =  Date('d'); $m = strcmp($month,'2'); if($m == 0) { echo 'selected'; }?>>2</option>
											<option value="3" <?php $month =  Date('d'); $m = strcmp($month,'3'); if($m == 0) { echo 'selected'; }?>>3</option>
											<option value="4" <?php $month =  Date('d'); $m = strcmp($month,'4'); if($m == 0) { echo 'selected'; }?>>4</option>
											<option value="5" <?php $month =  Date('d'); $m = strcmp($month,'5'); if($m == 0) { echo 'selected'; }?>>5</option>
											<option value="6" <?php $month =  Date('d'); $m = strcmp($month,'6'); if($m == 0) { echo 'selected'; }?>>6</option>
											<option value="7" <?php $month =  Date('d'); $m = strcmp($month,'7'); if($m == 0) { echo 'selected'; }?>>7</option>
											<option value="8" <?php $month =  Date('d'); $m = strcmp($month,'8'); if($m == 0) { echo 'selected'; }?>>8</option>
											<option value="9" <?php $month =  Date('d'); $m = strcmp($month,'9'); if($m == 0) { echo 'selected'; }?>>9</option>
											<option value="10" <?php $month =  Date('d'); $m = strcmp($month,'10'); if($m == 0) { echo 'selected'; }?>>10</option>
											<option value="11" <?php $month =  Date('d'); $m = strcmp($month,'11'); if($m == 0) { echo 'selected'; }?>>11</option>
											<option value="12" <?php $month =  Date('d'); $m = strcmp($month,'12'); if($m == 0) { echo 'selected'; }?>>12</option>
											<option value="13" <?php $month =  Date('d'); $m = strcmp($month,'13'); if($m == 0) { echo 'selected'; }?>>13</option>
											<option value="14" <?php $month =  Date('d'); $m = strcmp($month,'14'); if($m == 0) { echo 'selected'; }?>>14</option>
											<option value="15" <?php $month =  Date('d'); $m = strcmp($month,'15'); if($m == 0) { echo 'selected'; }?>>15</option>
											<option value="16" <?php $month =  Date('d'); $m = strcmp($month,'16'); if($m == 0) { echo 'selected'; }?>>16</option>
											<option value="17" <?php $month =  Date('d'); $m = strcmp($month,'17'); if($m == 0) { echo 'selected'; }?>>17</opti9on>
											<option value="18" <?php $month =  Date('d'); $m = strcmp($month,'18'); if($m == 0) { echo 'selected'; }?>>18</option>

											<option value="19" <?php $month =  Date('d'); $m = strcmp($month,'19'); if($m == 0) { echo 'selected'; }?>>19</option>
											<option value="20" <?php $month =  Date('d'); $m = strcmp($month,'20'); if($m == 0) { echo 'selected'; }?>>20</option>
											<option value="21" <?php $month =  Date('d'); $m = strcmp($month,'21'); if($m == 0) { echo 'selected'; }?>>21</option>
											<option value="22" <?php $month =  Date('d'); $m = strcmp($month,'22'); if($m == 0) { echo 'selected'; }?>>22</option>
											<option value="23" <?php $month =  Date('d'); $m = strcmp($month,'23'); if($m == 0) { echo 'selected'; }?>>23</option>
											<option value="24" <?php $month =  Date('d'); $m = strcmp($month,'24'); if($m == 0) { echo 'selected'; }?>>24</option>
											<option value="25" <?php $month =  Date('d'); $m = strcmp($month,'25'); if($m == 0) { echo 'selected'; }?>>25</opti9on>
											<option value="26" <?php $month =  Date('d'); $m = strcmp($month,'26'); if($m == 0) { echo 'selected'; }?>>26</option>

											<option value="27" <?php $month =  Date('d'); $m = strcmp($month,'27'); if($m == 0) { echo 'selected'; }?>>27</option>
											<option value="28" <?php $month =  Date('d'); $m = strcmp($month,'28'); if($m == 0) { echo 'selected'; }?>>28</option>
											<option value="29" <?php $month =  Date('d'); $m = strcmp($month,'29'); if($m == 0) { echo 'selected'; }?>>29</option>
											<option value="30" <?php $month =  Date('d'); $m = strcmp($month,'30'); if($m == 0) { echo 'selected'; }?>>30</option>
											<option value="31" <?php $month =  Date('d'); $m = strcmp($month,'31'); if($m == 0) { echo 'selected'; }?>>31</option>

										
										</select>
									</div>	
									<div class="col-md-3">
										<label>Day <span style="color: red">*</span></label>
										<select class="form-control" id="day_id" name="day">
											<option value="0">select day</option>
											@foreach(App\Doctor::findOrFail($doctorSelect->id)->days as $day)
											<option value="{{$day->id}}">{{$day->day}}</option>


											@endforeach

										</select>

									</div>	
									<div class="col-md-3">
										<label>Month <span style="color: red">*</span></label>
										<select class="form-control" name="month">
											<option value="1" <?php $month =  Date('F'); $m = strcmp($month,'January'); if($m == 0) { echo 'selected'; }?>>January</option>
											<option value="2" <?php $month =  Date('F'); $m = strcmp($month,'February'); if($m == 0) { echo 'selected'; }?>>February</option>
											<option value="3" <?php $month =  Date('F'); $m = strcmp($month,'March'); if($m == 0) { echo 'selected'; }?>>March</option>
											<option value="4" <?php $month =  Date('F'); $m = strcmp($month,'April'); if($m == 0) { echo 'selected'; }?>>April</option>
											<option value="5" <?php $month =  Date('F'); $m = strcmp($month,'May'); if($m == 0) { echo 'selected'; }?>>May</option>
											<option value="6" <?php $month =  Date('F'); $m = strcmp($month,'June'); if($m == 0) { echo 'selected'; }?>>June</option>
											<option value="7" <?php $month =  Date('F'); $m = strcmp($month,'July'); if($m == 0) { echo 'selected'; }?>>July</option>
											<option value="8" <?php $month =  Date('F'); $m = strcmp($month,'August'); if($m == 0) { echo 'selected'; }?>>August</option>
											<option value="9" <?php $month =  Date('F'); $m = strcmp($month,'September'); if($m == 0) { echo 'selected'; }?>>september</option>
											<option value="10" <?php $month =  Date('F'); $m = strcmp($month,'Octorber'); if($m == 0) { echo 'selected'; }?>>Octorber</option>
											<option value="11" <?php $month =  Date('F'); $m = strcmp($month,'November'); if($m == 0) { echo 'selected'; }?> >November</option>
											<option value="12" <?php $month =  Date('F'); $m = strcmp($month,'December'); if($m == 0) { echo 'selected'; }?>>December</option>

										</select>

									</div>	
									<div class="col-md-3">
										<label>Year <span style="color: red">*</span></label>
										<select class="form-control" name="year">
											<option>2019</option>
											<option>2020</option>

										</select>

									</div>	
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label><strong>When you want to appointment?</strong> <span style="color: red">*</span></label>
								<select class="form-control" name="visit_time" id="time_id">


								</select>
							</div>
						</div>






				{{-- 		<div class="form-group">
							<div class="form-line">
								<label><strong>Which day you want to appointment?</strong> <span style="color: red">*</span></label>


								
								<div class="input-group date" data-provide="datepicker">
									<input type="text" placeholder="Select Date Using Date Picker" class="form-control @error('visit_day') is-invalid @enderror" name="visit_day" value="{{old('visit_day')}}">
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
						</div> --}}



			{{-- 			<div class="form-group">
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
						</div> --}}





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
							<button type="submit" class="btn btn-success">Appointment Send</button>
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
	$(function() {
		$("#day_id").change(function(){
			var day_id = $("#day_id").val();

            


        //send an ajax request to the  server with this division
        
        $("#time_id").html("");

        var option = "";

        $.get("http://127.0.0.1:8000/appointment/"+day_id,

        	function(data){
        		data = JSON.parse(data);

        		if(data == 0){
        			alert("No Time Added For this Day");
        		}else{
        			data.forEach(function(element){
        			option+= "<option value='"+element.id+"'>"+ element.time +"</option>";
        		});

        		$("#time_id").html(option);
        		}
        		

        	});


        });
	});



</script>

@endpush
