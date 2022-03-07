<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->route('home');
        }

        return view('accounts.register');
    }

    public function register(RegisterPostRequest $request){
        $req = $request->except('_token');

        $user = new User();
        $user->name = $req['name'];
        $user->gender = $req['gender'];
        $user->dob = $req['dob'];
        $user->pob = $req['pob'];
        $user->phone = $req['phone'];
        $user->email = $req['email'];
        $user->address = $req['address'];
        $user->password = Hash::make($req['password']);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){

            $path = public_path('/images');

            if(!File::isDirectory($path)){

                File::makeDirectory($path, 0777, true, true);
        
            }

           $file = time().'.'.$request->file('photo')->getClientOriginalExtension();
           $request->file('photo')->move(public_path('/images'), $file);
           $user->photo = $file; 
        }

        $user->save();

        if($user){
            $credential = $request->only(['email', 'password']);
            if(Auth::attempt($credential)){
                return redirect()->route('home');
            }
        }
    }
}
