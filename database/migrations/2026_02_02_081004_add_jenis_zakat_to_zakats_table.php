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
        Schema::table('zakats', function (Blueprint $table) {
            $table->enum('jenis_zakat', ['fitrah', 'maal', 'shodaqoh'])->default('fitrah')->after('nama_pembayar');
            $table->text('keterangan')->nullable()->after('tanggal_bayar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zakats', function (Blueprint $table) {
            $table->dropColumn(['jenis_zakat', 'keterangan']);
        });
    }
};
