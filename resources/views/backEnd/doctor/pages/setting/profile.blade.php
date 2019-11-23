@extends('backEnd.doctor.layout.master')
@section('title','Profile')
@section('content')
<div class="col-xs-12 col-sm-3">
	<div class="card profile-card">
		<div class="profile-header">&nbsp;</div>
		<div class="profile-body">
			<div class="image-area">
				<img src="@if(isset($doctor->avatar)) {{Storage::disk('public')->url('profile/'.$doctor->avatar)}} @else {{asset('backEnd/profile/profile.jpg')}}@endif" alt="Profile Image" width="65%" height="65%">
			</div>
			<div class="content-area">
				<h3>{{$doctor->name}}</h3>
				<p>I'm a Doctor</p>
				<p>Profesional</p>
			</div>
		</div>

	</div>


</div>


<div class="col-xs-12 col-sm-9">
	<div class="card">
		<div class="body">
			<div>
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Profile Update</a></li>

					<li role="presentation" class=""><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Change Password</a></li>
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home">
						<form class="form-horizontal" method="POST" action="{{route('doctor.profile.update')}}" enctype="multipart/form-data">
							@csrf
							@method('PUT')

							<div class="form-group">
								<label for="NameSurname" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<div class="form-line focused">
										<input type="text" class="form-control" id="NameSurname" name="name" value="{{$doctor->name}}" required="">
									</div>
								</div>
							</div>


							<div class="form-group">
								<label for="NameSurname" class="col-sm-2 control-label">About Me</label>
								<div class="col-sm-10">
									<div class="form-line focused">
										<textarea rows="4" class="form-control no-resize" name="aboutMe" placeholder="Please type about you">{{$doctor->aboutMe}}</textarea>
									</div>
								</div>
							</div>


							



							<div class="form-group">
								<label for="InputExperience" class="col-sm-2 control-label">Profile Photo</label>

								<div class="col-sm-10">
									<div class="form-line">
										<input type="file" class="form-control" id="avatar" name="avatar">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-danger">Update</button>
								</div>
							</div>
						</form>

						
					</div>

					<div role="tabpanel" class="tab-pane fade" id="change_password_settings">
						<form class="form-horizontal" action="{{route('doctor.changePassword')}}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
								<div class="col-sm-9">
									<div class="form-line">
										<input type="password" class="form-control" id="OldPassword" name="oldPassword" placeholder="Old Password" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="NewPassword" class="col-sm-3 control-label">New Password</label>
								<div class="col-sm-9">
									<div class="form-line">
										<input type="password" class="form-control @error('password') is-invalid @enderror" id="NewPassword" name="password" placeholder="New Password" required="">
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
								<div class="col-sm-9">
									<div class="form-line">
										<input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirmation" placeholder="New Password (Confirm)" required="">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-danger">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection