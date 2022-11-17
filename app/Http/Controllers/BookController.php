<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookServices;
use App\Services\AuthorServices;

class BookController extends Controller
{

    public function create(AuthorServices $authorServices)
    {
        $authors = $authorServices->getAuthors();

        $authorArray = collect($authors['items'])->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['first_name'] . ' ' . $item['last_name']];
        })->toArray();

        return view('book.create', ['authors' => $authorArray]);
    }


    public function store(Request $request, BookServices $bookServices)
    {
        $input = $request->all();

        $data = [
            'author' => ['id'=> (int) $input['author']],
            'title' => $input['title'],
            'release_date' => $input['release_date'],
            'description' => $input['description'],
            'isbn' => $input['isbn'],
            'format' => $input['format'],
            'number_of_pages' => (int) $input['number_of_pages'],
        ];

        $bookServices->addBook($data);

        
    }


    public function delete($id, BookServices $bookServices)
    {
        $bookServices->deleteBookById($id);
    }
}
