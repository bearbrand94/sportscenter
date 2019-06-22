@extends('layouts.app')

@section('css')
<style type="text/css">
	.section-title p,a{
		font-size:16px;
	}
	.section-title a{
		font-size:14px;
	}
	.scrolling-wrapper {
	  overflow-x: scroll;
	  overflow-y: hidden;
	  white-space: nowrap;
	}
	.card {
	 display: inline-block;
	}

	.card p{
	  white-space: initial;
	  overflow: hidden;
	}

	a{
		color:rgb(42,119,189);
		vertical-align: middle;
	}

	.form-control[readonly]{
		border-color: rgb(9, 58, 102)!important;
		background-color: white;
	}
</style>
@endsection

@section('content')
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block" style="padding-bottom: 10px;">
					<h1>SARAGA</h1>
					<h2 style="color:white;">Mau main apa hari ini?</h2>
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-12 align-content-center">
								<form>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label class="has-float-label"> 
												<select class="w-100 form-control custom-select">
													<option selected value="1">Batminton</option>
													<option value="2">Futsal</option>
													<option value="3">Tennis</option>
													<option value="4">Basket</option>
												</select>
												<span>Olahraga Terpilih</span>
											</label>
											<label class="has-float-label">
												<input type="date" class="form-control datepicker">
												<span>Tanggal</span>
											</label>
											<label class="has-float-label">
												<input type="text" class="form-control">
												<span>Lokasi atau Lapang</span>
											</label>
											<button type="submit" class="btn btn-block button-saraga">Cari Lapang</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--==========================================
=            	 Promo Section               =
===========================================-->

<section class="section">
	<!-- Container Start -->
	<div class="container" style="margin-top: 10px;">
		<div class="row" style="margin-bottom: -30px;">
			<div class="col-12">
				<div class="section-title">
					<p class="pull-left"><b>Promo</b></p> <a href="#" class="pull-right">Lihat Semua</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
				  <a href="#"><img class="card-img-top" src="{{ asset('images/promo/promo-1.jpg') }}" alt="Card image cap"></a>
				  <a href="#"><img class="card-img-top" src="{{ asset('images/promo/promo-1.jpg') }}" alt="Card image cap"></a>
				  <a href="#"><img class="card-img-top" src="{{ asset('images/promo/promo-1.jpg') }}" alt="Card image cap"></a>
				  <a href="#"><img class="card-img-top" src="{{ asset('images/promo/promo-1.jpg') }}" alt="Card image cap"></a>
				  <a href="#"><img class="card-img-top" src="{{ asset('images/promo/promo-1.jpg') }}" alt="Card image cap"></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->

	<!-- Container Start -->
	<div class="container" style="margin-top: 40px;">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<p class="pull-left" style="text-align: left;"><b>Rekomendasi Saraga</b><br>Lapang dengan fasilitas terbaik</p> <a href="#" class="pull-right">Lihat Semua</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					<div class="card">
					  <div class="card-body">
					    Semua
					  </div>
					</div>
					<div class="card">
					  <div class="card-body">
					    Futsal
					  </div>
					</div>
					<div class="card">
					  <div class="card-body">
					  	Basketball 
					  </div>
					</div>
					<div class="card">
					  <div class="card-body">
					  	Badminton 
					  </div>
					</div>
				</div>
			</div>
		</div>


		<div class="row" style="padding-top: 30px;">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@foreach($spots as $spot)
					<a href="#">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">{{$spot->name}}</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$spot->address}}</p>
						  </div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->

	<!-- Container Start -->
	<div class="container" style="margin-top: 40px;">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<p class="pull-left" style="text-align: left;"><b>Event</b><br>Informasi Turnamen yang bisa kamu ikuti</p> <a href="#" class="pull-right">Lihat Semua</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					<a href="#">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top d-flex" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
					<a href="#">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top d-flex" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
					<a href="#">
						<div class="card" style="width: 18rem;">
						  <img class="card-img-top d-flex" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
@endsection

@section('script')
	<script type="text/javascript">
		$(".datepicker").flatpickr({
		    altInput: true,
		    altFormat: "F j, Y",
		    dateFormat: "Y-m-d",
		    minDate: "today"
		});
	</script>
@endsection




