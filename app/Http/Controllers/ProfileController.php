<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

	function profile(Request $request) {
		$input = $request->only(['name', 'telephone']);
		$validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255']
        ])->validate();

		$user_data = User::find(Auth::id());
		$user_data->name = $input->name;
		$user_data->telephone = $input->telephone;
		$user_data->save();
	}
}
