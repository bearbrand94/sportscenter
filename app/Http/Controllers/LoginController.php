<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
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

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
        else{
        	$errors = new MessageBag();
        	$errors->add('credentials', "Your E-mail / Password is not valid");
        	return view('classimax.login')->withErrors($errors);
        }
	}

	function log_out(Request $request){
		Auth::logout();
		return redirect()->intended('home');
	}

	function register(Request $request){
		$validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

		User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone
        ]);	

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
	}
}
