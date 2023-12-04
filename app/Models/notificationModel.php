<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificationModel extends Model
{
    use HasFactory;

    protected $table = "notification";

    protected $fillable = [
        'email',
        'message',
        'status',
    ];
}
