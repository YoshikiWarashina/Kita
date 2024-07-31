<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Member;
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

        Member::all()->each(function (Member $member) use ($tags) {
            $articleFactory = Article::factory(['member_id' => $member->id]);

            if ($member->id === 1) {
                $articleFactory->count(5)->create()->each(function ($article) use ($tags) {
                    $article->tags()->attach($tags->random(3));
                });
            } else {
                $articleFactory->count(1)->create()->each(function ($article) use ($tags) {
                    $article->tags()->attach($tags->random(3));
                });
            }
        });
    }
}
