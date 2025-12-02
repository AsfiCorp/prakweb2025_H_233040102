<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(4);

        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(3, true),
            'image' => null,
        ];
    }
}
