<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'menu_id',
        'quantity',
        'total_price',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending' => '<span class="badge" style="background-color: #ff7976;">' . strtoupper($this->status) . '</span>', //merah
            'dibuat' => '<span class="badge" style="background-color: #ffd54f;">' . strtoupper($this->status) . '</span>',  //kuning
            'dikirim' => '<span class="badge" style="background-color: #ffa726;">' . strtoupper($this->status) . '</span>', //oren
            'diterima' => '<span class="badge" style="background-color: #57caeb;">' . strtoupper($this->status) . '</span>',  //biru
            'selesai' => '<span class="badge" style="background-color: #5ddab4;">' . strtoupper($this->status) . '</span>',  //hijau
        };
    }
}
