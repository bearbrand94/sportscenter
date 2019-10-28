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
    cursor:hand;
  }
  .time-button{
    cursor:hand;
  }
  .time-button.disabled{
    border-color: rgb(209,209,209);
    background-color: rgb(209,209,209);
  }

  .date-button:hover, {
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
<body>
<section>
  <div class="container bg-muted">
    <div class="row">
      <div class="card border-0 rounded-0">
        <img class="card-img-top" src="{{$detail->spot->cover_image}}" alt="Card image cap" style="max-height: 35rem">
        <div class="card-img-overlay">
          <a href="javascript:history.back()">
            <i class="fa fa-arrow-left fa-2x" style="color: white;"></i>
          </a>
          <a onclick="link_copy()">
            <i class="fa fa-share-alt fa-2x pull-right" style="color: white;"></i>
          </a>
        </div>
        
        <div id="innerelements" class="shadow">
          <a style="cursor: hand">
            @if (isset($detail->spot->is_favorite))
              @if ($detail->spot->is_favorite == true)
              <i class="fav-button fa fa-heart fa-2x" id="{{$detail->spot->id}}" value="true" aria-hidden="true" style="color: rgb(226,42,42); font-size: 1.75rem;"></i>
              @else
              <i class="fav-button fa fa-heart-o fa-2x" id="{{$detail->spot->id}}" value="false" aria-hidden="true" style="color: rgb(226,42,42); font-size: 1.75rem;"></i>
              @endif
            @else
            <i class="fav-button fa fa-heart-o fa-2x" id="{{$detail->spot->id}}" value="true" aria-hidden="true" style="color: rgb(226,42,42); font-size: 1.75rem;"></i>
            @endif
          </a>
        </div>
        
        <div class="card-body" style="margin-top: -50px;">
          <h5 class="card-title text-truncate">{{$detail->spot->name}}</h5>
          <p class="card-text">Rp {{number_format($detail->spot->price,0)}} /Jam</p>
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
            @if(isset($detail->facilities))
            @foreach($detail->facilities as $facility)
            <li class="list-inline-item">
              <div class="card-body text-center">
                <img class="icon pb-2" src="{{ asset('images/facilities/'.$facility->icon) }}" height="60px" width="60px">
                <p>{{$facility->name}}</p>
              </div>
            </li>
            @endforeach
            @endif
          </ul>
        </div>
        <hr class="my-4">
        <h5 style="font-weight: bold;">Lokasi</h5>
            <div class="card">
              <div class="card-body text-left">
                <div class="row">
                <div class="mr-auto pl-3">
                  <p class=""><i class="fa fa-map-marker" aria-hidden="true"></i>{{$detail->spot->address}}</p>
                  <a href="{{$detail->spot->gmaps_url}}" target="_blank">Get Directions</a>
                </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 ml-1">
        <h5 style="font-weight: bold;">Pilih Waktu Booking</h5>
        <div class="alert alert-warning" id="input-date-error" hidden>
            <strong>Pilih tanggal booking terlebih dahulu.</strong>
        </div>

        <div class="row">
          @for($i=0; $i<3; $i++)
            <div class="text-center col-3 col-sm-2 p-2">
              <div class="form-control pt-2 date-button" style="height: 4rem;" value='{{date("Y-m-d", time() + (86400*$i))}}'>
                <p style="font-size: 0.8rem; font-weight: bold;">
                  {{date("D", time() + (86400*$i))}}
                  <br>
                  {{date("d M", time() + (86400*$i))}}
                </p>
              </div>
            </div>
          @endfor
          @for($i=3; $i<5; $i++)
            <div class="text-center d-none d-sm-block col-sm-2 p-2">
              <div class="form-control pt-2 date-button" style="height: 4rem;" value='{{date("Y-m-d", time() + (86400*$i))}}'>
                <p style="font-size: 0.8rem; font-weight: bold;">
                  {{date("D", time() + (86400*$i))}}
                  <br>
                  {{date("d M", time() + (86400*$i))}}
                </p>
              </div>
            </div>
          @endfor
          <div class="text-center col-3 col-sm-2 p-2 flatpickr">
            <div class="form-control pt-2 date-button" id="button-date-booking" style="height: 4rem;">
              <i class="fa fa-calendar fa-3x" aria-hidden="true" style="font-size: 2.5rem;"></i>
            </div>
          </div>
        </div>
      </div>
      <!-- Time button -->
      <div class="col-12 ml-1">
        <!-- {{session('input-date')}} -->
        <div class="alert alert-warning" id="input-time-error" hidden>
            <strong>Pilih waktu yang tersedia.</strong>
        </div>

        <div class="row">
        @for($i=0; $i<16; $i++)
          <div class="text-center col-3 pt-2 pb-2">
            <div class="border pt-3 time-button" id="time-button-{{$i}}" index={{$i}} time="{{$i+8}}" style="border-radius: 0.4rem;">
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
        <h5 class="float-right" style="color: orange;" id="duration">-</h5>
      </div>
    </div>
    <div class="mt-2 mb-4">
      <form method="GET" action="{{ route('select-court', $detail->spot->slug) }}" onsubmit="return checkform()">
        
        <input type="hidden" name="input-date" id="input-date" value="{{session('input-date')}}">
        <input type="hidden" name="input-time" id="input-time" value="">
        <input type="hidden" name="input-duration" id="input-duration" value="">
        @csrf
        <button type="submit" class="btn btn-block button-saraga">Pilih Lapang</button>
      </form>
    </div>
  </div>
</section>
</body>
@endsection

@section('master_script')
<script type="text/javascript">
  var flatpickr = $(".flatpickr").flatpickr({
      altFormat: "Y-m-d",
      dateFormat: "Y-m-d",
      minDate: "today",
      disableMobile: "true",
      onChange : function(selectedDates, dateStr, instance) {
        $("#input-date").val(dateStr);
      }
  });
  var start_index =-1;
  var end_index =-1;

  $('.date-button').click(function () {
    $('.date-button').removeClass('active');
    $('.time-button').removeClass('active');
    $(this).addClass('active');
    $("#input-date").val($(this).attr('value'));

    if($(this).attr('value') == "{{date('Y-m-d')}}"){
      $('.time-button').each(function(i, obj) {
        if({{date("H")}} >= $(obj).attr('time')){
          console.log(obj);
          $(obj).addClass('disabled');
        }
      });
    }
    else{
      $('.time-button').removeClass('disabled');
    }
  });

  $('.time-button').click(function () {
    if(!$(this).hasClass("disabled")){
      $('.time-button').removeClass('active');
      if(start_index == -1){
        start_index = parseInt($(this).attr('index'));
        $(this).addClass('active');
        $("#input-time").val($(this).attr('time'));
      }
      else{
        end_index = parseInt($(this).attr('index'));
        if(end_index > start_index){
          for (var i = start_index; i <= end_index; i++) {
            var id_name = "#time-button-" + i;
            $(id_name).addClass('active');
          }
          $("#duration").html((end_index-start_index) + " Jam");
          $("#input-duration").val((end_index-start_index));
          start_index = -1;
        }
        else{
          start_index = parseInt($(this).attr('index'));
        }
        $(this).addClass('active');
      }
    }
  });

  $('#button-date-booking').click(function () {
    flatpickr.open();
  });

  $(document).ready(function () {
    autofill();
  }); 

  function check_data(){
    var count_index = 0;
    $(".time-button.active").each(function(){
      console.log($(this).attr('index'));
    });
  }

  function select_field(field_id){
    // alert(field_id);
  }

  function autofill(){
    $(".date-button").each(function(){
      if($(this).attr('value') == "{{session('input-date')}}"){
        $(this).click();
      }
    });
  }

  function checkform(){
    if($("#input-date").val() == ""){
      $("#input-date-error").removeAttr( "hidden" );
      return false;
    }
    if($("#input-time").val() == ""){
      $("#input-time-error").removeAttr( "hidden" );
      return false;
    }
    if($("#input-duration").val() == ""){
      $("#input-time-error").removeAttr( "hidden" );
      return false;
    }
    return true;
  }
  function link_copy(){
      var input = document.createElement('input');
      input.setAttribute('value', window.location.href);
      document.body.appendChild(input);
      input.select();
      var result = document.execCommand('copy');
      document.body.removeChild(input);
      tempAlert("Link Copied!",1000);
      return result;
  }
</script>
@endsection