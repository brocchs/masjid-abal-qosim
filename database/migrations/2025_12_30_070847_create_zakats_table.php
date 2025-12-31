<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembayar');
            $table->integer('jumlah_jiwa');
            $table->decimal('harga_per_jiwa', 10, 2);
            $table->decimal('total_bayar', 12, 2);
            $table->date('tanggal_bayar');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zakats');
    }
};