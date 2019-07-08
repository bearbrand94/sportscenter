<a href="{{$a_url}}">
	<div class="card">
	  <img class="card-img-top" src="{{$image_url}}" alt="Card image cap">
	  <div class="card-body">
	    <h5 class="card-title text-truncate">{{$title}}</h5>
	    <p class="card-text">Rp {{number_format($price,0)}} /Jam</p>
	    <p class="card-text"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$address}}</p>
	    
	    <p class="card-text">
	    	@for ($i=0; $i<$review_star; $i++)
	    		<i class="fa fa-star" aria-hidden="true"></i>
	    	@endfor
	    </p>
	    {{ $slot }}
	  </div>
	</div>
</a>