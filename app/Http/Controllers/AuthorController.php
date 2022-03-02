<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorPostRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorPostRequest $request)
    {
        $req = $request->except('_token');

        $author = new Author();

        $author->name = $req['name'];
        $author->gender = $req['gender'];
        $author->dob = $req['dob'];
        $author->pob = $req['pob'];
        $author->address = $req['address'];
        $author->phone = $req['phone'];
        $author->email = $req['email'];

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
           $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
           $request->file('photo')->move(public_path('/images'), $file);
           $author->photo = $file; 
        }

        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorPostRequest $request, Author $author)
    {
        $req = $request->except('_token');

        $author->name = $req['name'];
        $author->gender = $req['gender'];
        $author->dob = $req['dob'];
        $author->pob = $req['pob'];
        $author->address = $req['address'];
        $author->phone = $req['phone'];
        $author->email = $req['email'];

        if($request->hasFile('photo') && $request->file('photo')->isValid()){

            $photo = $author->photo;
            unlink(public_path('images/'.$photo));

            $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/images'), $file);
            $author->photo = $file; 
         }
 
         $author->save();
 
         return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $photo = $author->photo;

        unlink(public_path('images/'.$photo));
        $author->delete();

        return redirect()->route('author.index');
    }
}
