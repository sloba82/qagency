<?php
namespace App\Services;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthUserServices
{

    public function login($email, $password)
    {

  

        $response = Http::post(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL'). '/api/v2/token', [
           'email' => $email,
           'password' => $password
        ]);


        Session::put('user', json_decode($response->body(), true));

       
        Log::info(Session::get('user'));


        // dd(Session::get('user'));


        return true;


    }
    
}
