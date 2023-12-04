<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPreview extends Model
{
    use HasFactory;
   
    protected $table = "productpreview";

    protected $fillable = [
    
        'pdid',
        'image',
     
        
    ];

}
