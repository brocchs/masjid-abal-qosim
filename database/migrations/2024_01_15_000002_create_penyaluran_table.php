<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penyaluran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima_bantuan');
            $table->string('sumber_dana_type'); // App\Models\Shodaqoh, App\Models\Wakaf, etc
            $table->unsignedBigInteger('sumber_dana_id');
            $table->decimal('nominal', 15, 2);
            $table->date('tanggal_penyaluran');
            $table->text('keterangan')->nullable();
            $table->string('bukti_penyerahan')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            
            $table->index(['sumber_dana_type', 'sumber_dana_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('penyaluran');
    }
};