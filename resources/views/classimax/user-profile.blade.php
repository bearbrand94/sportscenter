@extends('layouts.app')

@section('css')
	<style type="text/css">
		p{
			color:white;
			font-size: 0.9rem;
			margin-bottom: 5px;
		}

		p .lead{
			font-size: 1rem;
		}

		.span-bordered{
			color: white;
			background-color: rgba(150,150,150,0.8);
			border-radius: 0.25rem
		}
	</style>
@endsection
@section('content')
<section class="hero-area bg-1 " style="background-image: linear-gradient(to bottom, rgba(9,58,102,0.25) 0%, rgba(9,58,102,1) 75%), url({{ asset('images/home/hero.png') }}); height: 500px;">
	<div class="container">

		<!-- Profile Header -->
		<div class="pb-5">
			<div class="d-flex">
				<div class="pl-4">
					<img src="{{session('auth_data')->profile_image}}" class="img-responsive rounded-circle" alt="No Image" width=100 height=100>
				</div>
				<div class="text-left pl-4">
					<p style="font-weight: bold; font-size: 1.3rem;">{{session('auth_data')->name}}</p>
					<p>{{session('auth_data')->telephone}}</p>
					<p>{{session('auth_data')->email}}</p>
				</div>
				<div class="ml-auto pr-4">
					<a href="{{ route('edit-profile' )}}"><span><i class="fa fa-pencil fa-lg p-2 span-bordered" aria-hidden="true"></i></span></a>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 75px;">
			<div class="card col-12 bg-light" style="border-radius: 3rem 3rem 0px 0px;">
				<div class="card-body">

					<!-- Referral -->
					<div style="margin-top: -75px;">
						<div class="card" style="border-style: dashed; border-width: 2px; border-color:var(--saraga-color); border-radius: 0.5rem">
						  <div class="card-body text-left">
						  	<div class="row">
								<div class="mr-auto pl-3">
								  	<p class="lead" style="color: black; font-size: 16px;">Kode Refferal</p>
								  	<p class="text-saraga" style="font-weight: bold; font-size: 22px;">{{session('auth_data')->referral_code}}</p>
								</div>
								<div class="pr-3 d-flex align-items-center">
									<a href="#"><span><i class="fa fa-share-alt fa-2x text-saraga text-center" aria-hidden="true"></i></span></a>
								</div>
						    </div>
						  </div>
						</div>
					</div>

					<!-- Refund -->
					<div class="row pt-4">
						<div class="col-12">
							<div class="widget personal-info">
								<a href="#">
									<div class="d-flex">
									  <div class="d-flex align-items-center">
									  	<span><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></span>
									  </div>
									  <div class="pl-3">									  	
									  	<p class="lead" style="color: black; font-weight: bold;">Refund Saya</p>
										<p class="text-muted">Atur refund Anda di satu tempat</p>
									  </div>
									  <div class="d-flex ml-auto align-items-center">
									  	<span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span>
									  </div>
									</div>
								</a>
							</div>
						</div>
					</div>

					<!-- Panel Help & Setting -->
					<div class="row pt-2">
						<div class="col-12">
							<div class="widget personal-info">
						  		<div class="widget-header">
						  			<a href="#">
										<div class="d-flex">
										  <div class="d-flex align-items-center">
										  	<span><i class="fa fa-question-circle fa-2x" aria-hidden="true"></i></span>
										  </div>
										  <div class="pl-3">									  	
										  	<p class="lead" style="color: black; font-weight: bold;">Pusat Bantuan</p>
											<p class="text-muted">Temukan jawaban terbaik dari pertanyaan Anda</p>
										  </div>
										  <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
										</div>
									</a>
								</div>
								<a href="#">
									<div class="d-flex">
									  <div class="d-flex align-items-center">
									  	<span><i class="fa fa-cog fa-2x" aria-hidden="true"></i></span>
									  </div>
									  <div class="pl-3">									  	
									  	<p class="lead" style="color: black; font-weight: bold;">Pengaturan</p>
										<p class="text-muted">Lihat dan atur preferensi akun Anda</p>
									  </div>
									  <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
									</div>
								</a>
							</div>
						</div>
					</div>

					<!-- Logout -->
					<div class="row pt-2" >
						<div class="col-12">
							<a href="#">
							<div class="widget personal-info">
								<div class="d-flex">
								  <div class="d-flex align-items-center">
								  	<span><i class="fa fa-reply fa-2x" aria-hidden="true"></i></span>
								  </div>
								  <div class="pl-3">									  	
								  	<p class="lead" style="color: black; font-weight: bold;">Logout</p>
								  </div>
								</div>
							</div>
							</a>
						</div>
					</div>
					

					<!-- Edit Personal Info -->
					<div class="row pt-4">
						<div class="col-lg-6 col-md-6">
							<div class="widget personal-info">
								<h3 class="widget-header user">Edit Personal Information</h3>
								<form action="{{route('update-profile')}}" method="POST">
									@csrf
									<!-- First Name -->
									<div class="form-group">
										<label for="full-name">Full Name</label>
										<input type="text" class="form-control" id="full-name" name="fullname" value="{{session('auth_data')->name}}">
									</div>
									@if ($errors->has('fullname'))
									<div class="alert alert-danger">
										<strong>{{ $errors->first('fullname') }}</strong>
									</div>
									@endif
									<!-- Telephone -->
									<div class="form-group">
										<label for="telephone">Telephone</label>
										<input type="text" class="form-control" id="telephone" name="telephone" value="{{session('auth_data')->telephone}}">
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
									<!-- Current Email -->
									<div class="form-group">
										<label for="current-email">Current Email</label>
										<h3 class="widget-header user">{{session('auth_data')->email}}</h3>
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
				</div>
			</div>
		</div>

	</div>
</section>
@endsection