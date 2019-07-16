@extends('layouts.master')

@section('master_css')
<style type="text/css">
  .modal {
     position:fixed;
     top:auto;
     right:auto;
     left:auto;
     bottom:0;
  }

  .modal-dialog {
     position:fixed;
     top:auto;
     right:auto;
     left:auto;
     bottom:0;
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
  @media (max-width: 992px) {
     .container {
        width: 100%;
     }
  }
</style>
@endsection

@section('body')
<section>
  <!-- The Modal -->
  <div class="modal" id="time-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Top Header -->
        <nav class="navbar navbar-expand shadow-sm" style="background-color: white;">
          <a class="navbar-brand" href="#" data-dismiss="modal">
            <i class="fa fa-close fa-lg text-saraga"></i>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link text-saraga">     
                  <b class="text-saraga" style="font-size: 20px;">
                  Waktu Tersedia
                  </b>
              </a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container bg-light">
          <div class="col-12">
            <div class="row">
            @for($i=0; $i<16; $i++)
              <div class="text-center col-3 pt-2 pb-2">
                @if ($i<14)
                <div class="border pt-3 time-button" style="border-radius: 0.4rem;">
                @else
                <div class="border pt-3 time-button disabled" style="border-radius: 0.4rem;">
                @endif
                  <p style="font-size: 1rem; font-weight: bold;">{{$i+8}}:00</p>
                </div>
              </div>
            @endfor
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="col-12 form-inline">
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
  </div>

  <!-- Top Header -->
  <nav class="navbar navbar-expand shadow-sm sticky-top" style="background-color: white;">
    <a class="navbar-brand" href="javascript:history.back()">
      <i class="fa fa-arrow-left fa-lg text-saraga"></i>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-saraga">     
            <b class="text-saraga" style="font-size: 20px;">
            Pilih Lapangan
            </b>
        </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container bg-light">
    @foreach($detail->courts as $field)
      <div class="pb-3 pt-3"> 
        <div class="card">
          <img class="card-img-top" src="{{$detail->spot->cover_image}}" alt="Card image cap" style="max-height: 35rem">
          <div class="card-body">
            <h5 class="card-title text-truncate">{{$field->name}}</h5>
            <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">Lapang Sintetis</span>
            <div class="form-inline">
              <p class="card-text mt-3" style="font-weight: bold; color: orange;">Rp {{number_format(300000,0)}}</p>
              <p class="card-text ml-2">/Jam</p>
            </div>
            <button type="button" class="btn btn-block button-saraga" onclick="select_field({{$field->id}})" data-dismiss="modal">Pilih Lapang</button>
          </div>
        </div>
      </div>
    @endforeach
    @foreach($detail->courts as $field)
      <div class="pb-3 pt-3"> 
        <div class="card">
          <div class="card-body">
            <div style="opacity: 0.6;">
              <img class="card-img-top" src="{{$detail->spot->cover_image}}" alt="Card image cap" style="max-height: 35rem">
              <h5 class="card-title text-truncate">{{$field->name}}</h5>
              <span class="badge badge-pill badge-success p-2" style="background-color: rgb(233, 255, 236); border: 1px solid green; color: black;">Lapang Sintetis</span>
              <div class="form-inline">
                <p class="card-text mt-3" style="font-weight: bold; color: orange;">Rp {{number_format(300000,0)}}</p>
                <p class="card-text ml-2">/Jam</p>
              </div>
            </div>
            <p class="card-text" style="color: red; font-weight: bold; font-style: italic;">*Tidak tersedia diwaktu ini </p>
            <a href="#" data-toggle="modal" data-target="#time-modal">Lihat waktu tersedia</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>