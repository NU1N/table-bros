<?php

namespace Database\Factories;

use App\Models\Party;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

// TODO
/**
 * @extends Factory<Party>
 */
class PartyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'date' => fake()->dateTimeBetween('+1 day', '+30 days'),
            'time' => fake()->time('H:i'),
            'price' => fake()->numberBetween(200, 1000).' ₽',
            'description' => fake()->paragraph(),
            'host' => fake()->name(),
            'host_avatar' => null,
            'avatar' => null,
            'image' => null,
            'spots' => fake()->numberBetween(0, 5),
            'max_spots' => fake()->numberBetween(4, 8),
        ];
    }
}
