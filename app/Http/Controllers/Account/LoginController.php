<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Http\Requests\LoginPostRequest;

class LoginController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->route('home');
        }
        
        return view('accounts.login');
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }

        return redirect()->route('login.show')->with(['message' => 'Incorret email or password']);
    }
}
