<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthUserServices;
use App\Services\ClientInfo;

class AuthUserController extends Controller
{

    public function index()
    {

        return view('auth.login');
    }

    public function login(Request $request, AuthUserServices $authUserServices)
    {
   
        $input = $request->all();
        $authUserServices->login($input['email'], $input['password']);

        $client = new ClientInfo;

        dd($client->user);

    }

    public function logOut()
    {
        return view('index');
    }


}
