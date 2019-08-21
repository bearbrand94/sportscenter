<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SessionCookieJar;

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
                'spot'        => $spot,
                'court'       => $court,
                'input'       => $request->all(),
            ])
        ]);

        return view('classimax.booking-confirmation')->with('spot', $spot)->with('court', $court)->with('input', $request->all());  
    }

    public function apply_coupon(Request $request){
        $booking_data = json_decode(session('booking_data'));
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('POST', config('app.api_url')."/order/apply", [
                'form_params' => [
                    'court_id'      => $booking_data->court->id,
                    'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date." ".$booking_data->input->input_time.":00:00")),
                    'duration'      => $booking_data->input->duration,
                    'code'          => $request->code,
                ]
            ]);
            $res_data = json_decode($res->getBody())->data;
            if(json_decode($res->getBody())->status_code=="200"){
                return response()->json([
                        'status' => 'true',
                        'data'  => $res_data
                    ]);
            }
            else{
                return response()->json([
                        'status' => 'false',
                        'errors'  => 'Promo Invalid',
                    ]);
            }
        } catch (RequestException $e) {
            return response()->json([
                    'status' => 'false',
                    'errors'  => 'Promo Invalid',
                ]);
        }        
    }

    public function get_snap_url(Request $request){
        $booking_data = json_decode(session('booking_data'));
        // return print_r($booking_data);
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('POST', config('app.api_url')."/order/apply", [
            'form_params' => [
                'court_id'      => $booking_data->court->id,
                'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date." ".$booking_data->input->input_time.":00:00")),
                'duration'      => $booking_data->input->duration,
                'code'          => $request->code ? $request->code : null,
            ]
        ]);
        $res_data = json_decode($res->getBody())->data;

        $transaction = new class{};
        $transaction->order_id = "BASIC-".str_random(8);
        $transaction->gross_amount = $res_data->grand_total;

        $customer        = new class{};
        $auth_user       = session('auth_data');
        $customer->first_name = $auth_user->name;
        $customer->email = $auth_user->email;
        $customer->phone = $auth_user->telephone;

        $expiry             = new class{};
        $expiry->start_time = date("Y-m-d H:i:s O");
        $end_time           = date("Y-m-d H:i:s O", strtotime($booking_data->input->input_date." ".$booking_data->input->input_time.":00:00"));
        $duration           = strtotime ( $end_time ) - strtotime ( $expiry->start_time );
        $expiry->duration   = $duration;
        $expiry->unit       = "second";

        $client = new Client();
        $snapres = $client->request('POST', config('app.snap_url')."/v1/transactions", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization'   => 'Basic '.base64_encode(config('app.server_key'))
            ],
            'json' => [
                'transaction_details' => $transaction,
                'customer_details'    => $customer,
                'expiry'              => $expiry
            ]
        ]);
        return $snapres->getBody();
    }

    public function create(Request $request){
        $booking_data = json_decode(session('booking_data'));
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('POST', config('app.api_url')."/order/create", [
                'form_params' => [
                    'id'            => $booking_data->transaction->order_id,
                    'court_id'      => $booking_data->court->id,
                    'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date." ".$booking_data->input->input_time.":00:00")),
                    'duration'      => $booking_data->input->duration,
                    'token'         => $booking_data->snapres->token,
                    // 'pdf_url'       => $request->data['pdf_url']
                ]
            ]);
            return $res->getBody();
        } catch (RequestException $e) {
            return $e;
        }
    }

    public function show(){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('GET', config('app.api_url')."/order?sort=asc");
        } catch (RequestException $e) {
            // return $e;
            return view('classimax.booking-list')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
        }

        $res_booking = json_decode($res->getBody())->data;
        $booking_list = new Class{};


        foreach ($res_booking as $booking) {
            $duration = strtotime ( $booking->order_date ) - strtotime ('now');
            if($duration < 0){
                $booking_list->past[] = $booking;
            }
            else{
                $booking_list->active[] = $booking;
            }
        }
        return view('classimax.booking-list')->with('booking_list', $booking_list);
    }
}
