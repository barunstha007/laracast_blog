<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class RegistrationController extends Controller
{
    public function create()
    {
        return view('sessions.register');
    }

    public function  store(Request $request)
    {
        //validate the form

        $this->validate(request(),[
            'name'=> 'required',
            'email' => 'required|email',
            'password'=>'required|confirmed'
        ]);

        //create the user
        $hashpassword=Hash::make($request->password);

        // echo $request->password; die();
        $user=User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password'=>$hashpassword

        ]);

        //sign the user in

        auth()->login($user);

         return redirect()->home();

    }
}
