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
.date-button{
  border-color: var(--saraga-color) !important;
}
.date-button:hover, .time-button:hover {
    outline: none !important;
    box-shadow: 0 0 10px #719ECE;
}

.date-button.active, .time-button.active{
    background: var(--saraga-color);
    color: white;
}
.date-button.active>p, .time-button.active>p{
    color: white;
}

@media (max-width: 992px) {
   .container {
      width: 100%;
   }
}
</style>
@endsection

@section('body')

<section>
  <div class="container bg-muted">
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
                <p>Mushola</p>
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
                  <a href="#">Get Directions</a>
                </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 ml-1">
        <h5 style="font-weight: bold;">Pilih Waktu Booking</h5>
        <div class="row">
          @for($i=0; $i<5; $i++)
            <div class="text-center col-2 p-2">
              <div class="form-control pt-2 date-button" style="height: 4rem;">
                <p style="font-size: 0.8rem; font-weight: bold;">Jum<br>12 Jul</p>
              </div>
            </div>
          @endfor
          <div class="text-center col-2 p-2">
            <div class="form-control pt-2 date-button" style="height: 4rem;">
              <i class="fa fa-calendar fa-3x" aria-hidden="true" style="font-size: 2.5rem;"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 ml-1">
        <div class="row">
        @for($i=0; $i<16; $i++)
          <div class="text-center col-3 pt-2 pb-2">
            <div class="border pt-3 time-button" tabindex="2" style="border-radius: 0.4rem;">
              <p style="font-size: 1rem; font-weight: bold;">{{$i+8}}:00</p>
            </div>
          </div>
        @endfor
        </div>
      </div>
    </div>
    <div class="row mt-4 mb-2">
      <div class="col-12 clearfix">
      <h5 class="float-left"><i class="fa fa-clock-o fa-lg" aria-hidden="true" style="font-size: 1.5rem;"></i> Durasi Booking</h5>
      <h5 class="float-right" style="color: orange;" id="duration">2 Jam</h5>
      </div>
    </div>
    <div class="mt-2 mb-4">
      <button type="submit" class="btn btn-block button-saraga">Pilih Lapang</button>
    </div>
  </div>
</section>
@endsection

@section('master_script')
<script type="text/javascript">
  $(document).ready(function () {
      $('.date-button').click(function () {
          $('.date-button').removeClass('active');
          $(this).addClass('active');
      });
      $('.time-button').click(function () {
        $(this).toggleClass( 'active' );
      });

  }); 

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