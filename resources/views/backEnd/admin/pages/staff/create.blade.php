@extends('backEnd.admin.layout.master')
@section('title','Create Specialist')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Create Staff

			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a class="btn btn-info" href="{{route('staffs.index')}}">View All Staffs</a>

				</li>
			</ul>
		</div>
		<div class="body">
			<h2 class="card-inside-title"></h2>
			<div class="row clearfix">

				<form method="POST" action="{{route('staffs.store')}}" enctype="multipart/form-data">
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Staff Name">
									@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" placeholder="Service Name">
									@error('service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address">
									@error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number">

									@error('phone_number')
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
							<button type="submit" class="btn btn-success">Save Staff</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection