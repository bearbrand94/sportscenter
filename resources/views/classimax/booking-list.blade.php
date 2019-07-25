@extends('layouts.app')

@section('css')
<style type="text/css">


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
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
@if(isset($fields))
<section class="border-top-1 bg-light">
@else
<section class="border-top-1">
@endif
	@if(isset($fields))
    <div class="container">
		<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="active" aria-selected="true">Aktif</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Selesai</a>
		  </li>
		</ul>
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@foreach($fields as $spot)
						<div class="pb-3 pt-3"> 
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
						</div>
					@endforeach
				</div>
			</div>
		</div>
    </div>
    @else
    <div class="container h-100">
    	<div class="row align-items-center h-100">
    		<div class="mx-auto p-4">
		      <img src="{{asset('/images/no-book.png')}}" class="img-fluid pb-4" alt="Belum ada booking">
		      <form method="POST" action="http://localhost/sportscenter/field/search">
		      	@csrf
		      	<button type="submit" class="btn btn-block button-saraga">Booking Sekarang</button>
		      </form>
		      <div class="p-4"></div>
		  	</div>
		</div>
    </div>
    @endif
</section>
@endsection