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
        Schema::create('unitkerja', function (Blueprint $table) {
            $table->id('unitkerja_id');
            $table->string('nama_unit');
            $table->string('deskripsi_unit');
            $table->string('lokasi_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unitkerja');
    }
};
