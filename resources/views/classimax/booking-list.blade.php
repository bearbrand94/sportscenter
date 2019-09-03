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
	.card-footer{
		background-color: rgb(255,130,0);
	}
	.card-footer>p{
		color: white;
		padding: 0;
		margin: 0;
		font-size: 1rem;
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
				@foreach($booking_list->active as $booking)
				<div class="row p-3">
					<div class="card">
						@if(isset($booking->token))
					  	<a href="{{config('app.snap_url').'/v1/transactions/'.$booking->token.'/pdf'}}">
					  	@else
					  	<a href="#">
					  	@endif
					    	<img class="card-img-top" src="{{$booking->court->cover_image}}" alt="Card image cap" style="max-height: 35rem">
					  	</a>
						<div id="innerelements" class="shadow">
						    <img class="icon" src="{{ asset('images/sports/'.$booking->icon) }}" height="30px" width="30px">
						</div>
						<div class="card-body">
						    <h5 class="card-title text-truncate pt-3" style="margin-top:-50px;">{{$booking->court->name}}</h5>
						    <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">{{$booking->court->type}}</span>
						    
						    <p class="card-text">
						    	<div class="d-inline-block mr-4 mb-2">
						    		<div class="text-muted mb-2">Hari dan Tanggal</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-calendar fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ date("D, j M Y", strtotime($booking->order_date)) }}
					        		</div>
						    	</div>
						    	<div class="d-inline-block mr-4 mb-2">
						    		<div class="text-muted mb-2">Jam</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ date("H:i", strtotime($booking->order_date)) }}
					        		</div>
						    	</div>
						    	<div class="d-inline-block">
						    		<div class="text-muted mb-2">Durasi</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ $booking->duration }} Jam
					        		</div>
						    	</div>
						    </p>
						</div>
						<div class="card-footer p">
						  	<p class="d-inline-block">Konfirmasi Pembayaran Sebelum</p>
						  	<p class="d-inline-block pull-right payment-time" time="{{ date('d-M-Y H:i:s', strtotime($booking->order_date)) }}">Waiting..</p>
						</div>
					</div>
				</div>
				@endforeach
				@else
			    <div class="container h-100">
			    	<div class="row align-items-center h-100">
			    		<div class="mx-auto p-4">
					      <img src="{{asset('/images/no-book.png')}}" class="img-fluid pb-4" alt="Belum ada booking" style="max-height:30rem">
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
					<div class="card">

						@if(isset($booking->token))
					  	<a href="{{config('app.snap_url').'/v1/transactions/'.$booking->token.'/pdf'}}">
					  	@else
					  	<a href="#">
					  	@endif
					    	<img class="card-img-top" src="{{$booking->court->cover_image}}" alt="Card image cap" style="max-height: 35rem">
					  	</a>
						<div id="innerelements" class="shadow">
						    <i class="fav-button fa fa-futbol-o fa-2x" aria-hidden="true" style="font-size: 1.5rem;"></i>
						</div>
						<div class="card-body">
						    <h5 class="card-title text-truncate pt-3" style="margin-top:-50px;">{{$booking->court->name}}</h5>
						    <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">{{$booking->court->type}}</span>
						    
						    <p class="card-text">
						    	<div class="d-inline-block mr-4 mb-2">
						    		<div class="text-muted mb-2">Hari dan Tanggal</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-calendar fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ date("D, j M Y", strtotime($booking->order_date)) }}
					        		</div>
						    	</div>
						    	<div class="d-inline-block mr-4 mb-2">
						    		<div class="text-muted mb-2">Jam</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ date("H:i", strtotime($booking->order_date)) }}
					        		</div>
						    	</div>
						    	<div class="d-inline-block">
						    		<div class="text-muted mb-2">Durasi</div>
						    		<div style="font-weight: bold">
						      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
					        			{{ $booking->duration }} Jam
					        		</div>
						    	</div>
						    </p>
						</div>
						<div class="card-footer p">
						  	<p class="d-inline-block">Konfirmasi Pembayaran Sebelum</p>
						  	<p class="d-inline-block pull-right payment-time" time="{{ date('d-M-Y H:i:s', strtotime($booking->order_date)) }}">Waiting..</p>
						</div>
					</div>
				</div>
				@endforeach
				@else
			    <div class="container h-100">
			    	<div class="row align-items-center h-100">
			    		<div class="mx-auto p-4">
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
</section>

@endsection

@section('script')
<script type="text/javascript">
	// Update the count down every 1 second
	var x = setInterval(function() {
		$('.payment-time').each(function() {
		  // Set the date we're counting down to
		  var countDownDate = new Date($(this).attr('time')).getTime();

		  // Get today's date and time
		  var now = new Date().getTime();

		  // Find the distance between now and the count down date
		  var distance = countDownDate - now;

		  // Time calculations for hours, minutes and seconds
	      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  $(this).html((hours+days*24) + "h " + minutes + "m " + seconds + "s ");

		  // If the count down is finished, write some text 
		  if (distance < 0) {
		    // clearInterval(x);
		    $(this).html("EXPIRED");
		    $(this).parent( ".card-footer" ).css( "background-color", "red" );
		  }
		});
	}, 1000);
	$(document).ready(function(){
	   $('#active-tab').trigger("click"); 
	});
</script>
@endsection