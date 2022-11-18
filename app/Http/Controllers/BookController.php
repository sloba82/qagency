<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookServices;
use App\Services\AuthorServices;

class BookController extends Controller
{

    private $authorServices;
    private $bookServices;

    public function __construct(AuthorServices $authorServices, BookServices $bookServices)
    {
        $this->authorServices = $authorServices;
        $this->bookServices = $bookServices;
    }


    public function create()
    {
        $authors = $this->authorServices->getAuthors($id = 'id', $direction = 'ASC', $limit = 1000, $page = 1);

        $authorArray = collect($authors['items'])->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item['first_name'] . ' ' . $item['last_name']];
        })->toArray();

        return view('book.create', ['authors' => $authorArray]);
    }


    public function store(Request $request)
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

        $this->bookServices->addBook($data);


    }

    public function delete($id)
    {
        $this->bookServices->deleteBookById($id);
    }
}
