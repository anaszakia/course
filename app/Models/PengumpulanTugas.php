<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengumpulanTugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas_id',
        'user_id',
        'file_path',
        'komentar',
        'status',
        'nilai',
        'feedback',
    ];

    /**
     * Get the assignment that owns the submission
     */
    public function tugas(): BelongsTo
    {
        return $this->belongsTo(Tugas::class);
    }

    /**
     * Get the user that owns the submission
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
