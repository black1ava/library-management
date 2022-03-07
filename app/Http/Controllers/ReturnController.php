<?php

namespace App\Http\Controllers;

use App\Models\_Return;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\User;
use App\Http\Requests\ReturnPostRequest;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
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
        $returns = _Return::all();
        return view('return.index', compact('returns'));
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
        return view('return.create', compact('students', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReturnPostRequest $request)
    {
        $req = $request->except('_token');

        $return = new _Return();
        $return->return_date = $req['return_date'];
        
        $student = Student::findOrFail($req['student_id']);
        $return->student()->associate($student);

        $book = Book::findOrFail($req['book_id']);
        $return->book()->associate($book);

        $user = User::findOrFail(Auth::user()->id);
        $return->user()->associate($user);

        $return->save();

        return redirect()->route('return.index')->with('message', 'Create a new return record successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\_Return  $_Return
     * @return \Illuminate\Http\Response
     */
    public function show(_Return $return)
    {
        return view('return.show', compact('return'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\_Return  $_Return
     * @return \Illuminate\Http\Response
     */
    public function edit(_Return $return)
    {
        $students = Student::all();
        $books = Book::all();

        return view('return.edit', compact('return', 'students', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\_Return  $_Return
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _Return $_Return)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\_Return  $_Return
     * @return \Illuminate\Http\Response
     */
    public function destroy(_Return $_Return)
    {
        //
    }
}
