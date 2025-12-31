<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('zakat_maals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembayar');
            $table->decimal('jumlah_harta', 15, 2);
            $table->decimal('zakat_dibayar', 12, 2);
            $table->date('tanggal_bayar');
            $table->text('keterangan')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zakat_maals');
    }
};