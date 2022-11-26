<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanPengadaanProduk extends Model
{
    use HasFactory;

    protected $table = 'permintaan_pengadaan_produk';
    protected $fillable = [
        'permintaan_pengadaan_id',
        'produk_id',
    ];
}
