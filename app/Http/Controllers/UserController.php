<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ])->validate();

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => User::TYPE_USER,
            'password' => Hash::make($request->password),
        ]);
    }
}
