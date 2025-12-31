<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Insert default roles if not exists
        if (!DB::table('roles')->where('name', 'Admin IT')->exists()) {
            DB::table('roles')->insert([
                ['name' => 'Admin IT', 'description' => 'Administrator IT dengan akses teknis', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'user', 'description' => 'User biasa dengan akses terbatas', 'created_at' => now(), 'updated_at' => now()]
            ]);
        }

        // Add role_id column if not exists
        if (!Schema::hasColumn('users', 'role_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('role_id')->nullable()->after('role')->constrained('roles')->onDelete('set null');
            });
        }

        // Update existing users to use role_id
        $adminRole = DB::table('roles')->where('name', 'Admin IT')->first();
        $userRole = DB::table('roles')->where('name', 'user')->first();

        if ($adminRole) {
            DB::table('users')->where('role', 'administrator')->update(['role_id' => $adminRole->id]);
        }
        if ($userRole) {
            DB::table('users')->where('role', 'user')->update(['role_id' => $userRole->id]);
        }

        // Don't drop the old role column for SQLite compatibility
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn('role');
        // });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['administrator', 'user'])->default('user');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};