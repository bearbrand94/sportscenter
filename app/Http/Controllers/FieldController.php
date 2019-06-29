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
}
