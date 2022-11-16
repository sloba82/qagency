<?php

namespace App\Services;


use Exception;
use ClientInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AuthUserServices
{

    public function login($email, $password)
    {

        $clientInfo = new ClientInfo;
        Log::info('test ClientInfo auth');
        Log::info($clientInfo->auth);

        $validUser = false;

        if (!$clientInfo->auth) {
            try {
                Log::info('get user');
                $response = Http::post(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/token', [
                    'email' => $email,
                    'password' => $password
                ]);

                if ($response->status() == 200) {
                    Session::put('user', json_decode($response->body(), true));
                    $validUser = true;
                } else {
                    $validUser = false;
                }
            } catch (Exception $e) {
                Log::error('AuthUserServices: ' . $e->getMessage());
            }
        } else {
            $validUser = true;
        }

        return $validUser;
    }


    public function logOut()
    {
        Session::flush('user');
    }
}
