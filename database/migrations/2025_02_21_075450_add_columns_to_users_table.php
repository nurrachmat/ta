<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable();
            $table->text('alamat')->nullable();
            $table->string('hp', 15)->nullable();
            $table->date('tmt')->nullable();
            $table->enum('status', ['aktif', 'tidak'])->default('aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'alamat', 'hp', 'tmt', 'status']);
        });
    }
};
