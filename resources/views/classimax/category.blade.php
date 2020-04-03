@extends('layouts.app')

@section('css')
<style type="text/css">
	#filter-modal .modal-body{
		min-height: 0 !important
	}
  .rating-button{
    cursor:hand;
    text-align: center;
    width: 18% !important;
    padding: 5;
    padding-top: 7;
    margin-right: 2.5%;
    height: 37px;
    /*background-color: var(--saraga-color);*/
  }
  .rating-button img{
	margin-bottom: 5;
	width: 15;
	height: 15;
  }
</style>
@endsection

@section('content')
<!-- Filter Modal -->
<div class="modal" id="filter-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
        <nav class="navbar navbar-expand shadow-sm sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#" data-dismiss="modal">
                <img src="{{ asset('images/close-icon.svg') }}" alt="" class="close-icon" title="back">
              </a>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto p-2">
                  <li class="nav-item active">      
                        <b class="text-saraga">
                            Urutkan & Filter
                        </b>
                  </li>
                </ul>
			      <a class="nav-item form-inline my-2" href="#" style="color: var(--blue)" data-dismiss="modal">
			      	Reset
			      </a>
              </div>
            </div>
        </nav>
        <!-- Modal body -->
        <form method="GET" action="{{ route('field-search') }}" style="overflow-y: auto" class="bg-light">
            <div class="modal-body container bg-white">
            	<div class="col-12">
            		<div class="row">
                	<b>Sort</b>
					<select class="w-100 form-control custom-select mt-2" name="category" id="select-category">
						<option disabled selected value style="display: none">Sort by</option>
						<option value="">Semua</option>
					</select>
					</div>
            	</div>
            </div>
            <div class="modal-body container mt-2 bg-white">
            	<div class="col-12">
            		<div class="row">
	                	<b>Rentang Harga</b>
	                </div>
                	<div class="form-inline row mt-2">
							<input type="text" class="form-control mr-auto" name="minPrice" id="input-min-price" style="width: 45%" placeholder="Minimal">
							<span class="mr-2 ml-2" style="font-size: 1.5rem; font-weight: 900; color: var(--saraga-color); margin-bottom: 5px;">-</span>
							<input type="text" class="form-control ml-auto" name="minPrice" id="input-min-price" style="width: 45%" placeholder="Maximal">
					</div>
            	</div>
            </div>

            <div class="modal-body container mt-2 mb-5 bg-white">
            	<!-- Rating -->
            	<div class="col-12">
            		<div class="row">
	                	<b>Rating</b>
	                </div>
                	<div class="form-inline row mt-2">
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	1
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	2
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	3
			            </div>
			            <div class="form-control border rating-button">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	4
			            </div>
			            <div class="form-control border rating-button" style="margin-right: 0">
			              	<img src="{{ asset('images/star.svg') }}" alt="" class="rating"title="rating">
			              	5
			            </div>
					</div>
            	</div>
            	<hr>
            	<div class="col-12">
            		<div class="row">
	                	<b>Tipe Lapang</b>
	                </div>
	                <div class="row mt-2">
						<div class="custom-control custom-checkbox col-6">
						  <input type="checkbox" class="custom-control-input" id="customCheck1">
						  <label class="custom-control-label" for="customCheck1">Lapang Indoor</label>
						</div>
						<div class="custom-control custom-checkbox col-6">
						  <input type="checkbox" class="custom-control-input" id="customCheck2">
						  <label class="custom-control-label" for="customCheck2">Lapang Outdoor</label>
						</div>
					</div>
                </div>
                <hr>
            	<div class="col-12">
            		<div class="row">
	                	<b>Jenis Lapang</b>
	                </div>
	                <div class="row mt-2">
							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>
							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>							<div class="custom-control custom-checkbox col-6">
							  <input type="checkbox" class="custom-control-input" id="customCheck1">
							  <label class="custom-control-label" for="customCheck1">Lapang </label>
							</div>
	                </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer container bg-white">
                <button type="submit" class="btn btn-block button-saraga">Terapkan</button>
            </div>
        </form>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
	<div class="container">
	  <a class="navbar-brand" href="{{url('home')}}">
	    <img src="{{ asset('images/back-icon.svg') }}" alt="" class="back-icon" title="back">
	  </a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" style="color: white" data-toggle="modal" data-target="#myModal" href="#">  		
	        	<b style="font-size: 1rem;">
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
	  	<a href="#" data-toggle="modal" data-target="#filter-modal">
	      <li class="nav-item form-inline my-2" style="color: white;">
	      	Filter
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
				<ul id="pagination" class="pagination justify-content-center"></ul>
			</nav>
		</div>
		<div class="row mb-5"></div>
    </div>
</section>
@endsection

@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
	<script type="text/javascript">
		@if (isset($requests['category']))
			$("#select-category").val("{{$requests['category']}}");
		@endif
		@if (isset($requests['search_date']))
			flatpickr.setDate(new Date("{{$requests['search_date']}}"));
		@endif
		@if (isset($requests['keyword']))
			$("#keyword").val("{{$requests['keyword']}}");
		@endif

	    $('#pagination').twbsPagination({
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