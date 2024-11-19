<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('quantity', 'total_price') // Pivot untuk menyimpan jumlah dan total harga tiap menu
            ->withTimestamps();
    }
}
