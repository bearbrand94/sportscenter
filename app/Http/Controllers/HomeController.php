<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

use App\Mail\Receipt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        $res = $client->request('GET', config('app.api_url')."/spots", [
            'query' => [
                'paginate' => 5
            ]
        ]);

        $category_data = $client->request('GET', config('app.api_url')."/sports", [
        ]);

        $event_data = $client->request('GET', config('app.api_url')."/events", [
        ]);

        $promo_data = $client->request('GET', config('app.api_url')."/promos", [
        ]);
        

        return view('classimax.index')->with('spots', json_decode($res->getBody())->data)->with('categories', json_decode($category_data->getBody())->data)->with('events', json_decode($event_data->getBody())->data)->with('promos', json_decode($promo_data->getBody())->data);
    }
}
