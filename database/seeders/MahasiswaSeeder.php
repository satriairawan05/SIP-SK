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
            'mhs_nama' => 'Deuwi Satriya Irawan',
            'mhs_nim' => 'H181600607',
            'mhs_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'mhs_jurusan' => 'Teknik Informatika',
            'mhs_jenjang' => 'D4',
            'mhs_semester' => '8',
            'mhs_jk' => 'Laki-Laki',
            'mhs_alamat' => 'Jl. Pemuda 1 Rt. 13 No. 51 Sungai Pinang dalam, Samarinda. Kota samarinda, Kalimantan Timur. Indonesia',
            'mhs_no_hp' => '082253332802',
            'password' => bcrypt('H181600607')
        ]);

        Mahasiswa::factory(49)->create();
    }
}
