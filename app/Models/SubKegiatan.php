<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;

    protected $table = 'sub_kegiatan';
    protected $primaryKey = 'sub_kegiatan_id';
    protected $fillable = [
        'kegiatan_id',
        'nama_sub_kegiatan',
    ];

    public function kegiatan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kegiatan_id');
    }
}
