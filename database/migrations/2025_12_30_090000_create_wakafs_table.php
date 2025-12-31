<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wakafs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemberi');
            $table->decimal('jumlah_wakaf', 12, 2);
            $table->date('tanggal_wakaf');
            $table->string('jenis_wakaf')->default('Uang'); // Uang, Tanah, Bangunan, dll
            $table->text('keterangan')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wakafs');
    }
};