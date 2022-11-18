<?php
namespace App\Services;

use App\Helpers\ClientInfo;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Http;



class BookServices {

    private $httpRequest;
    private $authorServices;

    public function __construct(HttpRequest $httpRequest, AuthorServices $authorServices)
    {
        $this->httpRequest = $httpRequest;
        $this->authorServices = $authorServices;
    }

    public function deleteBookById($id)
    {
        $response = $this->httpRequest->requestApi('delete', '/api/v2/books/'. $id, []);

        if ($response['status'] == 204){
            return true;
        }
        return false;
    }

    public function create()
    {
        $authors = $this->authorServices->getAuthors($id = 'id', $direction = 'ASC', $limit = 1000, $page = 1);

        if($authors){
            $authorArray = collect($authors['items'])->mapWithKeys(function ($item, $key) {
                return [$item['id'] => $item['first_name'] . ' ' . $item['last_name']];
            })->toArray();

            return $authorArray;

        }
        
        return [];
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