<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';
    
    protected $fillable = [
        'kursus_id',
        'judul',
        'deskripsi',
        'tipe',
        'file_path',
        'link_url',
        'file_type',
        'urutan',
    ];

    /**
     * Get the course that owns the material
     */
    public function kursus(): BelongsTo
    {
        return $this->belongsTo(Kursus::class);
    }
}
