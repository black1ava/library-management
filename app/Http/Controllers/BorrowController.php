<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Http\Requests\BorrowPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
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
        $borrows = Borrow::all();
        return view('borrow.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $books = Book::all();

        return view('borrow.create', compact('students', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowPostRequest $request)
    {
        $req = $request->except('_token');

        $borrow = new Borrow();
        $borrow->borrow_date = $req['borrow_date'];
        $borrow->return_date = $req['return_date'];

        $user = User::findOrFail(Auth::user()->id);
        $borrow->user()->associate($user);

        $student = Student::findOrFail($req['student_id']);
        $borrow->student()->associate($student);

        $book = Book::findOrFail($req['book_id']);
        $borrow->book()->associate($book);

        $borrow->save();

        return redirect()->route('borrow.index')->with('message', 'Create a new borrow record successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        return view('borrow.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        $students = Student::all();
        $books = Book::all();
        return view('borrow.edit', compact('borrow', 'students', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowPostRequest $request, Borrow $borrow)
    {
        $req = $request->except('_token');

        $borrow->borrow_date = $req['borrow_date'];
        $borrow->return_date = $req['return_date'];

        $user = User::findOrFail(Auth::user()->id);
        $borrow->user()->associate($user);

        $student = Student::findOrFail($req['student_id']);
        $borrow->student()->associate($student);

        $book = Book::findOrFail($req['book_id']);
        $borrow->book()->associate($book);

        $borrow->save();

        return redirect()->route('borrow.index')->with('message', 'Update a book record successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();

        return redirect()->route('borrow.index')->with('message', 'Delete a book record successfully');
    }
}
