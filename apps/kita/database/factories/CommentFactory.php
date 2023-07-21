<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contents' => $this->faker->realText(100),
            'member_id' => $this->faker->numberBetween(1,10),
            'article_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
