<?php

namespace App\Http\Controllers;

use App\Services\BookServices;
use App\Services\AuthorServices;
use App\Http\Requests\AddBookRequest;

class BookController extends Controller
{

    private $authorServices;
    private $bookServices;

    public function __construct(AuthorServices $authorServices, BookServices $bookServices)
    {
        $this->authorServices = $authorServices;
        $this->bookServices = $bookServices;
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('book.create', ['authors' =>  $this->bookServices->create()]);
    }

    /**
     * @param AddBookRequest $request
     * @return View
     */
    public function store(AddBookRequest $request)
    {
        $input = $request->validated();

        $data = [
            'author' => ['id' => (int) $input['author']],
            'title' => $input['title'],
            'release_date' => $input['release_date'],
            'description' => $input['description'],
            'isbn' => $input['isbn'],
            'format' => $input['format'],
            'number_of_pages' => (int) $input['number_of_pages'],
        ];

        if ($this->bookServices->addBook($data)) {
            return view('book.create', [
                'authors' =>  $this->bookServices->create(),
                'message' => 'Book is created!'
            ]);
        }

        return view('book.create', [
            'authors' =>  $this->bookServices->create(),
            'message' => 'Something went wrong!'
        ]);
    }

    /**
     * @param integer $book, $author
     * @return View
     */
    public function delete($book, $author)
    {
        if ($this->bookServices->deleteBookById($book)) {
            return view('author.show', [
                'author' => $this->authorServices->getAuthorById($author),
                'message' => 'Book deleted!'
            ]);
        }

        return view('author.show', [
            'author' => $this->authorServices->getAuthorById($author),
            'message' => 'Something went wrong!'
        ]);
    }
}
