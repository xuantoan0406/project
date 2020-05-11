<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SpaController extends Controller
{
    public function index()
    {
        return view('spa');
    }
    public function register(registerRequest $rq)
    {
        $user = User::create([
            'name' => $rq['name'],
            'email' => $rq['email'],
            'password' => Hash::make($rq['password']),
        ]);
        return response()->json($user);
        // return response(
        //     ['user' => $user]
        // );

    }
    public function login(Request $rq)
    {
        $credentials = $rq->only('email', 'password');
        $stt = Auth::attempt($credentials);
        return response()->json($stt);
    }
    public function user()
    {
        $check = Auth::check();
        if ($check)
            $user = Auth::user();
        else
            $user = '';
        return response()->json($user);
    }
    public function logout()
    {
        Auth::logout();
    }
    public function checkLogin()
    {
        $check = Auth::check();
        return response()->json($check);
    }
}
