<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisasi>
 */
class OrganisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisasi_nama' => fake()->company(),
            'organisasi_status' => fake()->randomElement(['aktif','vakum sementara','vakum']),
            'organisasi_periode' => fake()->randomElement(['2020 - 2021','2021 - 2022','2022 - 2023','2023 - 2024']),
            'organisasi_affiliate' => fake()->randomElement([true,false]),
            'prodi_id' => mt_rand(1,2)
        ];
    }
}
