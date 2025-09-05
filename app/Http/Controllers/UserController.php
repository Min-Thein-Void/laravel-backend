<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

use App\Models\User;

class UserController extends Controller
{
    function create()
    {
        return view('register.form');
    }

    function store()
    {
       $formData = request()->validate([
            'name' => ['required', 'max:253', Rule::unique('users','name')],
            'username' => ['required', 'max:253', Rule::unique('users','username')],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'max:8'],
        ]);
        $user = User::create($formData);
        //login
        auth()->login($user);

        return redirect('/')->with('name','Welcome '.$user->name);
    }

    function login(){
        return view('register.login');
    }

    function post_login(){
        $formData  = request()->validate([
            'email' => ['required', 'email', Rule::exists('users','email')],
            'password' => ['required','min:8','max:255'],
        ],[
            'email.required'=>'Your email is wrong pls try again',
            'password.min'=>'password must be at least 8 character'
        ]);
        if (auth()->attempt($formData)) {
             return redirect('/')->with('name','Welcome');
        } else {
             return redirect()->back()->withErrors([
                'email'=>'user credentials wrong'
             ]);
        }
    }

    function logout(){
        auth()->logout();
        return redirect('/')->with('name','good bye');
    }
}
