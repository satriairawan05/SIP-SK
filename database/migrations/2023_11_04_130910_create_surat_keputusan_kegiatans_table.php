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
        Schema::create('surat_keputusan_kegiatans', function (Blueprint $table) {
            $table->increments('skk_id');
            $table->foreignId('js_id');
            $table->string('skk_created')->nullable();
            $table->string('skk_updated')->nullable();
            $table->longText('skk_subject')->nullable();
            $table->string('skk_uuid')->nullable();
            $table->string('skk_no_surat')->nullable();
            $table->string('skk_no_surat_old')->nullable();
            $table->longText('skk_menimbang')->nullable();
            $table->longText('skk_mengingat')->nullable();
            $table->longText('skk_memperhatikan')->nullable();
            $table->longText('skk_menetapkan')->nullable();
            $table->longText('skk_kesatu')->nullable();
            $table->longText('skk_kedua')->nullable();
            $table->longText('skk_ketiga')->nullable();
            $table->longText('skk_keempat')->nullable();
            $table->date('skk_tgl_surat')->nullable();
            $table->string('skk_disposisi')->nullable();
            $table->string('skk_approved')->nullable();
            $table->string('skk_remark')->nullable();
            $table->longText('skk_tembusan')->nullable();
            $table->date('skk_last_print')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keputusan_kegiatans');
    }
};
