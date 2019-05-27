<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

	function update_profile(Request $request) {
		$input = $request->only('fullname', 'telephone');
		$validator = Validator::make($input, [
            'fullname' => ['required', 'string', 'max:20'],
            'telephone' => ['required', 'string', 'max:255']
        ])->validate();

		$user_data = User::find(Auth::id());
		$user_data->name = $request->fullname;
		$user_data->telephone = $request->telephone;
		$user_data->save();

		return redirect()->back();
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
