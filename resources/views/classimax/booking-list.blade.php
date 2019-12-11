@extends('layouts.app')
@section('css')
<style type="text/css">
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


</style>
@endsection

@section('content')
<nav class="navbar navbar-expand shadow-sm background-saraga">
  <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white">  		
        	<b style="font-size: 20px;">
			    Booking
        	</b>
  		</a>
      </li>
  	</ul>
  </div>
</nav>

<section class="border-top-1 bg-light">
	<div class="container">
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
					<div class="row">
						<div class="col-12">
							<div class="scrolling-wrapper">
								@if(isset($booking_list->active))
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
						</div>
					</div>
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