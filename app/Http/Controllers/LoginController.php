<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\CookieJarInterface;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\MessageBag;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\NewAccountPassword;

class LoginController extends Controller
{
	function oauth2_login_google(Request $request) {
        $client = new Client();
        try {
	        $res = $client->request('GET', 'https://www.googleapis.com/oauth2/v3/tokeninfo', [
			    'query' => [
			    	'access_token' => $request->access_token
			    ]
			]);
			if($res->getStatusCode() == 200){ // 200 = Success
				$user_info = json_decode($res->getBody()); // { "type": "User", ..
				$user = User::where('email', $user_info->email)->first();
				if($user == null){
					$auto_password = str_random(8);
					$user = User::create([
			            'name' => $request->name,
			            'email' => $user_info->email,
			            'password' => Hash::make($auto_password)
			        ]);
			        Mail::to($user)->send(new NewAccountPassword($user, $auto_password));
				}
				Auth::login($user, true);
				return response()->json(['message' => 'login success']);
			}
		} catch (RequestException $e) {
		    return "Token Invalid";
		}

	}

	function email_login(Request $request) {
        $credentials = $request->only('email', 'password');
    	$client = new Client(['cookies' => true]);
    	try {
	        $res = $client->request('POST', config('app.api_url')."/login/email", [
	        	'timeout' => 30,
			    'form_params' => [
			    	'email' => $request->email,
			    	'password' => $request->password
			    ]
			]);
			if($res->getStatusCode() == 200){ // 200 = Success
				$user_info = json_decode($res->getBody()); // { "type": "User", ..
				return redirect()->intended('home');
			}
			else{
	        	return view('classimax.login')->withErrors($res->getBody());
			}
		} catch (RequestException $e) {
			return view('classimax.login')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
		}
	}

	function log_out(Request $request){
		Auth::logout();
		return redirect()->intended('home');
	}

	function register(Request $request){
    	$client = new Client();
    	try {
	        $res = $client->request('POST', config('app.api_url')."/register", [
			    'form_params' => [
			    	'name' => $request->name,
			    	'email' => $request->email,
			    	'password' => $request->password,
			    	'telephone' => $request->telephone
			    ]
			]);
			if($res->getStatusCode() == 200){ // 200 = Success
				$user_info = json_decode($res->getBody()); // { "type": "User", ..
				return redirect()->intended('home');
			}
		} catch (RequestException $e) {
		    return view('classimax.register')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
		}
	}

	function check_data(){
    	$client = new Client(['cookies' => true]);
    	try {
	        $res = $client->request('POST', config('app.api_url')."/login/email", [
	        	'timeout' => 30,
			    'form_params' => [
			    	'email' => "paulusw.94@gmail.com",
			    	'password' => "sportscenter"
			    ]
			]);
			print_r($res->getHeader('set-cookie'));
			if($res->getStatusCode() == 200){ // 200 = Success
				$user_info = json_decode($res->getBody()); // { "type": "User", ..
			}
			else{
	        	return view('classimax.login')->withErrors($res->getBody());
			}
		} catch (RequestException $e) {
			return view('classimax.login')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
		}
		
		$client = new Client(['cookies' => true]);
        try {
            $res = $client->request('GET', config('app.api_url')."/initialData");
            print_r($res->getHeader('set-cookie'));
            if($res->getStatusCode() == 200){ // 200 = Success
                $user_info = json_decode($res->getBody()); // { "type": "User", ..
                print_r($user_info);
                view()->share('auth_data', $user_info->data);
            }
        } catch (RequestException $e) {
            $error_data = json_decode($e->getResponse()->getBody()->getContents())->data;
            echo $error_data;
            view()->share('auth_data', $error_data);
        }
	}
}
