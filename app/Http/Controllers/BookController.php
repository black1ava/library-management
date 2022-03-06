<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\BookType;
use App\Models\Author;
use App\Http\Requests\BookPostRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookTypes = BookType::all();
        $authors = Author::all();
        return view('book.create', compact('bookTypes', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookPostRequest $request)
    {
        $req = $request->except('only');

        $book = new Book();
        $book->title = $req['title'];
        $book->publish_date = $req['publish_date'];
        $book->num_of_pages = $req['num_of_pages'];
        $book->num_copies = $req['num_copies'];
        $book->edition = $req['edition'];
        $book->publisher = $req['publisher'];
        $book->book_source = $req['book_source'];
        $book->remark = $req['remark'];

        $bookType = BookType::findOrFail($req['book_type_id']);
        $bookType->books()->save($book);
         

        $book->save();

        foreach($req['authors'] as $authorId){
            $author = Author::findOrFail($authorId);
            $author->books()->attach($book);
        }

        return redirect()->route('book.index')->with(['messagge' => 'Create new book successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $bookTypes = BookType::all();
        $authors = Author::all();
        return view('book.edit', compact('book', 'bookTypes', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookPostRequest $request, Book $book)
    {
        $req = $request->except('_token');

        $book->title = $req['title'];
        $book->publish_date = $req['publish_date'];
        $book->num_of_pages = $req['num_of_pages'];
        $book->num_copies = $req['num_copies'];
        $book->edition = $req['edition'];
        $book->publisher = $req['publisher'];
        $book->book_source = $req['book_source'];
        $book->remark = $req['remark'];
        $book->book_type_id = $req['book_type_id'];

        $book->save();

        foreach($req['authors'] as $authorId){
            $author = Author::findOrFail($authorId);
            $author->books()->sync($book);
        }

        return redirect()->route('book.index')->with('message', 'Update book successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('message', 'Delete a book successfully');
    }
}
