<?php
namespace App\Services;

use Exception;

use App\Helpers\ClientInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AuthorServices {

    public $clientInfo;

    public function __construct(ClientInfo $clientInfo)
    {
        $this->clientInfo = $clientInfo;
    }

    public function getAuthors()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key
        ])->get(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/authors', [
            'orderBy' => 'id',
            'direction' => 'ASC',
            'limit' => 12,
            'page' => 1
        ]);

        return json_decode($response->body(), true);
    }

    public function getAuthorById($id)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key
        ])->get(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/authors/'. $id );

        return json_decode($response->body(), true);
    }

    public function deleteAuthorById($id)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key
        ])->delete(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/authors/'. $id );

        return json_decode($response->body(), true);
    }


    public function createAuthor($data)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->clientInfo->token_key
        ])->post(config('qSymfonySkeletonAPI.qSymfonySkeletonAPI_BASE_URL') . '/api/v2/authors', 
            $data
        );

        return json_decode($response->body(), true);
    }

    


}