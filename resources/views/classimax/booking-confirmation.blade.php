@extends('layouts.master')

@section('master_css')
<style type="text/css">
	.normal-text{
		color: black;
	}
	.bigger-text{
		color: black;
		font-size: 1.05rem;
		font-weight: bold;
	}
</style>
    <script type="text/javascript"
            src="{{ config('app.snap_url') }}/snap.js"
            data-client-key="{{ config('app.client_key') }}"></script>

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
				    Konfirmasi Booking
	        	</b>
	  		</a>
	      </li>
	  	</ul>
	  </div>
	</div>
</nav>

<section class="border-top-1">
    <div class="container mt-4">
    	<h5 class="bigger-text">Detail Booking</h5>
    	<hr class="my-4">
        <div class="form-inline">
			<img src="{{$spot->cover_image}}" class="img-responsive inline-block" height="100px" width="100px" />
			<div class="ml-3">
				<p class="bigger-text mb-2">{{$spot->name}}</p>
				<p class="bigger-text mb-2">{{$court->name}}</p>
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
	        			{{date("D, j M Y", strtotime($input['input_date']))}}
	        		</p>
	        	</div>
        	</div>
        	<div class="col-6">
        		<p class="mb-0">Jam</p>
        		<div class="form-inline">
	        		<p class="bigger-text">
		      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
	        			{{$input['input_time']}}:00
	        		</p>
	        	</div>
        	</div>
        	<div class="col-6">
        		<p class="mb-0">Durasi</p>
        		<div class="form-inline">
	        		<p class="bigger-text">
		      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
	        			{{$input['duration']}} Jam
	        		</p>
	        	</div>
        	</div>
        </div>
        <hr class="my-4">
		<div class="row">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Harga / Jam</p>
	        <p class="float-right" style="color: black; font-weight: bold;"><del class="mr-2 text-muted" style=" font-weight: normal; font-size: 0.8rem;">Rp 300.000</del>Rp {{number_format($court->price,0)}}</p>
	      </div>
		</div>

		<p class="mb-2 mt-4" style="font-weight: bold; color: black; font-size: 1.1rem;">Tipe Pembayaran</p>
		<p style="color: black; font-size: 1rem;">Full Payment</p>

		<p class="mb-2 mt-4" style="font-weight: bold; color: black; font-size: 1.1rem;">Voucher</p>
		<div class="form-inline">
			<input type="text" class="form-control col-9" name="voucher" placeholder="Punya kode voucher atau promo" id="voucher">
			<button class="btn btn-primary col-3" id="apply">Apply</button>
		</div>
        <div class="alert alert-danger" id="promo-error" style="display: none;">
            <strong>Promo Invalid</strong>
        </div>
        <div class="alert alert-success" id="promo-success" style="display: none;">
            <strong>Yay! You can use this promo code!</strong>
        </div>

        <hr class="my-4">
    	<h4>Rincian Pembayaran</h4>
    	<hr class="my-4">
		<div class="row">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Harga / Jam</p>
	        <p class="float-right" style="color: black;">Rp {{number_format($court->price,0)}}</p>
	      </div>
		</div>
		<div class="row">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Total yang harus dibayar</p>
	        <p class="float-right" style="color: black;">Rp {{number_format($court->price*$input['duration'],0)}}</p>
	      </div>
		</div>
		<div class="row" id="discount" style="display: none;">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Discount</p>
	        <p class="float-right" style="color: black;" id="discount-html"></p>
	      </div>
		</div>
		<div class="row mt-4">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black; font-size: 1.05rem;">Total Pembayaran</p>
	        <p class="float-right" style="color: orange; font-size: 1.05rem; font-weight: bold;" id="grand-total-html">Rp {{number_format($court->price*$input['duration'],0)}}</p>
	      </div>
		</div>
		<button type="button" class="btn btn-block button-saraga mb-4" onclick="select_payment()">Pilih Metode Pembayaran</button>
	    <script type="text/javascript">
	    </script>
    </div>
</section>
@endsection

@section('master_script')
<script type="text/javascript">
  $(document).ready(function(){
    $("#apply").click(function() {
		$.post("{{route('apply-coupon')}}",
		{
			_token: "{{ csrf_token() }}",
			code: $("#voucher").val()
		},
		function(data, status){
			if(data.status=="true"){
			  	$("#promo-success").css("display", "block");
			  	$("#promo-error").css("display", "none");
			  	console.log(data.data.discount);
			  	$("#discount").css("display", "block");
			  	$("#discount-html").html("Rp " + number_format(data.data.discount));
			  	$("#grand-total-html").html("Rp " + number_format(data.data.grand_total));
			}
			else{
			  	$("#promo-success").css("display", "none");
			  	$("#promo-error").css("display", "block");
			  	$("#discount").css("display", "none");
			  	$("#grand-total-html").html("Rp {{number_format($court->price*$input['duration'],0)}}");
			}			
		});
  	});
  });	
  function create_order(result){
	$.post("{{route('booking-create')}}",
	{
		data: result
	},
	function(data, status){
		console.log(data);
	});
  };
  function select_payment(){
	$.post("{{route('booking-snap')}}",
	{
		_token: "{{ csrf_token() }}",
		code: $("#voucher").val()
	},
	function(data, status){
		// console.log(data);
		// console.log(status);

		if(status=="success"){
			var d = JSON.parse(data)
			// console.log(d.redirect_url);
			window.location.href = d.redirect_url;
		}
	});
  }
</script>
@endsection