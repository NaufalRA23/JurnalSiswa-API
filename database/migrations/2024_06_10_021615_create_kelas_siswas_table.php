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
        Schema::create('kelas_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('murid_id')->constrained('users')->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete()->cascadeOnDelete();
            $table->foreignId('kelas_id')->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_siswas');
    }
};
