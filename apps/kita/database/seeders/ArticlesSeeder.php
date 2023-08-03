<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $articles = Article::factory()->count(40)->create();

        // 各記事に3つのタグをランダムに紐付ける
        $articles->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(3), ['created_at' => now(), 'updated_at' => now()]);
        });
    }
}
