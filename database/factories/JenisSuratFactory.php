<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisSurat>
 */
class JenisSuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'js_jenis' => $this->faker->sentences(2, true),
            'js_kode' => $this->faker->lexify('##'),
            'js_nomor' => $this->faker->numerify('##'),
            'js_ordinal' => $this->faker->numberBetween(1, 99),
        ];
    }
}
