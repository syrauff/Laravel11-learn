<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(mt_rand(2, 8)),
            'slug' => fake()->slug(),
            'body' => fake()->paragraphs(mt_rand(5, 10), true),
            // 'image' => 'post-images/' . fake()->image('public/storage/post-images', 640, 480, null, false),
            'user_id' => mt_rand(1, 3), 
        ];
    }
}
