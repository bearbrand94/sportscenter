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
            <div class="widget personal-info" style="width: 100%" id="spots_list">
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
            <div class="widget personal-info" style="width: 100%" id="location_list">
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
    var doneTypingInterval = 500;  //time in ms, 5 second for example

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
    var spots_result = [
      {
        name: "Futsal Tubagus 45",
        address: "Jl. Tubagus 46",
        category: "futsal"
      },
      {
        name: "Badminton Juara",
        address: "Jl. Juara 46",
        category: "badminton"
      },
      {
        name: "Futsal Tubagus 45",
        address: "Jl. Tubagus 46",
        category: "badminton"
      },
    ]

    var locations_result = [
      {
        name: "Surabaya",
        address: "Jawa Timur, Indonesia",
        category: "city"
      },
      {
        name: "Sidoarjo",
        address: "Jawa Timur, Indonesia",
        category: "city"
      },
      {
        name: "DKI Jakarta",
        address: "Jakarta, Indonesia",
        category: "city"
      },
      {
        name: "Bandung",
        address: "Jawa Barat, Indonesia",
        category: "city"
      },
    ]

    // Fill spots list
    var spots_html = "";
    for (var i = 0; i < spots_result.length-1; i++) {
      spots_html += create_widget( spots_result[i].name, spots_result[i].address, spots_result[i].category )
    }
    i = spots_result.length-1;
    spots_html += create_list( spots_result[i].name, spots_result[i].address, spots_result[i].category );
    $("#spots_list").html(spots_html);

    // Fill city list
    var location_html = "";
    for (var i = 0; i < locations_result.length-1; i++) {
      location_html += create_widget( locations_result[i].name, locations_result[i].address, locations_result[i].category )
    }
    i = locations_result.length-1;
    location_html += create_list( locations_result[i].name, locations_result[i].address, locations_result[i].category );
    $("#location_list").html(location_html);
  }

  function create_widget(title, address, icon="badminton", link="#"){
    var html = "<div class='widget-header'>";
    html += create_list(title, address, icon, link)
    html += "</div>";
    return html;
  }

  function create_list(title, address, icon="badminton", link="#"){
    var html = "<a href='" + link + "'>";
    html += "<div class='d-flex'>";
    html +=   "<div class='d-flex align-items-center'>";
    html +=     "<span><img class='icon' src='{{ asset('images/sports') }}/" + icon + ".svg' height='30px' width='30px'></img></span>";
    html +=   "</div>";
    html +=   "<div class='pl-3'>";
    html +=     "<p class='lead' style='color: black; font-weight: bold; margin-bottom: 0px; font-size: 1rem;'>" + title + "</p>";
    html +=     "<p class='text-muted'>" + address + "</p>";;
    html +=   "</div>";
    html += "</div></a>";
    return html
  }
</script>