<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forgotSecurityController extends Controller
{
    //
    public function security(){
        return view('securityquestion');
    }
}
