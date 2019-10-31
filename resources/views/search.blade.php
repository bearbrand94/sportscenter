<style type="text/css">
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
    position: fixed;
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

  .modal-footer {
       position:fixed;
       top:auto;
       right:0;
       left:0;
       bottom:0;    
  }

  .lead{
    font-size: 1rem;
  }

</style>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <nav class="navbar navbar-expand shadow-sm  background-saraga sticky-top">
        <div class="container">
          <a class="navbar-brand" href="#" data-dismiss="modal">
            <i class="fa fa-arrow-left fa-lg" style="color: white;"></i>
          </a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <input type="text" class="form-control m-1" id="searchInput" placeholder="Cari Lapang Atau Lokasi" id="voucher" style="background-color: white; height: 45px;">
          </div>
        </div>
      </nav>
      <!-- Modal body -->
      <div class="modal-body bg-light" style="overflow-y: auto;">
        <p class="text-muted" style="font-size: 1rem">Lapang Rekomendasi</p>
        <div class="row">
            <div class="widget personal-info" style="width: 100%">
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <a href="#">
                <div class="d-flex">
                  <div class="d-flex align-items-center">
                    <span><img class="icon" src="{{ asset('images/sports/badminton.svg') }}" height="30px" width="30px"></img></span>
                  </div>
                  <div class="pl-3">                      
                    <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px;">Badminton Juara</p>
                    <p class="text-muted">Jl. Badminton Juara</p>
                  </div>
                </div>
              </a>
            </div>
        </div>

        <p class="text-muted" style="font-size: 1rem">Lokasi</p>
        <div class="row">
            <div class="widget personal-info" style="width: 100%">
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="widget-header">
                <a href="#">
                  <div class="d-flex">
                    <div class="d-flex align-items-center">
                      <span><img class="icon" src="{{ asset('images/sports/futsal.svg') }}" height="30px" width="30px"></img></span>
                    </div>
                    <div class="pl-3">                      
                      <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;">Futsal Tubagus 45</p>
                      <p class="text-muted">Jl. Futsal Tubagus 45</p>
                    </div>
                  </div>
                </a>
              </div>
              <a href="#">
                <div class="d-flex">
                  <div class="d-flex align-items-center">
                    <span><img class="icon" src="{{ asset('images/sports/badminton.svg') }}" height="30px" width="30px"></img></span>
                  </div>
                  <div class="pl-3">                      
                    <p class="lead" style="color: black; font-weight: bold; margin-bottom: 0px;">Badminton Juara</p>
                    <p class="text-muted">Jl. Badminton Juara</p>
                  </div>
                </div>
              </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  console.log("search loaded")
  // $(document).ready(function () {
    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 5000;  //time in ms, 5 second for example

    //on keyup, start the countdown
    $('#searchInput').on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $('#searchInput').on('keydown', function () {
      clearTimeout(typingTimer);
    });
  // });

  //user is "finished typing," do something
  function doneTyping () {
    //do something
    console.log("Ajax Request");
  }
</script>