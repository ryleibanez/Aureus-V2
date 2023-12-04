<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator as DotenvValidator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function signup()
    {
        return view('signup');
    }

    public function createUser(Request $request)
    {

        // $request->validate([
        //     'fname' => 'required',
        //     'lname' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required',
        //     'gender' => 'required',
        //     'mobilenumber' => 'required',
        //     'address' => 'required',
        //     'country' => 'required',
        //     'secQuestion' => 'required',
        //     'secAnswer' => 'required',


        // ]);

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'gender' => 'required',
          
            'mobilenumber' => 'required',
            'address' => 'required',
            'country' => 'required',
            'secQuestion' => 'required',
            'secAnswer' => 'required',
            'profilepic' => 'required',
        ]);
    
        // Add a custom error message for the email field
        $validator->setCustomMessages([
            'email.unique' => 'The email address is already in use. Please choose another email.',
            'secAnswer.required' => 'Your answer for the security question is required!',
            'secQuestion.required' => 'Select a Security Question',
        ]);
        
        if ($validator->fails()) {
            return redirect(route('signup'))
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('profilepic');

        // You can customize the file name and directory as needed
        $fileName = time() . '_' . $file->getClientOriginalName();
        $uploadPath = public_path('uploads');
        $file->move($uploadPath, $fileName);

        $data['fname'] = $request->fname;
        $data['lname'] = $request->lname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['gender'] = $request->gender;
        $data['mobilenumber'] = $request->mobilenumber;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $data['secQuestion'] = $request->secQuestion;
        $data['code'] = $request->code;
        $data['type'] = $request->type;
        $data['secAnswer'] = Hash::make($request->secAnswer);
        $data['profilepic'] =  "uploads/" . $fileName;

        $create = User::create($data);

        if ($create) {
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return Redirect(route('index'));
        }
    }
}
