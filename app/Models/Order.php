<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'transactionid',
        'email',
        'product_id',
        'pdname',
        'pdimage',
        'quantity',
        'price',
        'totalprice',
        'orderstatus',
        'address',
        'country',
        'modeofpayment',
        'deliverydate',
        'updated_at',
       
        
    ];

}
