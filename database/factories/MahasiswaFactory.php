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
            'mhs_nama' => $this->faker->name('M'),
            'mhs_nim' => $this->faker->numerify('H#########'),
            'mhs_prodi' => $this->faker->randomElement(['Teknologi Rekayasa Perangkat Lunak', 'Teknologi Geomatika']),
            'mhs_jurusan' => $this->faker->randomElement(['Teknik Informatika']),
            'mhs_jenjang' => $this->faker->randomElement(['D3', 'D4']),
            'mhs_semester' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8']),
            'mhs_jk' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'mhs_alamat' => $this->faker->streetAddress(),
            'mhs_no_hp' => $this->faker->numerify('+62###########'),
            'password' => bcrypt('1234')
        ];
    }
}
