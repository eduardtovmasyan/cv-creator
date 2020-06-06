<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function logIn(Request $request)
    {
    	Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ])->validate();

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
        return response([
            'message' => ['These credentials do not match our records.']
        ], 404);
    	}
    }
}
