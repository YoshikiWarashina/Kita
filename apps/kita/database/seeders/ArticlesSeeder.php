<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $tags = Tag::all();

        // 各記事に3つのタグをランダムに紐付ける
        Article::factory()->count(40)->create()->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(3), ['created_at' => now(), 'updated_at' => now()]);
        });
    }
}
