<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterPostRequest;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterPostRequest $request, $id)
    {
        $req = $request->except('_token');

        $user = User::findOrFail($id);

        $user->name = $req['name'];
        $user->gender = $req['gender'];
        $user->dob = $req['dob'];
        $user->pob = $req['pob'];
        $user->phone = $req['phone'];
        $user->email = $req['email'];
        $user->address = $req['address'];

        if($request->hasFile('photo') && $request->file('photo')->isValid()){

            $photo = $user->photo;
            if($photo !== null){
                unlink(public_path('images/'.$photo));
            }

            $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/images'), $file);
            $user->photo = $file; 
         }

        $user->save();

        return redirect()->back()->with('message', 'update account successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->back();
    }
}
