@extends('backEnd.admin.layout.master')
@section('title','Create Specialist')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header">
			<h2>
				Update Specialist

			</h2>
			<ul class="header-dropdown m-r--5">
				<li class="dropdown">
					<a class="btn btn-info" href="{{route('specialists.index')}}">View All Specialists</a>

				</li>
			</ul>
		</div>
		<div class="body">
			<h2 class="card-inside-title"></h2>
			<div class="row clearfix">

				<form method="POST" action="{{route('specialists.update',['specialist'=>$specialist->id])}}">
					@method('PUT')
					@csrf
					<div class="col-sm-12">
						<div class="form-group">
							<div class="form-line">
								<input type="text" class="form-control" name="name" value="{{$specialist->name}}">
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success">Update Speialist</button>
						</div>
					</div>
				</form>
			</div>




		</div>
	</div>
</div>
@endsection