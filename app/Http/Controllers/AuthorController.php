<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthorServices;

class AuthorController extends Controller
{

    // private $authorServices;

    // public function __construct(AuthorServices $authorServices)
    // {
    //     $this->authorServices = $authorServices;
    // }

    public function index(AuthorServices $authorServices)
    {
        return view('author.index', ['authors' => $authorServices->getAuthors()]);
    }

    public function show($id, AuthorServices $authorServices)
    {

        return view('author.show', ['author' => $authorServices->getAuthorById($id)]);
    }

    public function deleteAuthorById($id, AuthorServices $authorServices)
    {
        if(!$authorServices->getAuthorById($id)['books']){
            $authorServices->deleteAuthorById($id);
        }
    }
}
