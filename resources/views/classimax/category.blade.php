@extends('layouts.master')

@section('cs')
<style type="text/css">
	.card{
		width: 100%;
	}
</style>
@endsection

@section('body')
<!-- <pre>
	{{print_r($links)}}	
</pre> -->
<nav class="navbar navbar-expand shadow-sm background-saraga">
  <a class="navbar-brand" href="{{url('home')}}">
    <i class="fa fa-arrow-left fa-lg" style="color: white;"></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color: white">  		
        	<b style="font-size: 20px;">
			    @if (empty($requests['category_name']))
			      {{"Semua Kategori"}}
			    @else
			      {{$requests['category_name']}}
			    @endif
        	</b>
        	<br>
		    @if (empty($requests['keyword']))
		      {{"Semua tempat"}}
		    @else
		      {{$requests['keyword']}}
	        @endif
  			| 
		    @if (empty($requests['search_date']))
		      {{"Semua waktu"}}
		    @else
		      {{date("d F Y", strtotime($requests['search_date']))}}
	        @endif
  		</a>
      </li>
  	</ul>
  	<a>
      <li class="nav-item form-inline my-2" style="font-size: 20px; color: white;">
      	Ubah
      </li>
    </a>
  </div>
</nav>

<section class="border-top-1 bg-light">
    <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@foreach($fields as $field)
					<a href="#">
						<div class="card my-4">
						  <img class="card-img-top" src="{{ $field->cover_image }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title text-truncate">{{$field->name}}</h5>
						    <p class="card-text">{{$field->description}}</p>
						    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$field->address}}</p>
						  </div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
    </div>
</section>
@endsection