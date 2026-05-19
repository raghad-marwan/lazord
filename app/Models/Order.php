<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'clinic',
        'role',
        'description',
        'image',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // app/Models/Order.php
public function review()
{
    return $this->hasOne(Review::class);
}
}
