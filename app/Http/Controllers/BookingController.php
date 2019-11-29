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

        $input_time = json_decode($request->input_time);
        $input_time_ids = [];

        // Get selected timeslot ids from selected court for API requirements.
        foreach ($court->timeslots as $key => $ts) {
            foreach ($input_time as $key => $input) {
                if($ts->time_slot == $input){
                    $input_time_ids[] = $ts->id;
                }
            }
        };

        // Create order details object for API request.
        $order_detail = new \stdClass();
        $order_detail->court_id = $court->id;
        $order_detail->court_timeslot_ids = $input_time_ids;

        session([
            'booking_data'=>json_encode([
                'spot'        => $spot,
                'court'       => $court,
                'input'       => $request->all(),
                'order_detail' => $order_detail
            ])
        ]);

        return view('classimax.booking-confirmation')->with('spot', $spot)->with('court', $court)->with('input', $request->all())->with('time', $input_time);  
    }

    public function apply_coupon(Request $request){
        $booking_data = json_decode(session('booking_data'));


        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);

        try {
            $res = $client->request('POST', config('app.api_url')."/order/apply", [
                'form_params' => [
                    'id'      => $booking_data->court->id,
                    'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date)),
                    'order_details' => json_encode([$booking_data->order_detail]),
                    'code'          => $request->code ? $request->code : null,
                ]
            ]);
            $res_data = json_decode($res->getBody())->data;

            if(json_decode($res->getBody())->status_code=="200" && $request->code != ""){
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
        $order_id = "BASIC-".str_random(8);
        $booking_data = json_decode(session('booking_data'));
        // return response()->json($booking_data->input->input_time[0]);
        // return response()->json($booking_data);
        // return print_r($booking_data);
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $discount = 0;
        try{
            $res = $client->request('POST', config('app.api_url')."/order/apply", [
                'form_params' => [
                        'id'      => $booking_data->court->id,
                        'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date)),
                        'order_details' => json_encode([$booking_data->order_detail]),
                        'code'          => $request->code ? $request->code : null,
                ]
            ]);
            $res_data = json_decode($res->getBody())->data;
            $discount = $res_data->discount;
        } catch (RequestException $e) {
            $discount = 0;
        }    
        $gross_amount = $booking_data->court->price * $booking_data->input->duration - $discount;
        // return response()->json($gross_amount);
        $input_time = json_decode($request->input_time);


        $transaction = new class{};
        $transaction->order_id = $order_id;
        $transaction->gross_amount = $gross_amount;

        $customer        = new class{};
        $auth_user       = session('auth_data');
        $customer->first_name = $auth_user->name;
        $customer->email = $auth_user->email;
        $customer->phone = $auth_user->telephone;

        $expiry             = new class{};
        $expiry->start_time = date("Y-m-d H:i:s O");
        $expiry->start_time = date("Y-m-d H:i:s O");
        // $end_time           = date("Y-m-d H:i:s O", strtotime($booking_data->input->input_date." ".$booking_data->input->input_time.":00:00"));
        // $duration           = strtotime ( $end_time ) - strtotime ( $expiry->start_time );
        $expiry->duration   = 2;
        $expiry->unit       = "hours";

        // $gopay = new class{};
        // $gopay->enable_callback = true;
        // $gopay->callback_url = "http://saraga.esy.es/payment/finish";

        $client = new Client();
        $snapres = $client->request('POST', config('app.snap_url')."/v1/transactions", [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
                'Authorization'   => 'Basic '.base64_encode(config('app.server_key'))
            ],
            'json' => [
                // 'gopay'               => $gopay,
                'transaction_details' => $transaction,
                'customer_details'    => $customer,
                'expiry'              => $expiry
            ]
        ]);
        $request->session()->put('snap_token', json_decode($snapres->getBody())->token);
        $request->session()->put('order_id', json_encode($transaction->order_id));
        // return session('snapres');
        return $snapres->getBody();
    }

    public function create(Request $request){
        $booking_data = json_decode(session('booking_data'));
        $snap_token = session('snap_token');
        $order_id = session('order_id');
        // return dd($booking_data);
        // return $snap_token;
        $status = "PAYMENT";
        if($request->transaction_status == 'settlement'){
            $status = "SUCCESS";
        }
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('POST', config('app.api_url')."/order/create", [
                'form_params' => [
                    'id'            => $order_id,
                    'order_date'    => date("Y-m-d H:i:s", strtotime($booking_data->input->input_date)),
                    'order_details' => json_encode([$booking_data->order_detail]),
                    'token'         => $snap_token,
                    // 'pdf_url'       => $request->data['pdf_url']
                ]
            ]);
            return redirect(route('booking-list'));
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
            return $e;
            // return view('classimax.booking-list')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
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

    public function detail(){
        return view('classimax.booking-detail');
    }
}
