<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Member;
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
            'member_id' => Member::factory(),
            'article_id' => Article::factory(),
        ];
    }
}
