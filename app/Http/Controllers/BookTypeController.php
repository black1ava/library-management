<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\Request;
use App\Http\Requests\BookTypePostRequest;

class BookTypeController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookTypes = BookType::all();
        return view('book_type.index', compact('bookTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookTypePostRequest $request)
    {
        $req = $request->except('_token');
        $bookType = new BookType();
        $bookType->name = $req['name'];
        $bookType->description = $req['description'];
        $bookType->save();

        return redirect()->route('book_type.index')->with(['message' => 'Create new book type successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function show(BookType $bookType)
    {
        return view('book_type.show', compact('bookType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function edit(BookType $bookType)
    {
        return view('book_type.edit', compact('bookType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function update(BookTypePostRequest $request, BookType $bookType)
    {
        $req = $request->except('_token');
        $bookType->name = $req['name'];
        $bookType->description = $req['description'];
        $bookType->save();

        return redirect()->route('book_type.index')->with(['message' => 'Update book type successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookType  $bookType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookType $bookType)
    {
        $bookType->delete();

        return redirect()->route('book_type.index')->with(['message' => 'Delete a book type successfully']);
    }
}
