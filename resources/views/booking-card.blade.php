
<div class="card" style="width: 100%; cursor:pointer;" id="card-{{$id}}">
	@if(isset($token))
  	<a href="{{config('app.snap_url').'/v1/transactions/'.$token.'/pdf'}}"></a>
  	@else
  	<a href="">
  	@endif
    	<img class="card-img-top" src="{{$image_url}}" alt="Card image cap" style="max-height: 35rem">
  	</a>
	<div id="innerelements" class="shadow">
		<i class="fav-button fa fa-futbol-o fa-2x" aria-hidden="true" style="font-size: 1.5rem;"></i>
	    <!-- <img class="icon" src="{{ asset('images/sports/futbol.svg') }}" height="30px" width="30px"> -->
	</div>
	<div class="card-body">
	    <h5 class="card-title text-truncate pt-3" style="margin-top:-50px;">{{$title}}</h5>
	    <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">{{$span}}</span>
	    
	    <p class="card-text">
	    	<div class="d-inline-block mr-4 mb-2">
	    		<div class="text-muted mb-2">Hari dan Tanggal</div>
	    		<div style="font-weight: bold">
	      			<i class="fa fa-calendar fa-lg text-saraga mr-1" aria-hidden="true"></i>
        			{{ date("D, j M Y", strtotime($date)) }}
        		</div>
	    	</div>
	    	<div class="d-inline-block mr-4 mb-2">
	    		<div class="text-muted mb-2">Jam</div>
	    		<div style="font-weight: bold">
	      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
        			{{ date("H:i", strtotime($date)) }}
        		</div>
	    	</div>
	    	<div class="d-inline-block">
	    		<div class="text-muted mb-2">Durasi</div>
	    		<div style="font-weight: bold">
	      			<i class="fa fa-clock-o fa-lg text-saraga mr-1" aria-hidden="true"></i>
        			{{ $duration }} Jam
        		</div>
	    	</div>
	    </p>
	</div>
	@component('payment-time', [
		'id'	=> $id,
		'date'	=> $date,
		'status'=> $status
	])
	@endcomponent
</div>

<script type="text/javascript">
	$("#card-{{$id}}").click(function(){
		window.location.href="{{ route('booking-detail', ['id'=>$id]) }}";
	});
	console.log("Component Mounted: {{$id}}");
	console.log("{{$status}}");
	// console.log($('#payment-time-{{$id}}').children('#hour').html());
	// Update the count down every 1 second

</script>