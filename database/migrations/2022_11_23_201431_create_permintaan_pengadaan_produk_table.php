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
        Schema::create('permintaan_pengadaan_produk', function (Blueprint $table) {
            $table->foreignId('permintaan_pengadaan_id')->index()->constrained('permintaan_pengadaan','permintaan_pengadaan_id')->cascadeOnDelete();
            $table->foreignId('produk_id')->index()->constrained('produk','produk_id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_pengadaan_produk');
    }
};
