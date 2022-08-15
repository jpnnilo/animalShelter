<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView(){
        return view('user.register');
    }

    public function loginView(){
        return view('user.login');
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'

        ]);
        
 
        //hash password
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();

        //allow user to login after registration
        auth()->login($user);
        
        return redirect(route('home'));
        
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
       
        //auth() helper = AUTH:: facade
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('home'));
        }
            return back()->withErrors([
                'email' => 'Credentials not found'
            ])->onlyInput('email');
        
       
    }

    public function logout(Request $request){

        auth()->logout();
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        
        return redirect(route('home'));
    }
}
