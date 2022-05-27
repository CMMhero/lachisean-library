<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => \App\Models\Book::all()->random()->id,
            'user_id' => \App\Models\User::all()->filter(function ($user) {
                return $user->reviews->isEmpty();
            })->random()->id,
            'content' => $this->faker->sentences(5, true),
            'rating' => $this->faker->numberBetween(1, 5)
        ];
    }
}
