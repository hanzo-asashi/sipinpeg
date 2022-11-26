<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'nama_produk',
        'volume',
        'total',
    ];

//    protected static $unguarded = true;

    public function permintaanpengadaan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PermintaanPengadaan::class,'permintaan_pengadaan_id','produk_id');
    }

    public function permintaanpengadaans(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(PermintaanPengadaan::class,'permintaan_pengadaan_produk','produk_id','permintaan_pengadaan_id');
    }
}
