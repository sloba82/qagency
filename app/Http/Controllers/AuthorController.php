<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthorServices;
use Illuminate\Routing\Redirector;

class AuthorController extends Controller
{

    public function __construct(AuthorServices $authorServices)
    {
        $this->authorServices = $authorServices;
    }

    public function index()
    {
        return view('author.index', ['authors' => $this->authorServices->getAuthors()]);
    }

    public function show($id)
    {
        return view('author.show', ['author' => $this->authorServices->getAuthorById($id)]);
    }

    public function delete($id)
    {
        if (!$this->authorServices->getAuthorById($id)['books']) {
            $this->authorServices->deleteAuthorById($id);
            return redirect()->route('authors.index', ['message' => 'Author deleted!']);
        }
        
        return redirect()->route('authors.index', ['message' => 'The Author cannot be deleted!']);
    }
}
