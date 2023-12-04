<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $fillable = [
        'id',
        'email',
        'product_id',
        'pdname',
        'pdImage',
        'quantity',
        'price',
        'totalprice',
        'individual',
        'updated_at',
    ];
}
