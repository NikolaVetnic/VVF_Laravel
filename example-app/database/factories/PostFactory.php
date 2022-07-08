<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $numUsers = User::all()->count();

        return [
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'user_id' => rand(0, $numUsers) + 1
        ];
    }
}
