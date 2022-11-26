<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_pengadaan', function (Blueprint $table) {
            $table->id('permintaan_pengadaan_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('instansi_id')->constrained('instansi','instansi_id')->cascadeOnDelete();
            $table->foreignId('sub_instansi_id')->constrained('sub_instansi','sub_instansi_id')->cascadeOnDelete();
            $table->foreignId('kegiatan_id')->constrained('kegiatan','kegiatan_id')->cascadeOnDelete();
            $table->foreignId('sub_kegiatan_id')->constrained('sub_kegiatan','sub_kegiatan_id')->cascadeOnDelete();
            $table->foreignId('rekening_id')->constrained('rekening','rekening_id')->cascadeOnDelete();
            $table->foreignId('program_id')->constrained('program','program_id')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produk','produk_id')->cascadeOnDelete();
            $table->foreignId('paket_pengadaan_id')->constrained('paket_pengadaan','paket_pengadaan_id')->cascadeOnDelete();
            $table->json('spesifikasi_teknis_lainnya')->nullable()->default(null);
            $table->dateTime('waktu_pelaksanaan')->nullable()->default(null);
            $table->dateTime('waktu_barang_diterima')->nullable()->default(null);
            $table->string('lokasi_barang',200);
            $table->json('informasi_lainnya')->nullable()->default(null);
            $table->json('kualifikasi_kinerja')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_pengadaan');
    }
};
