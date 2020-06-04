<?php
namespace App\Traits;

use Illuminate\Foundation\Auth\ResetsPasswords;

trait CustomResetsPasswords 
{
    use ResetsPasswords;


    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
