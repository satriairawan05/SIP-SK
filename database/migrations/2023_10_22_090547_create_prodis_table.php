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
        Schema::create('prodis', function (Blueprint $table) {
            $table->increments('prodi_id');
            $table->foreignId('jurusan_id');
            $table->string('prodi_name')->nullable();
            $table->string('prodi_alias')->nullable();
            $table->string('prodi_code')->nullable();
            $table->string('prodi_jenjang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
