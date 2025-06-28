<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'admin_id',
        'description',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
