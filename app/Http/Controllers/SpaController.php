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
        return response(
            ['user' => $user]
        );
    }
    public function login(Request $rq)
    {
        $credentials = $rq->only('email', 'password');
        $kt = Auth::attempt($credentials);
        $chek = 'ok';
        $fal = 'fall';
        if ($kt)
            return response(['ok' => $chek]);
        else
            return response(['ok' => $fal]);
    }
}
