<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Arr;

class BookingController extends Controller
{
    public function confirmation(Request $request){
    	// return $request->all();
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);

        $data = json_decode($res->getBody())->data;
        $spot = $data->spot;
        $court = Arr::first($data->courts, function ($value, $key) use ($request){
		    return $value->id==$request->court_id;
		});
        return view('classimax.booking-confirmation')->with('spot', $spot)->with('court', $court)->with('input', $request->all());  
    }
}
