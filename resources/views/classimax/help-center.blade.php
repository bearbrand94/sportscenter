@extends('layouts.app')
@section('css')
<style type="text/css">
    h4{
        color: #666666;
        font-size: 1rem;
    }
    h3{
        font-size: 1rem;
    }
    .btn-block{
        border-radius: 0.3rem;
        padding-top: 9;
        padding-bottom: 9;
        margin-bottom: 5px;
        margin-top: 5px;
        font-size: 0.9rem;
        text-align: left;
    }
    .icon{
        margin-right: 15px;
        width: 22px;
        height: 22px;
    }
    .btn-google{
        border: 1px solid #f14336;
    }
    .btn-whatsapp{
        border: 1px solid #2cb742;
    }
    .navbar{
        border-bottom: 1px solid #d8d8d8 !important;
    }
    p{
        line-height: 30px;
    }
</style>
@endsection
@section('content')
<nav class="navbar navbar-expand shadow-sm container sticky-top bg-white">
  <a class="navbar-brand" href="javascript:history.back()">
    <img class="back-icon back-icon-black" src="{{ asset('images/back-icon-black.svg') }}" alt="" title="back">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto p-2">
      <li class="nav-item active">    
          <b class="text-saraga modal-title">
          Bantuan
          </b>
      </li>
    </ul>
  </div>
</nav>
<section class="setting-profile pb-4 mb-4">
    <div class="container bg-white pt-4">
            <div class="help-content">
                @if(isset(session('auth_data')->name))
                <h4 class="mt-2">Hallo, {{session('auth_data')->name}}</h4>
                @endif
                <h3 class="mb-2">Ada yang bisa kami bantu ?</h3>
                <p class="mt-3">Tidak perlu segan untuk menghubungi kami setiap kamu menemukan kesulitan saat menggunakan aplikasi Saraga ini, Kami akan siap membantu kamu dan menemukan jalan keluar.</p>
                <hr>
                <h3>Cara Booking</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
                    fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
                    euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero.
                    Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est
                    justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum
                    tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
                <hr>
                <h3>Kamu bisa hubungi kami melalui :</h3>
                <button class="btn btn-block btn-google"><img src="{{ asset('images/gmail.svg') }}" class="icon" title="gmail">help@saraga.com</button>
                <button class="btn btn-block btn-whatsapp"><img src="{{ asset('images/whatsapp.svg') }}" class="icon" title="gmail">089512345612</button>
            </div>
    </div>
</section>
@component('classimax.footer')
@endcomponent
@endsection
