<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(4),
            'pengarang' => $this->faker->name,
            'cover' => '',
            'tahun_terbit' => $this->faker->year,
            'kategori_id' => $this->faker->randomElement(Kategori::all()->pluck('id')),
            // kemungkinan error ada di numberBetween(1, 7)
            'penerbit_id' => $this->faker->numberBetween(1, 7),
            
        ];
    }
}
