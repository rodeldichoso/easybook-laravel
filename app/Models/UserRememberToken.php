<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRememberToken extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'device_name',
        'ip_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
