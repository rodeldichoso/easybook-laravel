<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'shop_name',
        'shop_address',
        'shop_category',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
