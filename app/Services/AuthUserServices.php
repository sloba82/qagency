<?php

namespace App\Services;


use Exception;
use ClientInfo;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class AuthUserServices
{

    private $httpRequest;

    public function __construct(HttpRequest $httpRequest)
    {

        $this->httpRequest = $httpRequest;
    }


    public function login($email, $password)
    {
        $data = [
            'email' => $email,
            'password' => $password

        ];

        $response = $this->httpRequest->requestApi('post', '/api/v2/token', $data);

        if($response['status'] == 200){
            Session::put('user', $response['data']);
            return true;
        }

        return false;
    }


    public function logOut()
    {
        Session::flush('user');
    }
}
