<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function signin()
    {
        return view('signin');
    }


    public function signinAuth(Request $request)
    {
        $request->validate([
           
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if($user->type === "user"){
            return redirect()->intended(route('index'));
            }else{
                return redirect()->intended(route('adminhome'));
            }
        }

        return redirect(route('signin'))->with("error", "Username or password is invalid.");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('signin'));
    }
}
