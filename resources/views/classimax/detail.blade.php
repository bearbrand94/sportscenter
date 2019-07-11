@extends('layouts.master')

@section('master_css')
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
</style>
@endsection

@section('body')

<section>
  <div class="container-fluid bg-muted">
    <div class="row">
      <div class="card border-0 rounded-0">
        <img class="card-img-top" src="{{$detail->spot->cover_image}}" alt="Card image cap" style="max-height: 35rem">
        <div class="card-img-overlay">
          <a href="javascript:history.back()">
            <i class="fa fa-arrow-left fa-2x" style="color: white;"></i>
          </a>
          <a href="#">
            <i class="fa fa-share-alt fa-2x pull-right" style="color: white;"></i>
          </a>
        </div>

        <div id="innerelements" class="shadow">
          <i class="fa fa-heart fa-2x" aria-hidden="true" style="color: rgb(226,42,42); font-size: 1.75rem;"></i>
        </div>

        <div class="card-body" style="margin-top: -50px;">
          <h5 class="card-title text-truncate">{{$detail->spot->name}}</h5>
          <p class="card-text">Rp {{number_format(300000,0)}} /Jam</p>
          <p class="card-text text-truncate"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$detail->spot->address}}</p>
          
          <p class="card-text">
            @for ($i=0; $i<$detail->spot->rating; $i++)
              <i class="fa fa-star" aria-hidden="true"></i>
            @endfor
          </p>
          <hr class="my-4">
            <ul class="list-inline">
              <li class="list-inline-item"><h5 style="color: green; font-weight: bold;">Buka</h5></li>
              <li class="list-inline-item"><h5>06:00 - 24:00</h5></li>
            </ul>
          <hr class="my-4">
            <h5 style="font-weight: bold;">Deskripsi</h5>
            <p>{{$detail->spot->description}}</p>
          <hr class="my-4">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 ml-1">
        <h5 style="font-weight: bold;">Fasilitas</h5>
        <div class="scrolling-wrapper">
          <ul class="list-inline">
            @for($i=0; $i<10; $i++)
            <li class="list-inline-item">
              <div class="card-body text-center">
                <i class="fa fa-home fa-3x border p-2 mb-2"></i>
                <h5>Home</h5>
              </div>
            </li>
            @endfor
          </ul>
        </div>
        <hr class="my-4">
        <h5 style="font-weight: bold;">Lokasi</h5>
            <div class="card">
              <div class="card-body text-left">
                <div class="row">
                <div class="mr-auto pl-3">
                  <p class="card-text text-truncate"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$detail->spot->address}}</p>
                  <p class="text-saraga">Get Directions</p>
                </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 ml-1">
        <h5 style="font-weight: bold;">Pilih Waktu Booking</h5>
            <div class="card">
              <div class="card-body text-left">
                <div class="row">
                <div class="mr-auto pl-3">
                  <p class="card-text text-truncate"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$detail->spot->address}}</p>
                  <p class="text-saraga">Get Directions</p>
                </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('master_script')
<script type="text/javascript">

  document.getElementById("upload").onchange = function() {
      document.getElementById("fimage").submit();
  };

  $(".datepicker").flatpickr({
      altInput: true,
      altFormat: "j F Y",
      dateFormat: "Y-m-d"
  });
  $(function(){
    $("#upload_profile").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
  });
</script>
@endsection