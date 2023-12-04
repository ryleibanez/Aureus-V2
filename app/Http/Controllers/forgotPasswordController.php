<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class forgotPasswordController extends Controller
{
    //
    public function forgot(){
        return view('forgotpassword');
    }

    
//going to the security question
    public function getSecurityQuestion()
    {   
        $email = session('email');
        $user = User::where('email', $email)->first(); // Retrieve the user by email
    
        if ($user) {
            $securityQuestion = $user->secQuestion;
            
            return view('securityquestion', compact('securityQuestion'));
        } else {
            // Handle the case where the user is not found (e.g., show an error message).
        }
    }
// going to the newpassword page
    public function newPassword(){

        return view('newpassword');
    }

    //post for the newpassword
    public function postPassword(Request $request){
        $email = session('email');
        $newpassword = $request->input('password');
        $reentered = $request->input('repassword');
        $user = User::where('email', $email)->first();

        if($user){
            if($newpassword === $reentered){
            $password = Hash::make($newpassword);
            //update the user's password
            $user->password = $password;
            $user->save();
            session()->flush();
            return redirect(route('signin'))->with('success', 'Password recovery is successful');
            }else{
                return redirect(route('newpassword'))->with('error', 'Passwords does not match.');
            }
        }else{

        }

    }

    public function validateAnswer(Request $request)
    {   

        $email = session('email');
        $user = User::where('email', $email)->first(); // Retrieve the user by email
    
        if ($user) {
            $encryptedAnswer = $user->secAnswer;
            $isAnswerCorrect = Hash::check($request->input('answer'), $encryptedAnswer);

            if($isAnswerCorrect){
                session()->forget('securityAuth');
                session()->put('newpassword', $email);

                return redirect()->intended(route('newpassword'));
            }
            return redirect(route('secvalidation'))->with('error', 'Invalid Answer!');
        } else {
           
        }
    }

//email verification
    public function emailVerify(Request $request){

        $validator = Validator::make($request->all(), [
            
            'email' => 'required|email',
            
        ]);
    
        
        if ($validator->fails()) {
            return redirect(route('forgotpassword'))
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->input('email');

        $db = User::where('email', $email)->first();

        if($db){
            $request->session()->put('email', $email);
            $request->session()->put('securityAuth', $email);
            return redirect()->intended(route('secvalidation'));
        }
        return redirect(route('forgotpassword'))->with("errors", "User doesn't exists.");

    }
}
