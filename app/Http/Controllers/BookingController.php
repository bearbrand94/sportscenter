<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Support\Facades\Auth;
use Validator;

class BookingController extends Controller
{
    public function confirmation(Request $request){
    	// return $request->all();
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);

        return view('classimax.booking-confirmation')->with('detail', json_decode($res->getBody())->data)->with('input', $request->all());  
    }
}
