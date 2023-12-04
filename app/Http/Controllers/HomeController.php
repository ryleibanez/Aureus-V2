<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $product = Products::paginate(4);

        


        if($product){

        return view('index' , compact('product'));
        }else{

        }
        
    }

    

    
    
}
