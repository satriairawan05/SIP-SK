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
        Schema::create('surat_keputusan_organisasis', function (Blueprint $table) {
            $table->increments('sko_id');
            $table->foreignId('js_id');
            $table->foreignId('organisasi_id')->nullable();
            $table->string('sko_created')->nullable();
            $table->string('sko_updated')->nullable();
            $table->longText('sko_subject')->nullable();
            $table->string('sko_uuid')->nullable();
            $table->string('sko_no_surat')->nullable();
            $table->string('sko_no_surat_old')->nullable();
            $table->longText('sko_menimbang')->nullable();
            $table->longText('sko_mengingat')->nullable();
            $table->longText('sko_memperhatikan')->nullable();
            $table->longText('sko_menetapkan')->nullable();
            $table->longText('sko_kesatu')->nullable();
            $table->longText('sko_kedua')->nullable();
            $table->longText('sko_ketiga')->nullable();
            $table->longText('sko_keempat')->nullable();
            $table->longText('sko_kelima')->nullable();
            $table->date('sko_tgl_surat')->nullable();
            $table->string('sko_disposisi')->nullable();
            $table->string('sko_approved')->nullable();
            $table->string('sko_remark')->nullable();
            $table->longText('sko_tembusan')->nullable();
            $table->string('sko_lampiran')->nullable();
            $table->date('sko_last_print')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keputusan_organisasis');
    }
};
