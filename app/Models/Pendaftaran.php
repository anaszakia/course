<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kursus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kursus_id',
        'nama',
        'email',
        'no_hp',
        'catatan',
        'total_bayar',
        'status',
        'order_id',
        'transaction_id',
    ];
    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }   
}
