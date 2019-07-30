<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Validator;

class FieldController extends Controller
{
    public function index()
    {

    }

    public function search(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);

        $req_category = $client->request('GET', config('app.api_url')."/sports");
        $category_data = json_decode($req_category->getBody())->data;

        $request->category = $request->category ? $request->category : 0;
        $request['category_name'] = $request->category ? $category_data[$request->category-1]->name : null;
        $field_data;
        try {
	        $res = $client->request('POST', config('app.api_url')."/spots/filter/available", [
	            'form_params' => [
	                'sport_id' => $request->category,
	                'date' => $request->search_date,
	                'text' => $request->keyword
	            ]
	        ]);
			if($res->getStatusCode() == 200){ // 200 = Success
				$body = $res->getBody();
				$field_data = json_decode($body)->data;
				$paginate_links = json_decode($body)->links;
			}
		} catch (RequestException $e) {
		    return $e;
		}

        return view('classimax.category')->with('fields', $field_data)->with('links', $paginate_links)->with('requests', $request->all())->with('categories', $category_data);
    }

    public function favorit(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $category_data = $client->request('GET', config('app.api_url')."/sports", [
        ]);
        try {
            $res = $client->request('POST', config('app.api_url')."/spots/get-favorite");
        } catch (RequestException $e) {
            return view('classimax.favorit')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data)->with('categories', json_decode($category_data->getBody())->data);
        }
        return view('classimax.favorit')->with('fields', json_decode($res->getBody())->data)->with('categories', json_decode($category_data->getBody())->data);
    }

    public function set_favorit(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        // return $request->current_value;
        if($request->current_value == "false"){
            $res = $client->request('POST', config('app.api_url')."/spots/set-favorite", [
                'form_params' => [
                    'id' => $request->spot_id,
                ]
            ]);
        }
        else{
            $res = $client->request('POST', config('app.api_url')."/spots/unset-favorite", [
                'form_params' => [
                    'id' => $request->spot_id,
                ]
            ]);
        }
    }

    public function detail(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);
        } catch (RequestException $e) {
            return view('classimax.404');
        }
        return view('classimax.detail')->with('detail', json_decode($res->getBody())->data);  
    }

    public function court(Request $request){
        session(['input-date'=>$request->input('input-date')]);
        $validator = Validator::make($request->all(), [
            'input-date' => 'required|date|after:yesterday',
            'input-time' => 'required',
            'input-duration' => 'required'
        ])->validate();

        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);
        } catch (RequestException $e) {
            return view('classimax.404');
        }
        $detail = json_decode($res->getBody())->data;

        //modify timeslots data from API. add timeslots status.
        for ($i=0; $i < count($detail->courts); $i++) { 
            //set status to not available
            $detail->courts[$i]->status=0;

            $input_start=(int) $request->input('input-time');
            $input_end=(int) $request->input('input-time')+$request->input('input-duration');

            $arr_input = Array();
            $arr_time = Array();
            
            //set array input data for comparison
            for ($j=0; $j < $request->input('input-duration') ; $j++) { 
                $arr_input[] = (string)$input_start+$j . "-" . ($input_start+1+$j);
            }
            //set array time available data for comparison
            for ($j=0; $j < count($detail->courts[$i]->timeslots); $j++) { 
                $start_time = (int) date('H', strtotime($detail->courts[$i]->timeslots[$j]->start_at));
                $end_time = (int) date('H', strtotime($detail->courts[$i]->timeslots[$j]->end_at));

                $arr_time[] = (string)$start_time . "-" . $end_time;
            }
            
            // echo "Input<BR>";
            // print_r($arr_input);
            // echo "<BR>Available Time<BR>";
            // print_r($arr_time);
            // echo "<BR>Difference<BR>";
            // print_r(array_diff($arr_input, $arr_time));

            //if request time given is acceptable from timeslots, then set status to available.
            if(count(array_diff($arr_input, $arr_time)) == 0){
                $detail->courts[$i]->status=1;
            }
        }
        return view('classimax.select-court')->with('detail', $detail);  
    }
}
