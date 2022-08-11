<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerView(){
        return view('user.register');
    }

    public function loginView(){
        return view('user.login');
    }

    public function register(){
        
    }
}
