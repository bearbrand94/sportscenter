<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SessionCookieJar;


class RatingController extends Controller
{
    //
    function show(Request $request){
    	return view('classimax.rating')->with('id', $request->id);
    }

    function create(Request $request){
    	if(isset($request->rating)){
	        $jar = session('jar');
	        $client = new Client(['cookies' => $jar]);
	        try {
	            $res = $client->request('POST', config('app.api_url')."/order/rating", [
	                'form_params' => [
	                    'id' => $request->id,
	                    'rating' => $request->rating,
	                ]
	            ]);
	            if($res->getStatusCode() == 200){ // 200 = Success
	                return redirect(route('booking-list'));
	            }
	        } catch (RequestException $e) {
	        	return view('classimax.500');
	            // return $e->getResponse()->getBody()->getContents();
	        }
	    }
    	return redirect(route('booking-list'));
    }
}
