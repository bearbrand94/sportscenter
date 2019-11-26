@extends('layouts.app')

@section('css')
<style type="text/css">
	.card{
		width: 100%;
	}

	.modal {
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  overflow: hidden;
	}

	.modal-dialog {
	  position: fixed;
	  margin: 0;
	  width: 100%;
	  height: 100%;
	  padding: 0;
	}

	.modal-content {
	  position: fixed;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  border: 2px solid #3c7dcf;
	  border-radius: 0;
	  box-shadow: none;
	}

	.modal-header {
	  background: white;
	}

	.modal-body {
		min-height: 80%;
	}

	.modal-footer {
	     position:fixed;
	     top:auto;
	     right:0;
	     left:0;
	     bottom:0;		
	}
</style>
@endsection

@section('content')

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
		<nav class="navbar navbar-expand shadow-sm">
			<div class="container">
			  <a class="navbar-brand" href="#" data-dismiss="modal">
			    <i class="fa fa-close fa-lg text-saraga"></i>
			  </a>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto p-3">
			      <li class="nav-item active">		
			        	<b class="text-saraga" style="font-size: 22px;">
						    Ubah Pencarian
			        	</b>
			      </li>
			  	</ul>
			  </div>
			</div>
		</nav>
		<!-- Modal body -->
		<form method="GET" action="{{ route('field-search') }}">
			<div class="modal-body container">
				<div class="form-row pt-3">
					<div class="form-group col-md-12">
						<label class="has-float-label"> 
							<select class="w-100 form-control custom-select" name="category" id="select-category">
								<option value="">Semua</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
							<span>Olahraga Terpilih</span>
						</label>
						<label class="has-float-label">
							<input type="text" class="form-control flatpickr" style="background-color: white" name="search_date" id="search_date">
							<span>Tanggal</span>
						</label>
						<label class="has-float-label">
							<input type="text" class="form-control" id="keyword" name="keyword" data-toggle="modal" data-target="#searchModal">
							<span>Lokasi atau Lapang</span>
						</label>
					</div>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer container">
				<button type="submit" class="btn btn-block button-saraga">Cari Lapang</button>
			</div>
		</form>
    </div>
  </div>
</div>

@component('search')
@endcomponent

<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
	<div class="container">
	  <a class="navbar-brand" href="{{url('home')}}">
	    <i class="fa fa-arrow-left fa-lg" style="color: white;"></i>
	  </a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" style="color: white">  		
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
	  	<a href="#" data-toggle="modal" data-target="#myModal">
	      <li class="nav-item form-inline my-2" style="font-size: 20px; color: white;">
	      	Ubah
	      </li>
	    </a>
	  </div>
	</div>
</nav>

<section class="bg-light">
    <div class="container">
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
		<?php 
			$next5 = ($links->current_page+5) > $links->last_page ? $links->last_page : $links->current_page+5; 
			$next = ($links->current_page+1) > $links->last_page ? $links->last_page : $links->current_page+1; 
			$prev5 = ($links->current_page-5) < 1 ? 1 : $links->current_page-5; 
			$prev = ($links->current_page-1) < 1 ? 1 : $links->current_page-1; 
		?>

		<div class="row mb-5">
			<nav class="col-12">
				<ul id="pagination-demo" class="pagination justify-content-center"></ul>
			</nav>
		</div>
		<div class="row mb-5"></div>
    </div>
</section>
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
	<script type="text/javascript">
	  	var flatpickr = $(".flatpickr").flatpickr({
        	altFormat: "j F Y",
        	dateFormat: "j F Y",
	      	minDate: "today",
	      	disableMobile: "true"
	 	});
		@if (isset($requests['category']))
			$("#select-category").val("{{$requests['category']}}");
		@endif
		@if (isset($requests['search_date']))
			$("#search_date").val("{{$requests['search_date']}}");
		@endif
		@if (isset($requests['keyword']))
			$("#keyword").val("{{$requests['keyword']}}");
		@endif

	    $('#pagination-demo').twbsPagination({
	        totalPages: {{$links->last_page}},
	        visiblePages: 5,
	        startPage: {{$links->current_page}},
	        prev: '<span aria-hidden="true">&lsaquo;</span>',
	        next: '<span aria-hidden="true">&rsaquo;</span>',
	        last: '',
	        first: '',
	        initiateStartPageClick: false,
	        onPageClick: function (event, page) {
	        	var category = "category=" + "{{ Request()->category }}";
	        	var search_date = "&search_date=" + "{{ Request()->search_date }}";
	        	var keyword = "&keyword=" + "{{ Request()->keyword }}";
	        	var page = "&page=" + page;
	        	window.location.replace("{{ url()->current() }}?" + category+search_date+keyword+page);
	        }
	    });
	</script>
@endsection