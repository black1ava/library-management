<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->route('home');
        }
        
        return view('accounts.login');
    }
}
