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
	 width: 14rem;

	}

	.card p{
	  white-space: initial;
	  overflow: hidden;
	}

	a{
		color:rgb(42,119,189);
		vertical-align: middle;
		font-size: 0.8rem;
	}

	.form-control[readonly]{
		border-color: rgb(9, 58, 102)!important;
		background-color: white;
	}

	.bg-button {
	  border-radius: 0.2rem; 
	  background-size: cover;
	  background-repeat: no-repeat;
	  color: white;
	  padding: 0.9rem;
	}

	.content{
		background: #fff;
	    padding: 20px 5px 20px 5px;
		box-shadow: -1px 3px 6px rgba(0, 0, 0, 0.12)
	}

	.card-img-top{
		max-height: 10rem;
		border-radius: 0;
	}
	.section-title{
		margin-bottom: 3.5rem;
	}
	.section-title p{
		font-size: 0.9rem;
		line-height: 1.2rem;
		margin-bottom: 0;
	}
	.section-title a{
		font-size: 0.75rem;
	}
	.sub-p{
		font-size: 0.65rem;
	}

	form{
		margin-bottom: 0;
	}
	#innerelements{
		padding: 0.5em !important;
		left: 75% !important;
		font-size: 1em !important;
	}
	h5{
		font-size: 1rem;
		font-weight: 800;
	}
	.card-body .card-text{
		font-size: 0.8rem;
		margin-bottom: 10px;
		margin-top: -7px;
	}

	.address{
		font-size: 0.7rem !important;
		font-weight: 400 !important;
	}

	.container-full{
		padding-right: 10px;
		padding-left: 10px;
	}
</style>
@endsection

@section('content')
<!--===============================
=            Hero Area            =
================================-->

<section class="section bg-light" style="padding-top: 0; padding-bottom: 0">
	<div class="container hero-area bg-1 overly text-center">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Header Contetnt -->
					<div class="content-block" style="padding-bottom: 10px;">
				        <img class="card-img-top pb-5" src="{{ asset('images/saraga.svg') }}" alt="Card image cap" style="width: 150px;">
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
													<span>Olahraga</span>
												</label>
												<label class="has-float-label">
													<input type="text" class="form-control flatpickr" name="search_date">
													<span>Tanggal</span>
												</label>
												<label class="has-float-label">
													<input type="text" class="form-control" readonly="readonly" name="keyword" data-toggle="modal" data-target="#searchModal" id="keyword">
													<span>Lokasi atau Lapang</span>
												</label>
												<button type="submit" class="btn btn-block button-saraga">Cari Lapang</button>
											</div>
										</div>
									</form>
	@component('search')
	@endcomponent
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
	</div>
</section>
<!--==========================================
=            	 BODY Section               =
===========================================-->

<section class="section bg-light">
	<!--==========================================
	=            	 Promo Section               =
	===========================================-->
	@if(count($promos) > 0)
	<div class="container container-full" style="margin-top: 10px;">
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
				  	<div class="card mr-1"> 
				  	@if($promo->type=="INFOR")
					  <a target="_blank" href="{{$promo->custom_url}}">
					    <div class="banner-element banner-element-info">
					      <span>Information</span>
					    </div>
					  	<img class="card-img-top" src="{{$promo->image->path}}" alt="Card image cap" style="width: 100%; height: 110px;">
					  </a>
					@else
					  <a href="{{route('promo-detail',$promo->id)}}">
					    <div class="banner-element banner-element-promo">
					      <span>Promo</span>
					    </div>
					  	<img class="card-img-top" src="{{$promo->image->path}}" alt="Card image cap" style="width: 100%; height: 110px;">
					  </a>
					@endif
					</div>
				  @endforeach
				</div>
			</div>
		</div>
	</div>
	@endif

	<!--==========================================
	=         RECOMMENDATION Section             =
	===========================================-->
	<!-- Container Start -->
	<div class="container container-full" style="margin-top: 20px;">
		<div class="content">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<div class="col-12">
							<p class="pull-left" style="text-align: left;"><b>Rekomendasi Saraga</b><br><subp class="sub-p">Lapang dengan fasilitas terbaik</subp></p>
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
							<div class="card text-center mr-2" style="width: 7rem; border-style: none;">
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

	<!--==========================================
	=               EVENT Section                =
	===========================================-->
	<!-- Container Start -->
	@if(count($events) > 0)
	<div class="container container-full" style="margin-top: 20px;">
		<div class="content">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<div class="col-12">
						<p class="pull-left" style="text-align: left;"><b>Event</b><br><subp class="sub-p">Informasi Turnamen yang bisa kamu ikuti</subp></p> <a href="{{route('event-list')}}" class="pull-right">Lihat Semua</a>
						</div>
					</div>
				</div>
			</div>
				<div class="col-12">
					<div class="scrolling-wrapper ">
					  @foreach($events as $event)
						<a href="{{ route('event-detail', $event->id)}}">
							<div class="card">
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
	@endif
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




