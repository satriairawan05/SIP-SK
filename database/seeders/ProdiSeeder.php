<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'jurusan_id' => 1,
            'prodi_nama' => 'Teknologi Rekayasa Perangkat Lunak',
            'prodi_alias' => 'TRPL',
            'prodi_code' => 'TRPL',
            'prodi_jenjang' => 'D4',
        ]);

        Prodi::create([
            'jurusan_id' => 1,
            'prodi_nama' => 'Teknologi Rekayasa Geomatika & Survey',
            'prodi_alias' => 'TRGS',
            'prodi_code' => 'TRGS',
            'prodi_jenjang' => 'D3',
        ]);
    }
}
