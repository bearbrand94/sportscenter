@extends('layouts.master')

@section('master_css')
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
	  position: absolute;
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
</style>
@endsection

@section('body')
<!-- <pre>
	{{print_r($links)}}	
</pre> -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
		<nav class="navbar navbar-expand shadow-sm">
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
		</nav>
		<!-- Modal body -->
		<form method="POST" action="{{ route('field-search') }}">
			@csrf
			<div class="modal-body">
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
							<input type="date" class="form-control datepicker" name="search_date">
							<span>Tanggal</span>
						</label>
						<label class="has-float-label">
							<input type="text" class="form-control" name="keyword">
							<span>Lokasi atau Lapang</span>
						</label>
					</div>
				</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-block button-saraga">Cari Lapang</button>
			</div>
		</form>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand shadow-sm background-saraga">
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
</nav>

<section class="border-top-1 bg-light">
    <div class="container">
		<div class="row">
			<div class="col-12">
				<div class="scrolling-wrapper">
					@foreach($fields as $field)
						<div class="pb-3 pt-3"> 
						@component('card', [
							'review_star' => $field->rating,
							'price'		  => 300000,
							'image_url'	  => $field->cover_image,
							'title'		  => $field->name,
							'address'	  => $field->address,
							'a_url'		  => route('field-detail', $field->slug),
						])
						@endcomponent
						</div>
					@endforeach
				</div>
			</div>
		</div>
    </div>
</section>
@endsection

@section('master_script')
	<script type="text/javascript">
		$("#select-category").val("{{$requests['category']}}");
	</script>
@endsection