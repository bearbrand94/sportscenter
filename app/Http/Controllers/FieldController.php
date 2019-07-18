<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

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
        $res = $client->request('POST', config('app.api_url')."/spots/get-favorite");
        $category_data = $client->request('GET', config('app.api_url')."/sports", [
        ]);

        return view('classimax.favorit')->with('fields', json_decode($res->getBody())->data)->with('categories', json_decode($category_data->getBody())->data);
    }

    public function detail(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);
        return view('classimax.detail')->with('detail', json_decode($res->getBody())->data);  
    }

    public function court(Request $request){
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('GET', config('app.api_url')."/spots/".$request->slug);
        $detail = json_decode($res->getBody())->data;

        //modify timeslots data from API. add timeslots status.
        for ($i=0; $i < count($detail->courts); $i++) { 
            //set status to not available
            $detail->courts[$i]->status=0;

            for ($j=0; $j < count($detail->courts[$i]->timeslots); $j++) { 
                $start_time = (int) date('H', strtotime($detail->courts[$i]->timeslots[$j]->start_at));
                $end_time = (int) date('H', strtotime($detail->courts[$i]->timeslots[$j]->end_at));

                $input_start=(int) $request->input('input-time');
                $input_end=(int) $request->input('input-time')+$request->input('duration');
                //if request time given is acceptable from timeslots, then set status to available.
                if($input_start >= $start_time){
                  if($input_end <= $end_time){
                    $detail->courts[$i]->status=1;
                  }
                }
            }
        }
        return view('classimax.select-court')->with('detail', $detail);  
    }
}
