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
            $table->enum('jenis_bayar', ['tunai', 'beras'])->default('tunai')->after('jumlah_jiwa');
            $table->decimal('jumlah_beras', 8, 2)->nullable()->after('jenis_bayar');
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
            $table->dropColumn(['jenis_bayar', 'jumlah_beras']);
        });
    }
};
