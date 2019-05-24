@extends('layouts.user-dashboard')

@section('user-content')
	<!-- Edit Profile Welcome Text -->
	<h2>Pengaturan Akun</h2>
	<!-- Edit Personal Info -->
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="widget personal-info">
				<h3 class="widget-header user">Edit Personal Information</h3>
				<form action="#">
					<!-- First Name -->
					<div class="form-group">
						<label for="full-name">Full Name</label>
						<input type="text" class="form-control" id="full-name" value="{{Auth::user()->name}}">
					</div>
					<!-- Comunity Name -->
					<div class="form-group">
						<label for="comunity-name">Telephone</label>
						<input type="text" class="form-control" id="comunity-name" value="{{Auth::user()->telephone}}">
					</div>

					<!-- Submit button -->
					<button class="btn btn-transparent">Save My Changes</button>
				</form>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<!-- Change Password -->
			<div class="widget change-password">
				<h3 class="widget-header user">Edit Password</h3>
				<form action="#">
					<!-- Current Password -->
					<div class="form-group">
						<label for="current-password">Current Password</label>
						<input type="password" class="form-control" id="current-password">
					</div>
					<!-- New Password -->
					<div class="form-group">
						<label for="new-password">New Password</label>
						<input type="password" class="form-control" id="new-password">
					</div>
					<!-- Confirm New Password -->
					<div class="form-group">
						<label for="confirm-password">Confirm New Password</label>
						<input type="password" class="form-control" id="confirm-password">
					</div>
					<!-- Submit Button -->
					<button class="btn btn-transparent">Change Password</button>
				</form>
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<!-- Change Email Address -->
			<div class="widget change-password">
				<h3 class="widget-header user">Edit Email Address</h3>
				<form action="#">
					<!-- Current Password -->
					<div class="form-group">
						<label for="current-email">Current Email</label>
						<h3 class="widget-header user">{{Auth::user()->email}}</h3>
					</div>
					<!-- Submit Button -->
					<button class="btn btn-transparent">Change email</button>
				</form>
			</div>
		</div>
	</div>
@endsection