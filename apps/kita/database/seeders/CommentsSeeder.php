<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Member;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = Member::all();

        Article::all()->each(function (Article $article) use ($members) {
            $selectedMembers = $members->random(3);

            $selectedMembers->each(function (Member $member) use ($article) {
                Comment::factory()->create([
                    'article_id' => $article->id,
                    'member_id' => $member->id,
                ]);
            });
        });
    }
}
