@extends('layouts.app')

@section('css')
<style type="text/css">


	.scrolling-wrapper {
	  overflow-x: scroll;
	  overflow-y: hidden;
	  white-space: nowrap;
	}

	.card p{
	  white-space: initial;
	  overflow: hidden;
	}

	.bg-button {
	  border-radius: 0.5rem; 
	  background-size: cover;
	  background-repeat: no-repeat;
	  color: white;
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
			    Favorit
        	</b>
  		</a>
      </li>
  	</ul>
  </div>
</nav>

<section class="border-top-1 bg-light">
    <div class="container">
		<div class="row pt-3">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@if(isset($fields))
					@foreach($categories as $category)
					<a href="#">
						<div class="card text-center mr-2" style="width: 8rem; border-style: none; display: inline-block;">
						  <div class="card-body text-center bg-button" style="background-image: linear-gradient(to bottom, rgba(9,58,102,0.5), rgba(9,58,102,0.5)), url({{ asset('images/promo/promo-1.jpg') }});">
						    {{$category->name}}
						  </div>
						</div>
					</a>
					@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@if(isset($fields))
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
					@endif
				</div>
			</div>
		</div>
    </div>
</section>
@endsection