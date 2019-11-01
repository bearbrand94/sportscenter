@extends('layouts.app')

@section('css')
<style type="text/css">
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

	.card p{
	  white-space: initial;
	  overflow: hidden;
	}

	.bg-button {
	  border-radius: 0.5rem; 
	  background-size: cover;
	  background-repeat: no-repeat;
	  color: white;
	}
</style>
@endsection

@section('content')
<nav class="navbar navbar-expand shadow-sm background-saraga sticky-top">
  <div class="container collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" style="color: white" href="javascript:history.back()">  
            <i class="fa fa-arrow-left fa-2x" style="color: white; font-size: 20px;"></i>
        	<b class="ml-3" style="font-size: 20px;">
			    Detail Promo
        	</b>
  		</a>
      </li>
  	</ul>
  </div>
</nav>

<section class="border-top-1 bg-light">
    <div class="container" style="background-color: white;">
	    <div class="row">
        	<img class="card-img-top img-fluid" src="{{$detail->image->path}}" alt="Card image cap" style="max-height: 25rem; padding-right: 0px; padding-left: 0px;">
          	<div id="innerelements" class="shadow">
            	<a style="cursor: hand">
              		<i class="fav-button fa fa-share-alt fa-2x text-saraga" value="true" aria-hidden="true" style="font-size: 1.75rem;" onclick="link_copy()"></i>
            	</a>
          	</div>
        </div>
    	<div class="row col-12 pb-4">
	    	{{$detail->description}}
	    </div>
    </div>
    <div class="container mt-4" style="background-color: white;">
    	<div class="row p-2">
	    	<div class="col-5 d-inline-block">
	    		<div class="text-muted mb-1">Periode Promo</div>
	    		<div style="font-weight: bold">
        			{{ date("j M Y", strtotime($detail->created_at)) }}
        		</div>
	    	</div>
	    	<div class="col-4 d-inline-block">
	    		<div class="text-muted mb-1">Kode Promo</div>
	    		<div style="font-weight: bold">
        			{{ $detail->code }}
        		</div>
	    	</div>
	    	<div class="col-3 d-inline-block align-self-center">
			    <button class="button bg-button p-2 pull-right" style="background-color: white; border: 1px solid orange; color: rgb(235, 130, 0);" onclick="code_copy('{{$detail->code}}')">Salin Kode</button>
	    	</div>
	    </div>
    </div>

    <div class="container mt-4 pb-4" style="background-color: white;">
    	<div class="row p-2">
    		<div class="col-12 pb-4">
	    		<h4 class="pt-2 pb-1">Syarat Dan Ketentuan</h4>
	    		<hr>
	            <p>Please read the following carefully to understand how we will collect and use your personal data in relation to the Service. If you do not understand this policy, or do not accept any part of it, then you should not use the Service. The Service may include and link to features and services (such as social applications like Facebook Messenger, WhatsApp and iMessenger) that are provided by a third party. If you use these features and services, please understand that the third parties that operate them may collect information from you which will be used in accordance with their own privacy policy and terms of use, which may differ from ours. </p>
	            <p>We do not accept any responsibility or liability for these policies or for any personal data that may be collected through these websites or services. You should always read the privacy policy of any feature or service you access carefully in order to understand the specific privacy and information usage practices. Information we may collect from you and how we use it. </p>
	            <h5 class="py-3">We may collect and process the following data about you via the Service: </h5>
	            <p><span class="font-weight-bold text-dark">• Personal Information you provide to us:</span> We receive and store any information that you enter on the Service or provide to us in any other way, for example, when you download the Service, set up a profile within the Service, or access, upload or download material to or from the Service, including when that material is accessed on a third party platform, service or social network (such as Facebook), that social network or third-party may provide us with the information you agreed the social network or other third party platform could provide to as through the social networks€TMs or third party platforma€TMs Application Programming Interface (API) based on your settings on the third party social network or platform. The types of personal information collected may include your email address, profile picture, username and password. We use this information to validate you as a user when using the Service, to provide the Service to you, including administration of your user account, to notify you of changes to the Service or about any changes to our terms and conditions or this privacy policy, to manage our business, including financial reporting, for the development of new products and services, to send you newsletters to market and advertise our products and services by email, to comply with applicable laws, court orders and government enforcement agency requests, for research and analytics purposes including to improve the quality of the Service and to ensure that the Service is presented in the most effective manner for you and your device. Details of Correspondence: If you contact us, we may keep a record of that correspondence. We will not retain a record of that correspondence for longer than is reasonably necessary. </p>
	            <p><span class="font-weight-bold text-dark">• Personal Information that we automatically collect:</span> When you use the Service, we automatically collect information about the device you use to access it and your usage of the Service. The information we collect may include (where available) the type and model of device you use, the device's unique device identifier, operating system, browser type, language options, current time zone and mobile network information to allow you to use the Service, for system administration purposes and to report aggregated, anonymised information to our business partners. If you do not wish for as to provide aggregated, anonymised information to our trusted business partners, please find out how to opt out of our use of analytics cookies in the cookies section below. We use this information to administer the Service and for our internal operations including troubleshooting, data analysis, testing, research, statistical and survey purposes, to improve the Service, how it is presented and its safety and security. Please note that the Service requires access to your devices€TMs photograph storage application in order to store the completed videos, but we do not take any information, videos, photos or other content from your devices photograph storage application. </p>
	            <p><span class="font-weight-bold text-dark">• Log information:</span> When you use the Service, we may automatically collect and store the following information in server logs: Internet protocol (IP) addresses, Internet service provider (ISP), clickstream data, browser type and language, viewed and exit pages and date or time stamps. We use this information to communicate with the Service and to better understand our users' operating systems, for system administration and to audit the use of the Service. We do not use this data to identify the name, address or other personal details of any individual. </p>
	    	</div>
	    </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
	function code_copy(code){
	    var input = document.createElement('input');
	    input.setAttribute('value', code);
	    document.body.appendChild(input);
	    input.select();
	    var result = document.execCommand('copy');
	    document.body.removeChild(input);
		tempAlert("Code Copied!",1000);
	    return result;
	}
</script>	
@endsection