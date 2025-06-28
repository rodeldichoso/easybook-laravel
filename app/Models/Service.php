<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'shop_id',
        'service_name',
        'price',
        'description',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
