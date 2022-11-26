<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermintaanPengadaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'permintaan_pengadaan';
    protected $primaryKey = 'permintaan_pengadaan_id';
    protected $fillable = [
        'instansi_id',
        'sub_instansi_id',
        'rekening_id',
        'program_id',
        'kegiatan_id',
        'sub_kegiatan_id',
        'rekening_id',
        'paket_pengadaan_id',
        'produk_id',
        'produk',
        'spesifikasi_teknis_lainnya',
        'waktu_pelaksanaan',
        'waktu_barang_diterima',
        'lokasi_barang',
        'informasi_lainnya',
        'kualifikasi_kinerja'
    ];

    protected $casts = [
        'spesifikasi_teknis_lainnya' => 'array',
        'kualifikasi_kinerja' => 'array',
        'informasi_lainnya' => 'array',
        'waktu_pelaksanaan' => 'datetime',
        'waktu_barang_diterima' => 'datetime',
        'produk' => 'array'
    ];

//    protected $with = [
//        'kegiatan',
//        'sub_kegiatan',
//        'rekening',
//        'program',
//        'paketpengadaan',
//        'produk',
//        'instansi',
//        'sub_instansi'
//    ];


    public function instansi(): BelongsTo
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'instansi_id');
    }

    public function sub_instansi(): BelongsTo
    {
        return $this->belongsTo(SubInstansi::class, 'sub_instansi_id', 'sub_instansi_id');
    }

    public function paketpengadaan(): BelongsTo
    {
        return $this->belongsTo(PaketPengadaan::class,'paket_pengadaan_id','paket_pengadaan_id');
    }

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'kegiatan_id');
    }

    public function sub_kegiatan(): BelongsTo
    {
        return $this->belongsTo(SubKegiatan::class, 'sub_kegiatan_id', 'sub_kegiatan_id');
    }

    public function rekening(): BelongsTo
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'rekening_id');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class,'produk_id','produk_id');
    }

    public function produks(): BelongsToMany
    {
        return $this->belongsToMany(Produk::class,'permintaan_pengadaan_produk','permintaan_pengadaan_id','produk_id');
    }

    public function permintaanpengadaanproduk(): BelongsToMany
    {
        return $this->belongsToMany(PermintaanPengadaanProduk::class,'permintaan_pengadaan','permintaan_pengadaan_id','permintaan_pengadaan_id')
            ->withTimestamps();
    }
}
