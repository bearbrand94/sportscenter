@extends('layouts.app')

@section('css')
<style type="text/css">
  a{
    font-size: 0.8rem;
  }
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

  .time-button{
    cursor:hand;
    border-radius: 0.2rem;
  }
  .time-button.disabled{
    border-color: rgb(209,209,209);
    background-color: rgb(209,209,209);
  }

  .date-button{
    border-color: var(--saraga-color) !important;
    cursor:hand;
    height: 3.5rem;
    padding-top: 10px;
    border-radius: 0.2rem;
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
  .col-3{
    padding-right: 8;
    padding-left: 8;
  }

  @media (max-width: 992px) {
     .container {
        width: 100%;
     }
  }
</style>
@endsection

@section('content')
<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
  <div class="container">
    <a class="navbar-brand" href="javascript:history.back()">
      <img src="{{ asset('images/back-icon.svg') }}" alt="" class="back-icon" title="back">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color: white">     
            <b>
              Lokasi
            </b>
          </a>
        </li>
      </ul>
    </div>
    <a href="#">
      <li class="nav-item form-inline my-2 mr-1">
        <img src="{{ asset('images/share-icon.svg') }}" alt="" width="20" height="20" title="back" onclick="link_copy()">
      </li>
    </a>
  </div>
</nav>

<section class="border-top-1 bg-light">
  <div class="container" style="background-color: white;">
    <div class="row">
      <div class="card border-0 rounded-0">
        <img class="card-img-top" src="{{$detail->spot->cover_image}}" alt="Card image cap" style="max-height: 12rem">
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
              <li class="list-inline-item"><h5>{{$detail->spot->open_at}}- {{$detail->spot->close_at}}</h5></li>
            </ul>
          <hr class="my-4">
            <div class="row justify-content-md-center">
              <div class="col-4">
                <a class="btn btn-lg btn-outline-success button-call" href="tel:{{$detail->spot->telephone}}">
                  <i class="fa fa-phone"></i>&ensp;Call Venue
                </a>
              </div>
            </div>
          <hr class="my-4">
        </div>

      </div>
    </div>

    <!-- Text Fasilitas dan Lokasi -->
    <div class="row">
      <div class="col-12">
        <h5 style="font-weight: bold;">Lokasi</h5>
          <div class="card">
            <div class="card-body text-left">
              <div class="row">
                <div class="mr-auto pl-3">
                  <p class=""><i class="fa fa-map-marker" aria-hidden="true"></i> {{$detail->spot->address}}</p>
                  <a href="{{$detail->spot->gmaps_url}}" target="_blank">Get Directions</a>
                </div>
              </div>
            </div>
          </div>
        <hr class="my-4">
        <h5 style="font-weight: bold;">Fasilitas</h5>
          <div class="scrolling-wrapper">
            <ul class="list-inline">
              @if(isset($detail->facilities))
              @foreach($detail->facilities as $facility)
              <li class="list-inline-item">
                <div class="card-body text-center" style="padding: 0; padding-top: 10px; padding-right: 18px;">
                    <img  class="icon pb-2" 
                          src="{{ asset('images/facilities/'.$facility->icon) }}" 
                          height="40px" 
                          width="40px"
                          style="border:1px solid rgba(0,0,0,.125); padding:5px;">
                    <p>{{$facility->name}}</p>
                </div>
              </li>
              @endforeach
              @endif
            </ul>
          </div>
        <hr class="my-4">
        <h5 style="font-weight: bold;">Deskripsi</h5>
          <p>{{$detail->spot->description}}</p>
      </div>
    </div>

    <!-- Button Pilih Waktu -->
    <div class="row mt-4">
      <div class="col-12">
        <h5 style="font-weight: bold;">Pilih Waktu Booking</h5>
        <div class="alert alert-warning" id="input-date-error" hidden>
            <strong>Pilih tanggal booking terlebih dahulu.</strong>
        </div>

        <div class="row">
          @for($i=0; $i<3; $i++)
            <div class="text-center col-3 col-sm-2 p-2">
              <div class="form-control date-button" value='{{date("Y-m-d", time() + (86400*$i))}}'>
                <p style="font-size: 0.65rem; font-weight: bold;">
                  {{date("D", time() + (86400*$i))}}
                  <br>
                  {{date("d M", time() + (86400*$i))}}
                </p>
              </div>
            </div>
          @endfor
          @for($i=3; $i<5; $i++)
            <div class="text-center d-none d-sm-block col-sm-2 p-2">
              <div class="form-control date-button" value='{{date("Y-m-d", time() + (86400*$i))}}'>
                <p style="font-size: 0.65rem; font-weight: bold;">
                  {{date("D", time() + (86400*$i))}}
                  <br>
                  {{date("d M", time() + (86400*$i))}}
                </p>
              </div>
            </div>
          @endfor
          <div class="text-center col-3 col-sm-2 p-2 flatpickr">
            <div class="form-control pt-2 date-button" id="button-date-booking">
              <i class="fa fa-calendar fa-3x" aria-hidden="true" style="font-size: 1.75rem;"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12" id="input-time-div">
        <!-- {{session('input-date')}} -->
        <div class="alert alert-warning" id="input-time-error" hidden>
            <strong>Pilih waktu yang tersedia.</strong>
        </div>

        <div class="row">
        <?php $i=0 ?>
        @foreach($detail->timeslots as $ts)
          <?php $i++ ?>
          <div class="text-center col-3 pt-1 pb-2">
            <div class="border pt-3 time-button" id="time-button-{{$i}}" index={{$i}} time="{{$ts->start_at}}" ts="{{$ts->time_slot}}" tsid="{{$ts->start_at}}">
              <p style="font-size: 0.6rem; font-weight: bold;">{{$ts->time_slot}}</p>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>

    <!-- Text Durasi Booking -->
    <div class="row mt-4 mb-2">
      <div class="col-12 clearfix">
        <h5 class="float-left"><i class="fa fa-clock-o fa-lg" aria-hidden="true" style="font-size: 1.5rem;"></i> Durasi Booking</h5>
        <h5 class="float-right" style="color: orange;" id="duration">-</h5>
      </div>
    </div>

    <!-- Button Pilih Lapangan -->
    <div class="mt-3 mb-4">
      <form method="GET" action="{{ route('select-court', $detail->spot->slug) }}" onsubmit="return checkform()">
        <input type="hidden" name="input-date" id="input-date" value="{{session('input-date')}}">
        <input type="hidden" name="input-time" id="input-time" value="">
        <input type="hidden" name="input-duration" id="input-duration" value="">
        @csrf
        <button type="submit" class="btn btn-block button-saraga">Pilih Lapang</button>
      </form>
    </div>
    <div class="row mb-5 pb-3"></div>
  </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
  var date_flag=false;
  var flatpickr = $(".flatpickr").flatpickr({
      altFormat: "Y-m-d",
      dateFormat: "Y-m-d",
      minDate: "today",
      maxDate: new Date().fp_incr(14),
      disableMobile: "true",
      onChange : function(selectedDates, dateStr, instance) {
        $("#input-date").val(dateStr);
      },
      onClose: function(selectedDates, dateStr, instance){
        console.log(selectedDates);
        if(typeof dateStr == 'undefined'){
          $('#button-date-booking').removeClass('active');
        }
        else{
          $("#input-date").val(dateStr);
        }
        date_flag=false;
        if(dateStr == "{{date('Y-m-d')}}"){
          $('.time-button').each(function(i, obj) {
            if("{{date('H:i:s')}}" >= $(obj).attr('time')){
              $(obj).removeClass('active')
              $(obj).addClass('disabled');
            }
          });
        }
      }
  });
  var selectedTime = [];

  $('.date-button').click(function () {
    $('.date-button').removeClass('active');
    $(this).addClass('active');
    $("#input-date").val($(this).attr('value'));

    if($(this).attr('value') == "{{date('Y-m-d')}}"){
      $('.time-button').each(function(i, obj) {
        if("{{date('H:i:s')}}" >= $(obj).attr('time')){
          $(obj).removeClass('active')
          $(obj).addClass('disabled');
        }
      });
    }
    else{
      $('.time-button').removeClass('disabled');
    }
    fill_duration();
  });

  $('.time-button').click(function () {
    if(!$(this).hasClass("disabled")){
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
      }
      else{
        $(this).addClass("active");
      }
      fill_duration();
      // $('.time-button').removeClass('active');
      // if(start_index == -1){
      //   start_index = parseInt($(this).attr('index'));
      //   $(this).addClass('active');
      //   $("#input-time").val($(this).attr('time'));
      // }
      // else{
      //   end_index = parseInt($(this).attr('index'));
      //   if(end_index > start_index){
      //     for (var i = start_index; i <= end_index; i++) {
      //       var id_name = "#time-button-" + i;
      //       $(id_name).addClass('active');
      //     }
      //     $("#duration").html((end_index-start_index) + " Jam");
      //     $("#input-duration").val((end_index-start_index));
      //     start_index = -1;
      //   }
      //   else{
      //     start_index = parseInt($(this).attr('index'));
      //   }
      //   $(this).addClass('active');
      // }
    }
  });


  $('#button-date-booking').click(function () {
    if(date_flag==false){
      flatpickr.open();
      date_flag=true;
    }
    else{
      flatpickr.close();
      date_flag=false;
    }
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

  function fill_duration(){
      var duration = 0;
      $('.time-button').each(function(i, obj) {
        if ($(obj).hasClass("active")) {
          duration++;
        }
      });

      $("#duration").html(duration + " Jam");
      $("#input-duration").val((duration));
  }

  function autofill(){
    $(".date-button").each(function(){
      if($(this).attr('value') == "{{session('input-date')}}"){
        $(this).click();
      }
    });
  }

  function checkform(){
    selectedTime = [];
    $('.time-button').each(function(i, obj) {
      if($(obj).hasClass('active')){
        selectedTime.push($(obj).attr('ts'));
      }
    });
    $("#input-time").val(JSON.stringify(selectedTime));
    // console.log($("#input-time").val());
    if($("#input-date").val() == ""){
      $("#input-date-error").removeAttr( "hidden" );
      return false;
    }
    if(selectedTime.length == 0){
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
      tempAlert("Link Tersalin!",1000);
      return result;
  }
</script>
@endsection