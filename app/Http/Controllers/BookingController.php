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
    public function index(Request $request){
        return view('classimax.booking-list');
    }

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
        session([
            'booking_data'=>json_encode([
                'spot'  => $spot,
                'court' => $court,
                'input' => $request->all()
            ])
        ]);

        $transaction = new class{};
        $transaction->order_id = "BASIC-".str_random(5);
        $transaction->gross_amount = $court->price*$request->duration;

        $customer=new class{};
        $auth_user = session('auth_data');
        $customer->first_name = $auth_user->name;
        $customer->email = $auth_user->email;
        $customer->phone = $auth_user->telephone;

        $client = new Client();
        $snapres = $client->request('POST', config('app.snap_url')."/v1/transactions", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization'   => 'Basic '.base64_encode(config('app.server_key'))
            ],
            'json' => [
                'transaction_details' => $transaction,
                'customer_details' => $customer
            ]
        ]);

        return view('classimax.booking-confirmation')->with('spot', $spot)->with('court', $court)->with('input', $request->all())->with('snapres', json_decode($snapres->getBody()));  
    }

    public function create(Request $request){

        
        $booking_data = json_decode(session('booking_data'));
        // return json_encode($booking_data->input);
        $transaction = new class{};
        $transaction->order_id = "BASIC-".str_random(5);
        $transaction->gross_amount = $booking_data->court->price*$booking_data->input->duration;

        $customer=new class{};
        $customer->first_name = $auth_user->name;
        $customer->email = $auth_user->email;
        $customer->phone = $auth_user->telephone;

        $client = new Client();
        $res = $client->request('POST', config('app.snap_url')."/v1/transactions", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization'   => 'Basic '.base64_encode(config('app.server_key'))
            ],
            'json' => [
                'transaction_details' => $transaction,
                'customer_details' => $customer
            ]
        ]);
        return $res->getBody();
        return redirect(json_decode($res->getBody())->redirect_url);
        // return ;
    }
}
