<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use App\Http\Models\Post;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
    }


    public function create()
    {
        return view('sessions.login');
    }

    public function store(Request $request)
    {
    //     $email = $request->email;
    //     $password = $request->password;
    //    if (! auth()->attempt(['email'=>$email,'password'=>$password]))
    //    {
    //        return back()->withErrors([
    //         'message'=> ' Check credentials and try again '
    //        ]);
    //    }
       
    //   if (! auth()->attempt(request(['email','password'])))
    //   {
    //       return back()->withErrors([
    //        'message'=> ' Check credentials and try again '
    //       ]);
    //   }
    $credentials = $request->only('email','password');
    //    print_r ($credentials);  die();
    if(Auth::attempt($credentials)){

        $request->session()->regenerate();

       return redirect()->home();
       
    }

    return back()->withErrors([
            'message' => 'Check your credentials and try again',
    ]);



        
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }
}
