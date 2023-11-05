<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'surat_keputusan_kegiatans';

    protected $primaryKey = 'skk_id';
}
