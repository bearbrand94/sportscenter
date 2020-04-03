@extends('layouts.app')
@section('css')
<style type="text/css">
	#filter-modal .modal-body{
		min-height: 0 !important
	}
	#innerelements{
	  padding: 0.75em;
	  position:relative;
	  left:5%;
	  top: -25px;
	  background-color: white;
	  margin-right: auto;
	  margin-bottom: auto;
	  border-radius: 50%;
	  /*background-color:  var(--saraga-color);*/
	  color: white;
	}	
	.nav-link{
		color: grey;
	}
	.nav-link.active{
		color: var(--saraga-color) !important;
		font-weight: bold;
	}

	.booking-list.container{
		padding-left: 5;
		padding-right: 5;
	}

	.nav-tabs .nav-link{
		border: 0;
	}
	.nav-tabs .nav-link.active{
		border-bottom: 2px solid var(--saraga-color);
	}
	.nav-link{
		font-size: 0.85rem;
	}
</style>
@endsection

@section('content')
<!-- Filter Modal -->
<div class="modal" id="filter-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
        <nav class="navbar navbar-expand shadow-sm sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#" data-dismiss="modal">
                <img src="{{ asset('images/close-icon.svg') }}" alt="" class="close-icon" title="back">
              </a>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto p-2">
                  <li class="nav-item active">      
                        <b class="text-saraga">
                            Urutkan & Filter
                        </b>
                  </li>
                </ul>
			      <a class="nav-item form-inline my-2" href="#" style="color: var(--blue)" data-dismiss="modal">
			      	Reset
			      </a>
              </div>
            </div>
        </nav>
        <!-- Modal body -->
        <form method="GET" action="{{ route('field-search') }}" style="overflow-y: auto" class="bg-light">
            <div class="modal-body container bg-white">
            	<div class="col-12">
            		<div class="row">
                	<b>Sort</b>
					<select class="w-100 form-control custom-select mt-2" name="category" id="select-category">
						<option disabled selected value style="display: none">Sort by</option>
						<option value="">Semua</option>
					</select>
					</div>
            	</div>
            </div>
            <div class="modal-body container mt-2 bg-white">
            	<div class="col-12">
            		<div class="row">
	                	<b>Rentang Harga</b>
	                </div>
                	<div class="form-inline row mt-2">
							<input type="text" class="form-control mr-auto" name="minPrice" id="input-min-price" style="width: 45%" placeholder="Minimal">
							<span class="mr-2 ml-2" style="font-size: 1.5rem; font-weight: 900; color: var(--saraga-color); margin-bottom: 5px;">-</span>
							<input type="text" class="form-control ml-auto" name="minPrice" id="input-min-price" style="width: 45%" placeholder="Maximal">
					</div>
            	</div>
            </div>

            <div class="modal-body container mt-2 mb-5 bg-white">
            	<!-- Rating -->
            	<div class="col-12">
            		<div class="row">
	                	<b>Rating</b>
	                </div>
                	<div class="form-inline row mt-2">
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	1
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	2
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	3
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	4
			            </div>
			            <div class="form-control border rating-button" style="margin-right: 0">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	5
			            </div>
					</div>
            	</div>
            	<hr>
            	<div class="col-12">
            		<div class="row">
	                	<b>Tipe Lapang</b>
	                </div>
	                <div class="row mt-2">
						<div class="custom-control custom-checkbox col-6">
						  <input type="checkbox" class="custom-control-input" id="customCheck1">
						  <label class="custom-control-label" for="customCheck1">Lapang Indoor</label>
						</div>
						<div class="custom-control custom-checkbox col-6">
						  <input type="checkbox" class="custom-control-input" id="customCheck2">
						  <label class="custom-control-label" for="customCheck2">Lapang Outdoor</label>
						</div>
					</div>
                </div>
                <hr>
            	<div class="col-12">
            		<div class="row">
	                	<b>Jenis Lapang</b>
	                </div>
	                <div class="row mt-2">
							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>
							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>
	                </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer container bg-white">
                <button type="submit" class="btn btn-block button-saraga">Terapkan</button>
            </div>
        </form>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand shadow-sm background-saraga">
  <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white">  		
        	<b>
			    Booking
        	</b>
  		</a>
      </li>
  	</ul>
	<a class="nav-item form-inline" style="color: white;" data-toggle="modal" data-target="#filter-modal" href="#">
	  Filter
	</a>
  </div>
</nav>

<section class="border-top-1 bg-light">
	<div class="booking-list container">
	    <div class="pb-5">
			<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
			  <li class="nav-item active">
			    <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="true">Aktif</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="selesai" aria-selected="false">Selesai</a>
			  </li>
			</ul>
			<div class="tab-content container">
				<div id="active" class="tab-pane fade in active">
					@if(isset($booking_list->active))
					<div class="row">
							<div class="scrolling-wrapper">
								@foreach($booking_list->active as $booking)
								<div class="row p-3">
									@component('booking-card', [
										'id'		=> $booking->id,
										'token' 	=> $booking->token,
										'image_url'	=> $booking->detail[0]->image->path,
										'icon'		=> $booking->detail[0]->sport->slug,
										'title'		=> $booking->detail[0]->spot->name,
										'span'	  => $booking->detail[0]->court->sport,
										'date'	  => $booking->order_date,
										'duration'	=> $booking->duration,
										'status'	=> $booking->status,
										'time'		=> $booking->detail
									])
									@endcomponent
									<!-- {{print_r($booking)}} -->
								</div>
								@endforeach
							</div>
					</div>
					@else
				    <div class="container h-100">
				    	<div class="row align-items-center" style="height:90%">
				    		<div class="col-12">
						      <img src="{{asset('/images/no-book.png')}}" class="img-fluid pb-4" alt="Belum ada booking" style="max-height:30rem;">
						      <form method="GET" action="{{route('field-search')}}">
						      	@csrf
						      	<button type="submit" class="btn btn-block button-saraga">Booking Sekarang</button>
						      </form>
						      <div class="p-4"></div>
						  	</div>
						</div>
				    </div>
					@endif
				</div>
				<div id="selesai" class="tab-pane fade">
					@if(isset($booking_list->past))
					@foreach($booking_list->past as $booking)
					<div class="row p-3">
						@component('booking-card', [
							'id'		=> $booking->id,
							'token' 	=> $booking->token,
							'image_url'	=> $booking->detail[0]->image->path,
							'icon'		=> $booking->detail[0]->sport->slug,
							'title'		=> $booking->detail[0]->spot->name,
							'span'	  => $booking->detail[0]->court->sport,
							'date'	  => $booking->order_date,
							'duration'	=> $booking->duration,
							'status'	=> $booking->status,
							'time'		=> $booking->detail
						])
						@endcomponent
					</div>
					@endforeach
					@else
				    <div class="container h-100">
				    	<div class="row align-items-center" style="height:90%">
				    		<div class="col-12">
						      <img src="{{asset('/images/no-book.png')}}" class="img-fluid pb-4" alt="Belum ada booking" style="max-height: 30rem">
						      <div class="p-4"></div>
						  	</div>
						</div>
				    </div>
					@endif
				</div>
			</div>
	    </div>
		<div class="pb-5"></div>
	</div>
</section>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
	   $('#active-tab').trigger("click"); 
	});
</script>
@endsection