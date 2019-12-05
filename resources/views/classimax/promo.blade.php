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
  <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white" href="javascript:history.back()">  
            <i class="fa fa-arrow-left fa-2x" style="color: white; font-size: 20px;"></i>
        	<b class="ml-3" style="font-size: 20px;">
			    Promo
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
	@if(isset($promos))
    <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@foreach($promos as $promo)
					<div class="pb-3 pt-3">
						<div class="card">
						  <a href="{{route('promo-detail', $promo->id)}}">
						    <img class="card-img-top" src="{{$promo->image->path}}" alt="Card image cap" style="max-height: 35rem">
						  </a>
						    <a>
						      <div class="card-body">
							    <p class="card-text">
							    	<div class="row">
								    	<div class="col-5 d-inline-block">
								    		<div class="text-muted mb-1">Periode Promo</div>
								    		<div style="font-weight: bold">
							        			{{ date("j M Y", strtotime($promo->created_at)) }}
							        		</div>
								    	</div>
								    	<div class="col-4 d-inline-block">
								    		<div class="text-muted mb-1">Kode Promo</div>
								    		<div style="font-weight: bold">
							        			{{ $promo->promo->code }}
							        		</div>
								    	</div>
								    	<div class="col-3 d-inline-block align-self-center">
										    <button class="button bg-button p-2 pull-right" style="background-color: white; border: 1px solid orange; color: rgb(235, 130, 0);" onclick="code_copy('{{$promo->promo->code}}')">Salin Kode</button>
								    	</div>
								    </div>
							    </p>
						      </div>
						    </a>
						</div>
					</div>
					@endforeach
					<div class="pb-5 pt-4"></div>
				</div>
			</div>
		</div>
    </div>
    @else
    <div class="container h-100">
    	<div class="row align-items-center h-100">
    		<div class="mx-auto p-4">
		      <img src="{{asset('/images/no-fav.png')}}" class="img-fluid pb-4" alt="Belum ada booking">
		      <div class="p-4"></div>
		  	</div>
		</div>
    </div>
    @endif
</section>
@endsection
@section('script')
<script type="text/javascript">
	function code_copy(code){
	    var input = document.createElement('input');
	    input.setAttribute('value', code);
	    document.body.appendChild(input);
	    input.select();
	    var result = document.execCommand('copy');
	    document.body.removeChild(input);
		tempAlert("Code Copied!",1000);
	    return result;
	}
</script>	
@endsection