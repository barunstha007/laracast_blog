<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('sessions.register');
    }

    public function  store()
    {
        //validate the form

        $this->validate(request(),[
            'name'=> 'required',
            'email' => 'required|email',
            'password'=>'required|confirmed'
        ]);

        //create the user

        $user=User::create(request(['name','email','password']));

        //sign the user in

        auth()->login($user);

         return redirect()->home();

    }
}
