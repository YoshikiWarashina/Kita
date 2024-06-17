<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // test data for login
        Member::factory()->create([
            'name' => 'test_name',
            'email' => 'test_name@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Member::factory()->count(39)->create();
    }
}
