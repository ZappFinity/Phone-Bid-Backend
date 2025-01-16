<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileRepairing extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile_name',
        'issue',
        'device_type',
        'phone',
        'email',
        'user_id',
        'status'
    ];
}
