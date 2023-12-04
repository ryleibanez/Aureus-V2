<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function myprofile(Request $request)
    {
        
        return view('myprofile');
    }

    public function editProfilePage()
    {
        return view('dash-edit-profile');
    }

    public function updateProfile(Request $request)
    {
        $email = auth()->user()->email;

        $user = User::where('email', $email)->first();

        if ($user) {
            $validator = Validator::make($request->all(), [
                'fname' => 'required',
                'lname' => 'required',
                'gender' => 'required',
                'mobilenumber' => ['required', 'regex:/^[0-9]{10,11}$/'],
            ]);

            if ($validator->fails()) {
                // Validation failed
                return response()->json([
                    'errors' => $validator->errors(),
                ], 422);
            }
            $file = $request->file('profilepic');




            if ($request->hasFile('profilepic') && $file->isValid()) {
                // You can customize the file name and directory as needed
                $fileName = time() . '_' . $file->getClientOriginalName();
                $uploadPath = public_path('uploads');
                $file->move($uploadPath, $fileName);
                $filePath = "uploads/" . $fileName;
                $user->profilepic = $filePath;
            }else{}


            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->gender = $request->input('gender');
            $user->mobilenumber = $request->input('mobilenumber');

            $update = $user->save();

            if ($update) {
                // To store data in the session
                session()->flash('success', 'value');
                

                

                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'failed']);
            }
        } else {
            return response()->json(['status' => 'failed']);
        }
    }
}
