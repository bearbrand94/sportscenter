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
</style>
<div class="card">
  <a href="{{$a_url}}">
    <img class="card-img-top" src="{{$image_url}}" alt="Card image cap" style="max-height: 35rem">
  </a>
    <div id="innerelements" class="shadow">
      <a href="#">
        <i class="fa fa-heart fa-2x" aria-hidden="true" style="color: rgb(226,42,42); font-size: 1.75rem;"></i>
      </a>
    </div>
    <a href="{{$a_url}}">
      <div class="card-body">
        <h5 class="card-title text-truncate" style="margin-top:-50px;">{{$title}}</h5>
        <p class="card-text">Rp {{number_format($price,0)}} /Jam</p>
        <p class="text-truncate"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$address}}</p>
        
        <p class="card-text">
        	@for ($i=0; $i<$review_star; $i++)
        		<i class="fa fa-star" aria-hidden="true"></i>
        	@endfor
        </p>
        {{ $slot }}
      </div>
    </a>
</div>
