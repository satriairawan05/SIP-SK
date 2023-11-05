<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusanOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'surat_keputusan_organisasis';

    protected $primaryKey = 'sko_id';
}
