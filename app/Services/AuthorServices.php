<?php

namespace App\Services;

use Exception;

use App\Helpers\ClientInfo;
use App\Helpers\HttpRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AuthorServices
{

    private $httpRequest;

    public function __construct(HttpRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    public function getAuthors($id = 'id', $direction = 'ASC', $limit = 12, $page = 1)
    {
        $data = [
            'orderBy' => $id,
            'direction' => $direction,
            'limit' => $limit,
            'page' => $page
        ];

        $response = $this->httpRequest->requestApi('get', '/api/v2/authors', $data);

        if ($response['status'] == 200) {
            return $response['data'];
        }

        return [];
    }

    public function getAuthorById($id)
    {
        $response = $this->httpRequest->requestApi('get', '/api/v2/authors/' . $id, []);

        if ($response['status'] == 200) {
            return $response['data'];
        }

        return [];
    }

    public function deleteAuthorById($id)
    {
        $response = $this->httpRequest->requestApi('delete', '/api/v2/authors/' . $id, []);

        if ($response['status'] == 204) {
            return true;
        }

        return false;
    }

    public function createAuthor($data)
    {
        $response = $this->httpRequest->requestApi('post', '/api/v2/authors', $data);

        if ($response['status'] == 200) {
            return true;
        }

        return false;
    }
}
