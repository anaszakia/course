<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kursus_id',
        'judul',
        'deskripsi',
        'batas_waktu',
        'file_path',
        'file_type',
    ];

    protected $casts = [
        'batas_waktu' => 'date',
    ];

    /**
     * Get the course that owns the assignment
     */
    public function kursus(): BelongsTo
    {
        return $this->belongsTo(Kursus::class);
    }

    /**
     * Get all submissions for this assignment
     */
    public function pengumpulan(): HasMany
    {
        return $this->hasMany(PengumpulanTugas::class);
    }
}
