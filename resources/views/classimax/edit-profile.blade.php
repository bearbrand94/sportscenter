@extends('layouts.master')

@section('body')
<nav class="navbar shadow-sm p-3 background-saraga">
  <a class="navbar-brand" href="{{ route('profile')}}" style="color: white;">
    <i class="fa fa-arrow-left fa-lg" style="padding-right: 30px;"></i>Edit Profile
  </a>
</nav>
<section class="login py-5 border-top-1">
    <div class="container">
        <form method="POST" action="{{ route('edit-profile') }}">
            <div class="pb-5 text-center">
              <div>
                <img src="{{session('auth_data')->profile_image}}" class="img-responsive rounded-circle" alt="No Image" width=100 height=100>
              </div>
              <div class="mt-2">
                <a href="#" style="font-size: 1.15rem; color: rgb(7, 108, 200);">Ganti Foto Profil</a>
              </div>
              
            </div>
            
            @csrf
            <label class="has-float-label">
              <input class="form-control" type="text" name="name" value="{{session('auth_data')->name}}"/>
              <span style="font-size: 15px;">Nama Lengkap</span>
            </label>
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif

            <label class="has-float-label">
              <input class="form-control" type="date" name="birthdate" value="{{session('auth_data')->birthdate}}"/>
              <span style="font-size: 15px;">Tanggal Lahir</span>
            </label>
            @if ($errors->has('birthdate'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </div>
            @endif

            <label class="has-float-label">
              <input class="form-control" type="text" name="gender" value="{{session('auth_data')->gender}}"/>
              <span style="font-size: 15px;">Gender</span>
            </label>
            @if ($errors->has('gender'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('gender') }}</strong>
                </div>
            @endif

            <label class="has-float-label">
              <textarea class="form-control" type="text" name="address">
                {{session('auth_data')->address}}
              </textarea>
              <span style="font-size: 15px;">Alamat</span>
            </label>
            @if ($errors->has('address'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('address') }}</strong>
                </div>
            @endif
            <button type="submit" class="btn btn-block py-3 px-5 mt-4 font-weight-bold background-saraga">Simpan</button>
        </form>
    </div>
</section>
@endsection

@section('script')
@endsection