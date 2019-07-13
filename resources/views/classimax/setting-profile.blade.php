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
<div class="modal" id="phone_modal">
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
              No. Telepon
              </b>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Modal body -->
    <form method="POST" action="{{ route('update-phone') }}">
      @csrf
      <div class="modal-body">
        <div class="form-row pt-3">
          <div class="form-group col-md-12">
            <label class="has-float-label">
              <input disabled type="text" class="form-control" name="old_phone" value="{{session('auth_data')->telephone}}">
              <span>No. Telepon Sekarang</span>
            </label>
            <p class="lead pb-2">Masukkan No. Telepon Baru</p>
            <label class="has-float-label">
              <input type="text" class="form-control" name="new_phone">
              <span>No. Telepon Baru</span>
            </label>
            @if ($errors->has('telephone'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </div>
            @endif
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-block button-saraga">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal" id="email_modal">
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
              Email
              </b>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Modal body -->
    <form method="POST" action="{{ route('update-email') }}">
      @csrf
      <div class="modal-body">
        <div class="form-row pt-3">
          <div class="form-group col-md-12">
            <label class="has-float-label">
              <input disabled type="text" class="form-control" name="old_email" value="{{session('auth_data')->email}}">
              <span>Email Sekarang</span>
            </label>
            <p class="lead pb-2">Masukkan Email Baru</p>
            <label class="has-float-label">
              <input type="text" class="form-control" name="new_email">
              <span>Email Baru</span>
            </label>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-block button-saraga">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal" id="password_modal">
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
              Email
              </b>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Modal body -->
    <form method="POST" action="{{ route('change-password') }}">
      @csrf
      <div class="modal-body">
        <div class="form-row pt-3">
          <div class="form-group col-md-12">
            <label class="has-float-label">
              <input type="password" class="form-control" name="current_password">
              <span>Password Sekarang</span>
            </label>
            @if ($errors->has('current_password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('current_password') }}</strong>
                </div>
            @endif
            @if ($errors->has('credentials'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('credentials') }}</strong>
                </div>
            @endif
            <p class="lead pb-2">Masukkan Password Baru</p>
            <label class="has-float-label">
              <input type="password" class="form-control" name="new_password">
              <span>Password Baru</span>
            </label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Masukkan sekali lagi">
            @if ($errors->has('new_password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('new_password') }}</strong>
                </div>
            @endif
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-block button-saraga">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<nav class="navbar shadow-sm p-3 background-saraga">
  <a class="navbar-brand" href="{{ route('profile')}}" style="color: white;">
    <i class="fa fa-arrow-left fa-lg" style="padding-right: 30px;"></i>Edit Profile
  </a>
</nav>
<section>
    <div class="container">
    <div class="row bg-light h-100">
      <div class="card col-12">
        <div class="card-body">
          <!-- Panel Edit -->
          <div class="row pt-2">
            <div class="col-12">
              <div class="widget personal-info shadow-sm">
                <div class="widget-header">
                  <a href="#" data-toggle="modal" data-target="#phone_modal">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>No. Telepon</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                <div class="widget-header">
                  <a href="#" data-toggle="modal" data-target="#email_modal">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Email</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                  <a href="#" data-toggle="modal" data-target="#password_modal">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Password</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
              </div>
            </div>
          </div>
          <!-- Panel Setting -->
          <div class="row pt-2">
            <div class="col-12">
              <div class="widget personal-info shadow-sm">
                <div class="widget-header">
                  <a href="#">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Tentang Saraga</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                <div class="widget-header">
                  <a href="#">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Syarat & Ketentuan</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                  <a href="#">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Kebijakan Privasi</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
              </div>
            </div>
          </div>
    </div>
</section>
@endsection

@section('master_script')
<script type="text/javascript">
  @if ($errors->has('telephone'))
    $('#phone_modal').modal('show');
  @endif
  @if ($errors->has('email'))
    $('#email_modal').modal('show');
  @endif
  @if ($errors->has('credentials'))
    $('#password_modal').modal('show');
  @endif
  @if ($errors->has('current_password'))
    $('#password_modal').modal('show');
  @endif
  @if ($errors->has('new_password'))
    $('#password_modal').modal('show');
  @endif
</script>

@endsection