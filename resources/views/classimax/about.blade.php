@extends('layouts.master')
@section('master_css')
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
    .navbar{
        border-bottom: 1px solid #d8d8d8 !important;
    }
    .about-content{
        margin-top: 25px;
    }
</style>
@endsection
@section('body')
<nav class="navbar navbar-expand shadow-sm container sticky-top bg-white">
  <a class="navbar-brand" href="javascript:history.back()">
    <img class="close-icon" src="{{ asset('images/close-icon.svg') }}" alt="" title="close">
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto p-2">
      <li class="nav-item active">    
          <b class="text-saraga modal-title">
          Tentang Saraga
          </b>
      </li>
    </ul>
  </div>
</nav>
<section class="setting-profile pb-4 mb-4">
    <div class="container">
        <div class="text-center">
          <img src="{{asset('/images/saraga.png')}}" class="img-responsive rounded mt-3" alt="No Image" style=" max-width: 40%; height: auto;">
          <p>Version 0.0.1</p>
        </div>
        <div class="about-content" class="mt-4 pt-4">
            <h3 class="font-weight-bold">Introduction</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
                fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
                euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
            <h3 class="font-weight-bold">How we can help</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
                fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
                euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero.
                Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est
                justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum
                tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
        </div>
    </div>
</section>

@endsection