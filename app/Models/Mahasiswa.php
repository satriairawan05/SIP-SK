<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $guard = 'mahasiswa';

    protected $guarded = 'mhs_id';

    protected $table = 'mahasiswas';

    protected $primaryKey = 'mhs_id';

    protected $hidden = [
        'password',
    ];
}
