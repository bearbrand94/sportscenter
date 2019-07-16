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
@endsection

@section('body')
<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
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
</nav>

<section class="border-top-1">
    <div class="container mt-4">
    	<h5 class="bigger-text">Detail Booking</h5>
    	<hr class="my-4">
        <div class="form-inline">
			<img src="{{$detail->spot->cover_image}}" class="img-responsive inline-block" height="100px" width="100px" />
			<div class="ml-3">
				<p class="bigger-text mb-2">{{$detail->spot->name}}</p>
				<p class="bigger-text mb-2">{{$detail->courts[0]->name}}</p>
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
	        <p class="float-right" style="color: black; font-weight: bold;"><del class="mr-2 text-muted" style=" font-weight: normal; font-size: 0.8rem;">Rp 300.000</del>Rp 300.000</p>
	      </div>
		</div>
		<p class="mb-2 mt-4" style="font-weight: bold; color: black; font-size: 1.1rem;">Tipe Pembayaran</p>
		<p style="color: black; font-size: 1rem;">Full Payment</p>

		<p class="mb-2 mt-4" style="font-weight: bold; color: black; font-size: 1.1rem;">Voucher</p>
		<input type="text" class="form-control pt-0" name="voucher" placeholder="Punya kode voucher atau promo">
        <hr class="my-4">
    	<h4>Rincian Pembayaran</h4>
    	<hr class="my-4">
		<div class="row">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Harga / Jam</p>
	        <p class="float-right" style="color: black;">Rp 300.000</p>
	      </div>
		</div>
		<div class="row">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black;">Total yang harus dibayar</p>
	        <p class="float-right" style="color: black;">Rp {{number_format(300000*$input['duration'],0)}}</p>
	      </div>
		</div>
		<div class="row mt-4">
	      <div class="col-12 clearfix">
	        <p class="float-left" style="color: black; font-size: 1.05rem;">Total Pembayaran</p>
	        <p class="float-right" style="color: orange; font-size: 1.05rem; font-weight: bold;">Rp {{number_format(300000*$input['duration'],0)}}</p>
	      </div>
		</div>
		<button type="submit" class="btn btn-block button-saraga mb-4">Pilih Metode Pembayaran</button>
    </div>
</section>
@endsection

@section('master_script')
@endsection