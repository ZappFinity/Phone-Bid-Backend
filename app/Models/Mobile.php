<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_poster_id',
        'image',
        'name',
        'price',
        'release_date',
        'sim_support',
        'operating_system',
        'phone_weight',
        'phone_dimensions',
        'screen_size',
        'screen_resolution',
        'screen_type',
        'screen_protection',
        'internal_memory',
        'ram',
        'card_slot',
        'processor',
        'gpu',
        'battery',
        'front_camera',
        'front_flash',
        'front_video_recording',
        'back_camera',
        'back_flash',
        'back_video_recording',
        'bluetooth',
        '3G',
        '4G/LTE',
        '5G',
        'radio',
        'wifi',
        'nfc',
        'is_new',
        'lat',
        'lng',
        'is_for_bid',
        'bid_starting_price'
    ];

    public function adPoster()
    {
        return $this->belongsTo(User::class, 'ad_poster_id');
    }
}
