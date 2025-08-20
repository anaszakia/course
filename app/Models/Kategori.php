<?php

namespace App\Models;

use App\Models\Kursus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'deskripsi'];

    // Relasi ke kursus
    public function kursus()
    {
        return $this->hasMany(Kursus::class, 'kategoris_id');
    }
}
