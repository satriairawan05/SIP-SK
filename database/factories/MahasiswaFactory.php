<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mhs_nama' => fake()->name(),
            'mhs_nim' => fake()->numerify('H#########'),
            'mhs_prodi' => fake()->randomElement(['Teknologi Rekayasa Perangkat Lunak', 'Teknologi Rekayasa Geomatika & Survey']),
            'mhs_jurusan' => fake()->randomElement(['Teknik Informatika']),
            'mhs_jenjang' => fake()->randomElement(['D3', 'D4']),
            'mhs_semester' => fake()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
            'mhs_jk' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'mhs_alamat' => fake()->streetAddress(),
            'mhs_no_hp' => fake()->numerify('+62###########'),
            'password' => bcrypt('1234')
        ];
    }
}
