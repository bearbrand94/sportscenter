@extends('layouts.master')

@section('master_css')
<style type="text/css">
  .modal-dialog {
   position:fixed;
       top:auto;
       right:0;
       left:0;
       bottom:0;
  }  
  .modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
  }
  .modal-header {
    background: white;
  }

  .modal-body {
    min-height: 80%;
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
    border-color: rgb(209,209,209);
    background-color: white;
  }
  .time-button.disabled{
    border-color: rgb(209,209,209);
    background-color: rgb(209,209,209);
  }
  .carousel-indicators .active {
      opacity: 1;
      width: 40px;
  }
  .carousel-item img{
    max-height: 15rem;
  }
  .modal-content .col-3{
    padding-right: 5px;
    padding-left: 5px;
    font-size: 0.5rem;
  }
  .modal-content .col-3 p{
    font-size: 0.6rem;
  }
  .border{
    border-radius: 0.3rem;
  }

</style>
@endsection

@section('body')

<section class="select-court">
  <!-- Top Header -->
  <nav class="navbar navbar-expand shadow-sm sticky-top" style="background-color: white;">
    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <a class="navbar-brand" href="javascript:history.back()">
      <img src="{{ asset('images/back-icon-black.svg') }}" alt="" class="back-icon back-icon-black" title="back">
    </a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-saraga">     
            <b class="text-saraga">
            Pilih Lapangan
            </b>
          <br>
          {{date("D, j M Y", strtotime(app('request')->input('input-date')))}}
         <!--  | 
          {{ app('request')->input('input-time')[0] }}- {{ app('request')->input('input-time')[0] }} -->
        </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container bg-light">
    @foreach($detail->courts as $field)
      @if ($field->status == 1)
      <form method="POST" action="{{ route('booking-confirmation') }}">
        <div class="pb-3 pt-3"> 
          <div class="card">
              @component('img-card', [
                'id' => $field->id,
                'first_image' => $field->cover_image,
                'gallery' => isset($gallery) ? $gallery : []
              ])
              @endcomponent
          <div id="innerelements" class="shadow">
            <img class="icon icon-cat" src="{{ asset('images/sports').'/'.$field->sport.'.svg' }}">
          </div>
            @csrf
            <input type="hidden" name="slug" value="{{$detail->spot->slug}}">
            <input type="hidden" name="court_id" value="{{$field->id}}">
            <input type="hidden" name="input_date" value="{{ app('request')->input('input-date') }}">
            <input type="hidden" name="input_time" value="{{ app('request')->input('input-time') }}">
            <input type="hidden" name="duration" value="{{ app('request')->input('input-duration') }}">
            <div class="card-body">
              <h5 class="card-title text-truncate">{{$field->name}}</h5>
              <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">Lapang Sintetis</span>
              <div class="form-inline">
                <p class="card-text mt-3" style="font-weight: bold; color: orange;">Rp {{number_format($field->price,0)}}</p>
                <p class="card-text ml-2">/Jam</p>
              </div>
              <button type="submit" class="btn btn-block button-saraga">Pilih Lapang</button>
            </div>
          </div>
        </div>
      </form>
      @else
      <div class="pb-3 pt-3" style="opacity: 0.6;"> 
        <div class="card">
          <div id="carouselExampleIndicators{{$field->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators{{$field->id}}" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators{{$field->id}}" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators{{$field->id}}" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{$detail->spot->cover_image}}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://picsum.photos/id/1/1920/1080" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://picsum.photos/id/2/1920/1080" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators{{$field->id}}" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators{{$field->id}}" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div id="innerelements" class="shadow">
            <img class="icon icon-cat" src="{{ asset('images/sports').'/'.$field->sport.'.svg' }}">
          </div>
          <div class="card-body">
              <h5 class="card-title text-truncate">{{$field->name}}</h5>
              <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">Lapang Sintetis</span>
              <div class="form-inline">
                <p class="card-text mt-3" style="font-weight: bold; color: orange;">Rp {{number_format($field->price,0)}}</p>
                <p class="card-text ml-2">/Jam</p>
              </div>
              <p class="card-text" style="color: red; font-weight: bold; font-style: italic;">*Tidak tersedia diwaktu ini </p>
              <a href="#" data-toggle="modal" data-target="#time-modal-{{$field->id}}">Lihat waktu tersedia</a>
          </div>
        </div>
      </div>
      @endif
    @endforeach
  </div>

  @foreach($detail->courts as $field)
    <!-- The Modal -->
    <div class="modal" id="time-modal-{{$field->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Top Header -->
          <nav class="navbar navbar-expand shadow-sm" style="background-color: white;">
            <a class="navbar-brand" href="#" data-dismiss="modal">
              <img class="close-icon" src="{{ asset('images/close-icon.svg') }}" alt="" title="close">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link text-saraga">     
                    <b class="text-saraga">
                    Waktu Tersedia {{$field->name}}
                    </b>
                </a>
                </li>
              </ul>
            </div>
          </nav>
          <div class="container bg-light">
              <div class="row">
              @foreach($detail->timeslots as $ts)
                <div class="text-center col-3 pt-2 pb-2">
                  <?php 
                    $flag = false;
                    foreach ($field->timeslots as $timeslot) {
                      if($timeslot->time_slot == $ts->time_slot && $timeslot->available == 1){
                        $flag = true;
                      }
                    }
                  ?>

                  @if($flag == true)
                  <div class="border pt-3 time-button">
                  @else    
                  <div class="border pt-3 time-button disabled">
                  @endif
                    <p>{{$ts->time_slot}}</p>
                  </div>
                </div>
              @endforeach
              </div>
          </div>
          <div class="row col-12 pl-4">
              <div class="form-inline">
                <div class="time-button disabled" style="height:25px; width: 25px; border-radius: 0.4rem"></div>
                <p class="pt-3 ml-2">Tidak Tersedia</p>
              </div>
              <div class="form-inline ml-4">
                <div class="border" style="height:25px; width: 25px; border-radius: 0.4rem;"></div>
                <p class="pt-3 ml-2">Tersedia</p>
              </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</section>