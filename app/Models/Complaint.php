<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'user_id', 'guest_name', 'guest_email', 'guest_telp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending' => '<span class="badge" style="background-color: #ff7976;">' . strtoupper($this->status) . '</span>',
            'proses' => '<span class="badge" style="background-color: #57caeb;">' . strtoupper($this->status) . '</span>',
            'selesai' => '<span class="badge" style="background-color: #5ddab4;">' . strtoupper($this->status) . '</span>',
        };
    }
}
