<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisSurat::create([
            'js_jenis' => 'Surat Keputusan Organisasi',
            'js_kode' => 'SKO',
            'js_nomor' => '01',
            'js_ordinal' => '0',
        ]);

        JenisSurat::create([
            'js_jenis' => 'Surat Keputusan Kegiatan',
            'js_kode' => 'SKK',
            'js_nomor' => '02',
            'js_ordinal' => '0',
        ]);
    }
}
