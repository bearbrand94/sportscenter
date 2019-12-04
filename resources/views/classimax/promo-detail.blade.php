@extends('layouts.app')

@section('css')
<style type="text/css">
  #innerelements{
    padding: 0.75em;
    position:relative;
    left:80%;
    top: -30px;
    background-color: white;
    margin-right: auto;
    margin-bottom: auto;
    border-radius: 50%;
  } 

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
<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
  <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white" href="javascript:history.back()">  
            <i class="fa fa-arrow-left fa-2x" style="color: white; font-size: 20px;"></i>
        	<b class="ml-3" style="font-size: 20px;">
			    Detail Promo
        	</b>
  		</a>
      </li>
  	</ul>
  </div>
</nav>

<section class="border-top-1 bg-light">
    <div class="container" style="background-color: white;">
	    <div class="row">
        	<img class="card-img-top img-fluid" src="{{$detail->image->path}}" alt="Card image cap" style="max-height: 25rem; padding-right: 0px; padding-left: 0px;">
          	<div id="innerelements" class="shadow">
            	<a style="cursor: hand">
              		<i class="fav-button fa fa-share-alt fa-2x text-saraga share-btn" value="true" aria-hidden="true" style="font-size: 1.75rem;"></i>
            	</a>
          	</div>
        </div>
    	<div class="row col-12 pb-4">
	    	{{$detail->description}}
	    </div>
    </div>
    <div class="container mt-4" style="background-color: white;">
    	<div class="row p-2">
	    	<div class="col-5 d-inline-block">
	    		<div class="text-muted mb-1">Periode Promo</div>
	    		<div style="font-weight: bold">
        			{{ date("j M Y", strtotime($detail->created_at)) }}
        		</div>
	    	</div>
	    	<div class="col-4 d-inline-block">
	    		<div class="text-muted mb-1">Kode Promo</div>
	    		<div style="font-weight: bold">
        			{{ $detail->promo->code }}
        		</div>
	    	</div>
	    	<div class="col-3 d-inline-block align-self-center">
			    <button class="button bg-button p-2 pull-right" style="background-color: white; border: 1px solid orange; color: rgb(235, 130, 0);" onclick="code_copy('{{$detail->promo->code}}')">Salin Kode</button>
	    	</div>
	    </div>
    </div>

    <div class="container mt-4 pb-4" style="background-color: white;">
    	<div class="row p-2">
    		<div class="col-12 pb-4">
	    		<h4 class="pt-2 pb-1">Syarat Dan Ketentuan</h4>
	    		<hr>
	            <p>{{$detail->promo->tnc}}</p>
	    	</div>
	    </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	const shareBtn = document.querySelector('.share-btn');

	shareBtn.addEventListener('click', () => {
	  if (navigator.share) {
	    navigator.share({
	      title: 'My awesome post!',
	      text: 'This post may or may not contain the answer to the universe',
	      url: window.location.href
	    }).then(() => {
	      console.log('Thanks for sharing!');
	    })
	    .catch(err => {
	      console.log(`Couldn't share because of`, err.message);
	    });
	  } else {
	    link_copy();
	  }
	});

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