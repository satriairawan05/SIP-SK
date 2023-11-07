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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->increments('organisasi_id');
            $table->foreignId('prodi_id')->nullable();
            $table->string('organisasi_departemen')->nullable();
            $table->string('organisasi_nama')->nullable();
            $table->string('organisasi_status')->nullable();
            $table->string('organisasi_periode')->nullable();
            $table->boolean('organisasi_affiliate')->default(false)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
