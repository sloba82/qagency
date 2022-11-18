<?php
namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class HttpRequest {

    public function requestApi($method, $url, $data)
    {

        // $response = '';
      
        try {

            $headers = ['accept' => 'application/json'];

            $clientInfo = new ClientInfo();
            if($clientInfo->auth){
                $headers['Authorization'] = 'Bearer ' . $clientInfo->token_key;
            }
    
            $response = Http::withHeaders($headers)->{$method}(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . $url, $data );
    

        } catch (Exception $e) {
            Log::error('AuthUserServices: ' . $e->getMessage());
        }


        return [ 
            'data' => json_decode($response->body(), true),
            'status' => $response->status()
        ];



    }

}