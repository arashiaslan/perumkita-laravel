<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    Use HasFactory;
    protected $fillable = [
        'name',  // Properti yang diizinkan untuk mass assignment
        'price',
        'image',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
