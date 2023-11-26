<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'mhs_nama' => 'angelina',
            'mhs_nim' => 'H211600434',
            'mhs_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'mhs_jurusan' => 'Teknik Informatika',
            'mhs_jenjang' => 'D4',
            'mhs_semester' => '5',
            'mhs_jk' => 'perempuan',
            'mhs_tahun_masuk' => '2021',
            'mhs_alamat' => 'mangkupalas, Samarinda. Kota samarinda, Kalimantan Timur. Indonesia',
            'mhs_no_hp' => '081212846178',
            'password' => bcrypt('H211600434')
        ]);

        Mahasiswa::create([
            'mhs_nama' => 'Mardiana',
            'mhs_nim' => 'H211600428',
            'mhs_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'mhs_jurusan' => 'Teknik Informatika',
            'mhs_jenjang' => 'D4',
            'mhs_semester' => '5',
            'mhs_jk' => 'perempuan',
            'mhs_tahun_masuk' => '2021',
            'mhs_alamat' => 'harapan baru gang mandiri Kalimantan Timur Samarinda . Indonesia',
            'mhs_no_hp' => '082311898648',
            'password' => bcrypt('H211600428')
        ]);

        // Mahasiswa::factory(49)->create();
    }
}