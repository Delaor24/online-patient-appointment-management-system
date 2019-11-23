@extends('backEnd.admin.layout.master')
@section('title','update Doctor')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Update Doctor

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

				<form method="POST" action="{{route('doctors.update',['doctor'=>$doctor->id])}}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<label>Name</label>
								<input type="text" class="form-control" name="name" value="{{$doctor->name}}">
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Working Day (optional)</label>
								<input type="text" class="form-control" name="day" value="{{$doctor->day}}">
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Start Time (optional)</label>
								<input type="text" class="form-control" name="start_time" value="{{$doctor->start_time}}">
							</div>
						</div>


						<div class="form-group">
							<div class="form-line">
								<label>End Time (optional)</label>
								<input type="text" class="form-control" name="end_time" value="{{$doctor->end_time}}">
							</div>
						</div>

						<div class="form-group">
							<div class="form-line">
								<label>Profile (optional)</label>
								<input type="file" class="form-control" name="avatar">
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success">Update Doctor</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection