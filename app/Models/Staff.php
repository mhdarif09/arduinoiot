<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Hanya jika staff akan diautentikasi
use Illuminate\Notifications\Notifiable;

class Staff extends Model
{
    use HasFactory, Notifiable;

    // Tabel yang dihubungkan dengan model ini
    protected $table = 'staff';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'maskapai',
        'user_id',
    ];

    // Mengatur agar password dienkripsi otomatis
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relasi ke tabel users untuk mengambil role atau user info
     * Staff berelasi dengan satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi lain atau custom behavior bisa ditambahkan di sini
}
