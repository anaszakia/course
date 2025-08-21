<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Materi;
use App\Models\Pendaftaran;
use App\Models\Tugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kursus extends Model
{
    use HasFactory;
    protected $table = 'kursuses';
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'kategoris_id',
        'thumbnail',
        'status',
        'rating',
        'harga_asli',
        'harga_diskon',
        'tanggal_mulai',
        'tanggal_selesai',
        'level'
    ];
    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id');
    }

    // Relasi ke pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'kursus_id');
    }
    
    // Relasi ke materi
    public function materi()
    {
        return $this->hasMany(Materi::class)->orderBy('urutan', 'asc');
    }
    
    // Relasi ke tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
