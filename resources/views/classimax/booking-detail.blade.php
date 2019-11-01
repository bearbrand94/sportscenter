@extends('layouts.master')

@section('master_css')
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
		font-size: 0.85rem;
	}

	h4{
		font-size: 1rem;
		font-weight: bold;
	}
</style>
@endsection

@section('body')
<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
	<div class="container">
	  <a class="navbar-brand" href="javascript:history.back()">
	    <i class="fa fa-arrow-left fa-lg" style="color: white;"></i>
	  </a>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" style="color: white">  		
	        	<b style="font-size: 20px;">
				    Detail Booking
	        	</b>
	  		</a>
	      </li>
	  	</ul>
	  </div>
	</div>
</nav>

<section class="border-top-1 bg-light h-100">
	<div class="container card-footer">
		<p class="d-inline-block">Konfirmasi Pembayaran Sebelum</p>
	  	<p class="d-inline-block pull-right payment-time" time="{{ date('d-M-Y H:i:s', strtotime('+1 day')) }}">Waiting..</p>
	</div>
	<div class="container card-footer bg-light">
		<p class="d-inline-block" style="color: #666">No. ID 19412394812390</p>
	</div>

	<div class="container pt-3 pb-3" style="background-color: white;">
		<button type="submit" class="btn btn-block button-saraga">Upload Bukti Pembayaran</button>
	</div>

	<div class="container pt-3 pb-3 mt-2 mb-2" style="background-color: white;">
	      <div class="col-12">
	        <p style="color: black; font-size: 1.05rem;">Total Pembayaran</p>
	        <p style="color: orange; font-size: 1.05rem; font-weight: bold;" id="grand-total-html">Rp {{number_format(500000,0)}}</p>
	      </div>
	</div>

    <div class="container pt-3 pb-3" style="background-color: white;">
	  	<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
	    	<div class="d-flex">
	      		<div class="d-flex mr-auto align-items-center">
	        		<h4>Detail Booking</h4>
	      		</div>
	      		<div class="d-flex ml-auto align-items-center"><span><i id="collapse-btn-detail"class="fa fa-angle-down fa-lg text-saraga" aria-hidden="true"></i></span></div>
	    	</div>
	  	</a>
	  	<div class="collapse" id="collapseExample">
	    	<hr class="my-4">
	        <div class="form-inline">
				<img src="" class="img-responsive inline-block" height="100px" width="100px" />
				<div class="ml-3">
					<p class="bigger-text mb-2">Spot</p>
					<p class="bigger-text mb-2">Court</p>
	                <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">Lapang Sintetis</span>
				</div>
	        </div>

	        <hr class="my-4">
	        <div class="row">
	        	<div class="col-12">
	        		<p class="mb-0">Hari dan Tanggal</p>
	        		<div class="form-inline">
		        		<p class="bigger-text">
			      			<i class="fa fa-calendar fa-lg text-saraga mr-1" aria-hidden="true"></i>
		        			{{date("D, j M Y", strtotime(now()))}}
		        		</p>
		        	</div>
	        	</div>
	        	<div class="col-6">
	        		<p class="mb-0">Jam</p>
	        		<div class="form-inline">
		        		<p class="bigger-text">
			      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
		        			15:00
		        		</p>
		        	</div>
	        	</div>
	        	<div class="col-6">
	        		<p class="mb-0">Durasi</p>
	        		<div class="form-inline">
		        		<p class="bigger-text">
			      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
		        			3 Jam
		        		</p>
		        	</div>
	        	</div>
	        </div>
	        <hr class="my-4">
        	<h4 >Lokasi</h4>
            <div class="card">
              <div class="card-body text-left">
                <div class="row">
                <div class="mr-auto pl-3">
                  <p class=""><i class="fa fa-map-marker" aria-hidden="true"></i>Alamat</p>
                  <a href="#" target="_blank">Get Directions</a>
                </div>
                </div>
              </div>
            </div>
		</div>
	</div>

    <div class="container pt-3 pb-3 mt-3" style="background-color: white;">
	  	<a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
	    	<div class="d-flex">
	      		<div class="d-flex mr-auto align-items-center">
	        		<h4>Rincian Pembayaran</h4>
	      		</div>
	      		<div class="d-flex ml-auto align-items-center"><span><i id="collapse-btn-payment" class="fa fa-angle-down fa-lg text-saraga" aria-hidden="true"></i></span></div>
	    	</div>
	  	</a>
	  	<div class="collapse" id="collapseExample2">
	        <hr class="my-4">
			<div class="row">
		      <div class="col-12 clearfix">
		        <p class="float-left" style="color: black;">Tipe Pembayaran</p>
		        <p class="float-right" style="color: black;">Bank Transfer</p>
		      </div>
			</div>
			<div class="row">
		      <div class="col-12 clearfix">
		        <p class="float-left" style="color: black; font-size: 1rem;"><b>Total</b></p>
		        <p class="float-right" style="color: black; font-size: 1rem; font-weight: bold;" id="grand-total-html"><b>Rp {{number_format(300000*3,0)}}</b></p>
		      </div>
			</div>
		</div>
	</div>

    <div class="container pt-3 pb-3 mt-3" style="background-color: white;">
		<a href="#">
			<div class="d-flex">
			  <div class="d-flex">
			  	<span><i class="fa fa-question-circle fa-lg pt-1" aria-hidden="true"></i></span>
			  </div>
			  <div class="pl-3">									  	
				<p class="text-muted">Jika anda memiliki keluhan silahkan hubungi kami.</p>
			  </div>
			</div>
		</a>
	</div>
</section>
@endsection

@section('master_script')
<script type="text/javascript">
	$("#collapseExample").on('shown.bs.collapse', function () {
		$("#collapse-btn-detail").removeClass("fa-angle-down");
		$("#collapse-btn-detail").addClass("fa-angle-up");
		console.log(this);
	})
	$("#collapseExample").on('hidden.bs.collapse', function () {
		$("#collapse-btn-detail").removeClass("fa-angle-up");
		$("#collapse-btn-detail").addClass("fa-angle-down");
		console.log(this);
	})

	$("#collapseExample2").on('shown.bs.collapse', function () {
		$("#collapse-btn-payment").removeClass("fa-angle-down");
		$("#collapse-btn-payment").addClass("fa-angle-up");
		console.log(this);
	})
	$("#collapseExample2").on('hidden.bs.collapse', function () {
		$("#collapse-btn-payment").removeClass("fa-angle-up");
		$("#collapse-btn-payment").addClass("fa-angle-down");
		console.log(this);
	})

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