@extends('layouts.user-dashboard')

@section('user-content')
	<!-- Edit Profile Welcome Text -->
	<h2>Pengaturan Akun</h2>
	<!-- Edit Personal Info -->
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="widget personal-info">
				<h3 class="widget-header user">Edit Personal Information</h3>
				<form action="{{route('update-profile')}}" method="POST">
					@csrf
					<!-- First Name -->
					<div class="form-group">
						<label for="full-name">Full Name</label>
						<input type="text" class="form-control" id="full-name" name="fullname" value="{{Auth::user()->name}}">
					</div>
					@if ($errors->has('fullname'))
					<div class="alert alert-danger">
						<strong>{{ $errors->first('fullname') }}</strong>
					</div>
					@endif
					<!-- Telephone -->
					<div class="form-group">
						<label for="telephone">Telephone</label>
						<input type="text" class="form-control" id="telephone" name="telephone" value="{{Auth::user()->telephone}}">
					</div>
					@if ($errors->has('telephone'))
					<div class="alert alert-danger">
						<strong>{{ $errors->first('telephone') }}</strong>
					</div>
					@endif
					<!-- Submit button -->
					<button class="btn btn-transparent">Save My Changes</button>
				</form>
			</div>
			<div class="widget change-password">
				<h3 class="widget-header user">Email Address</h3>
				<form action="#">
					<!-- Current Password -->
					<div class="form-group">
						<label for="current-email">Current Email</label>
						<h3 class="widget-header user">{{Auth::user()->email}}</h3>
					</div>
					<!-- Submit Button -->
					<!-- <button class="btn btn-transparent">Change email</button> -->
				</form>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<!-- Change Password -->
			<div class="widget change-password">
				<h3 class="widget-header user">Edit Password</h3>
				<form action="{{route('change-password')}}" method="POST" autocomplete="off">
					@if(session()->has('password-success'))
					    <div class="alert alert-success">
					        {{ session()->get('password-success') }}
					    </div>
					@endif
					@csrf
					<!-- Current Password -->
					<div class="form-group">
						<label for="current-password">Current Password</label>
						<input type="password" class="form-control" id="current-password" name="current_password">
						<p>Password is sent to e-mail of account registered with Google or Facebook.</p>
					</div>
					@if ($errors->has('credentials'))
					<div class="alert alert-danger">
						<strong>{{ $errors->first('credentials') }}</strong>
					</div>
					@endif
					@if ($errors->has('current_password'))
					<div class="alert alert-danger">
						<strong>{{ $errors->first('current_password') }}</strong>
					</div>
					@endif
					<!-- New Password -->
					<div class="form-group">
						<label for="new-password">New Password</label>
						<input type="password" class="form-control" id="new-password" name="new_password">
					</div>
					@if ($errors->has('new_password'))
					<div class="alert alert-danger">
						<strong>{{ $errors->first('new_password') }}</strong>
					</div>
					@endif
					<!-- Confirm New Password -->
					<div class="form-group">
						<label for="confirm-password">Confirm New Password</label>
						<input type="password" class="form-control" id="confirm-password" name="confirm_password">
					</div>
					<!-- Submit Button -->
					<button class="btn btn-transparent">Change Password</button>
				</form>
			</div>
		</div>

	</div>
@endsection