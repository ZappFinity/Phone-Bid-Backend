<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mobile;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'mobile_id',
        'phone',
        'email',
        'bid_price',
        'status',
    ];

    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }
}
