<?php

namespace Database\Factories;

use App\Models\Reseau;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serveur>
 */
class ServeurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reseau = Reseau::inRandomOrder()->first();
        return [
            'ip' => fake()->ipv4(),
            'type' => fake()->word(),
            'os' => fake()->word(),
            'reseau' => $reseau->id,
        ];
    }
}
