<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)
            ->withPivot('quantity', 'total_price') // Menyimpan detail pesanan tiap menu
            ->withTimestamps();
    }
}