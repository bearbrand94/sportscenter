@extends('layouts.master')

@section('cs')
<style type="text/css">
	.card{
		width: 100%;
	}
</style>
@endsection

@section('body')

<nav class="navbar navbar-expand shadow-sm background-saraga">
  <a class="navbar-brand" href="{{url('home')}}">
    <i class="fa fa-arrow-left fa-lg" style="color: white;"></i>
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#" style="color: white">  		
        	<b style="font-size: 20px;">Kategori</b><br>
  			Nama Tempat | Waktu
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
					<a href="#">
						<div class="card my-4">
						  <img class="card-img-top" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
					<a href="#">
						<div class="card my-4">
						  <img class="card-img-top" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
					<a href="#">
						<div class="card my-4">
						  <img class="card-img-top" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
					<a href="#">
						<div class="card my-4">
						  <img class="card-img-top" src="{{ asset('images/products/sports-3.jpg') }}" alt="Card image cap">
						  <div class="card-body">
						    <h5 class="card-title">Card title</h5>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						  </div>
						</div>
					</a>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection