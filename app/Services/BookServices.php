<?php
namespace App\Services;

use App\Helpers\ClientInfo;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Http;



class BookServices {

    private $httpRequest;

    public function __construct(HttpRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    public function deleteBookById($id)
    {
        $response = $this->httpRequest->requestApi('delete', '/api/v2/books/'. $id, []);

        if ($response['status'] == 204){
            return true;
        }
        return false;
    }

    public function addBook($data)
    {
        $response = $this->httpRequest->requestApi('post', '/api/v2/books', $data);

        if ($response['status'] == 200){
            return true;
        }
        return false;
    }
}