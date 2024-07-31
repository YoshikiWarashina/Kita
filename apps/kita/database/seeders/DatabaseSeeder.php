<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MembersSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
