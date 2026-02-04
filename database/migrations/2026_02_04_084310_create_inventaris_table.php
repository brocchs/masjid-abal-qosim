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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->enum('kategori', ['elektronik', 'furniture', 'alat_ibadah', 'alat_kebersihan', 'lainnya']);
            $table->integer('jumlah');
            $table->string('satuan');
            $table->enum('kondisi', ['baik', 'rusak_ringan', 'rusak_berat']);
            $table->date('tanggal_perolehan');
            $table->decimal('harga_perolehan', 15, 2)->nullable();
            $table->string('lokasi');
            $table->text('keterangan')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
};
