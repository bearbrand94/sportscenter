<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\CookieJarInterface;
use GuzzleHttp\Cookie\SessionCookieJar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfileController extends Controller
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

    function upload_image(Request $request){
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:15000'
        ])->validate();

        // return fopen($request->file('profile_image')->path(), 'r');
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('POST', config('app.api_url')."/profile/update", [
                'multipart' => [
                    [
                        'name'     => 'profile_image',
                        'contents' => fopen($request->file('profile_image')->path(), 'r')
                    ]
                ]
            ]);
            if($res->getStatusCode() == 200){ // 200 = Success
                $user_info = json_decode($res->getBody()); // { "type": "User", ..
                session(['auth_data'=>$user_info->data]);
                return redirect()->back();
            }
        } catch (RequestException $e) {
            return $e->getResponse()->getBody()->getContents();
            return view('classimax.edit-profile')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
        }
    }

	function update_profile(Request $request) {
        $jar = session('jar');
        $client = new Client(['cookies' => $jar]);
        try {
            $res = $client->request('POST', config('app.api_url')."/profile/update", [
                'form_params' => [
                    'fullname' => $request->fullname,
                    'address' => $request->address,
                    'birthdate' => $request->birthdate
                ]
            ]);
            if($res->getStatusCode() == 200){ // 200 = Success
                $user_info = json_decode($res->getBody()); // { "type": "User", ..
                session(['auth_data'=>$user_info->data]);
                return redirect()->intended('profile');
            }
        } catch (RequestException $e) {
            return $e->getResponse()->getBody()->getContents();
            return view('classimax.edit-profile')->withErrors(json_decode($e->getResponse()->getBody()->getContents())->data);
        }
	}

	function change_password(Request $request) {
		$input = $request->only('current_password', 'new_password');
		$validator = Validator::make($input, [
			'current_password' => ['required', 'string', 'max:255'],
            'new_password' => ['required', 'string', 'max:255']
        ])->validate();

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->current_password])) {
			$user_data = User::find(Auth::id());
			$user_data->password = Hash::make($request->new_password);
			$user_data->save();
            return redirect()->back()->with('password-success', 'Password Changed!');
        }
        else{
        	$errors = new MessageBag();
        	$errors->add('credentials', "Your Current Password is not valid");
        	return view('classimax.user-profile')->withErrors($errors);
        }
	}
}
