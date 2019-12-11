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
	 display: inline-flex;
	 width: 20rem;

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

	.bg-button {
	  border-radius: 0.5rem; 
	  background-size: cover;
	  background-repeat: no-repeat;
	  color: white;
	}

	.content{
		background: #fff;
	    padding: 25px 15px 25px 15px;
		box-shadow: -1px 3px 6px rgba(0, 0, 0, 0.12)
	}
</style>
@endsection

@section('content')
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly bg-light">
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
								<form method="GET" action="{{ route('field-search') }}">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label class="has-float-label"> 
												<select class="w-100 form-control custom-select" name="category">
													<option value="">Semua</option>
													@foreach($categories as $category)
														<option value="{{$category->id}}">{{$category->name}}</option>
													@endforeach
												</select>
												<span>Olahraga Terpilih</span>
											</label>
											<label class="has-float-label">
												<input type="text" class="form-control flatpickr" name="search_date">
												<span>Tanggal</span>
											</label>
											<label class="has-float-label">
												<input type="text" class="form-control" name="keyword" data-toggle="modal" data-target="#searchModal" id="keyword">
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

@component('search')
@endcomponent

<!--==========================================
=            	 BODY Section               =
===========================================-->

<section class="section bg-light">
	<!--==========================================
	=            	 Promo Section               =
	===========================================-->
	<div class="container" style="margin-top: 10px;">
		<div class="content">
		<div class="row" style="margin-bottom: -30px;">
			<div class="col-12">
				<div class="section-title">
					<div class="col-12">
						<p class="pull-left"><b>Promo</b></p>
						<a href="{{route('promo-list')}}" class="pull-right">Lihat Semua</a>
					</div>
				</div>
			</div>
		</div>
			<div class="col-12">
				<div class="scrolling-wrapper">
				  @foreach($promos as $promo)
				  	<div class="card mr-2" style="width: 400px;"> 
				  	@if($promo->type=="INFOR")
					  <a target="_blank" href="{{$promo->custom_url}}">
					    <div class="banner-element banner-element-info">
					      <span>Information</span>
					    </div>
					  	<img class="card-img-top" src="{{$promo->image->path}}" alt="Card image cap" style="width: 100%; height: 250px;">
					  </a>
					@else
					  <a href="{{route('promo-detail',$promo->id)}}">
					    <div class="banner-element banner-element-promo">
					      <span>Promo</span>
					    </div>
					  	<img class="card-img-top" src="{{$promo->image->path}}" alt="Card image cap" style="width: 400px; height: 250px;">
					  </a>
					@endif
					</div>
				  @endforeach
				</div>
			</div>
		</div>
	</div>


	<!--==========================================
	=         RECOMMENDATION Section             =
	===========================================-->
	<!-- Container Start -->
	<div class="container" style="margin-top: 40px;">
		<div class="content">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<div class="col-12">
							<p class="pull-left" style="text-align: left;"><b>Rekomendasi Saraga</b><br>Lapang dengan fasilitas terbaik</p>
							<a href="{{route('field-search')}}" class="pull-right">Lihat Semua</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="scrolling-wrapper" >
					@foreach($categories as $category)
					<form method="GET" action="{{ route('field-search') }}" style="display: inline-block;">
						@csrf
						<input type="hidden" name="category" value="{{$category->id}}">
						<a href="#" onclick='this.parentNode.submit(); return false;'>
							<div class="card text-center mr-2" style="width: 8rem; border-style: none;">
							  <div class="card-body text-center bg-button" style="background-image: linear-gradient(to bottom, rgba(9,58,102,0.5), rgba(9,58,102,0.5)), url({{ asset('images/promo/promo-1.jpg') }});">
							    {{$category->name}}
							  </div>
							</div>
						</a>
					</form>
					@endforeach
				</div>
			</div>
			<div class="col-12" style="padding-top: 30px;">
				<div class="scrolling-wrapper">
					@foreach($spots as $spot)
						@component('card', [
							'review_star' => $spot->rating,
							'price'		  => $spot->price,
							'image_url'	  => $spot->cover_image,
							'title'		  => $spot->name,
							'address'	  => $spot->address,
							'a_url'		  => route('field-detail', $spot->slug),
							'spot_id'	  => $spot->id,
							'is_favorite' => isset($spot->is_favorite)?$spot->is_favorite:false
						])
						@endcomponent
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->

	<!-- Container Start -->
	<div class="container" style="margin-top: 40px;">
		<div class="content">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<div class="col-12">
						<p class="pull-left" style="text-align: left;"><b>Event</b><br>Informasi Turnamen yang bisa kamu ikuti</p> <a href="#" class="pull-right">Lihat Semua</a>
						</div>
					</div>
				</div>
			</div>
				<div class="col-12">
					<div class="scrolling-wrapper ">
					  @foreach($events as $event)
						<a href="{{ $event->custom_url }}" target="_blank">
							<div class="card" style="width: 18rem; min-height: 18rem;">
							  <img class="card-img-top d-flex" src="{{ $event->image->path }}" alt="Card image cap" style="height: 15rem">
							  <div class="card-body">
							    <h5 class="card-title">{{ $event->title }}</h5>
							    <p class="card-text">{{ $event->description }}</p>
							  </div>
							</div>
						</a>
					  @endforeach
					</div>
				</div>
		</div>
	</div>
	<!-- Container End -->
</section>
@endsection

@section('script')
	<script type="text/javascript">
	  var flatpickr = $(".flatpickr").flatpickr({
        	altFormat: "j F Y",
        	dateFormat: "j F Y",
	      	minDate: "today",
	      	disableMobile: "true"
	  });
	</script>
@endsection




