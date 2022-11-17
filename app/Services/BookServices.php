<?php
namespace App\Services;

use App\Helpers\ClientInfo;
use Illuminate\Support\Facades\Http;



class BookServices {

    public $clientInfo;

    public function __construct(ClientInfo $clientInfo)
    {
        $this->clientInfo = $clientInfo;
    }

    public function deleteBookById($id)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key
        ])->delete(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/books/'. $id );

        return json_decode($response->body(), true);
    }

    public function addBook($data)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key,
            'X-Requested-With' => 'XMLHttpRequest'
        ])->post(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/books', 
            $data
        );

        // status 200

    }
}