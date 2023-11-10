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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('mhs_id');
            $table->string('mhs_nama')->nullable();
            $table->string('mhs_nim')->nullable();
            $table->string('mhs_prodi')->nullable();
            $table->string('mhs_jurusan')->nullable();
            $table->string('mhs_jenjang')->nullable();
            $table->string('mhs_semester')->nullable();
            $table->string('mhs_tahun_masuk')->nullable();
            $table->string('mhs_jk')->nullable();
            $table->string('mhs_alamat')->nullable();
            $table->string('mhs_no_hp')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
