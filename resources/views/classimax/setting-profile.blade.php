@extends('layouts.master')



@section('body')
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
                  <a href="#">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>No. Telepon</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                <div class="widget-header">
                  <a href="#">
                    <div class="d-flex">
                      <div class="d-flex mr-auto align-items-center">
                        <h4>Email</h4>
                      </div>
                      <div class="d-flex ml-auto align-items-center"><span><i class="fa fa-angle-right fa-2x text-saraga" aria-hidden="true"></i></span></div>
                    </div>
                  </a>
                </div>
                  <a href="#">
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
@endsection