<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->create([
            'first_name' => 'user',
            'last_name' => 'admin_',
            'email' => 'admin-mail@gmail.com',
            'password' => bcrypt('password'),
        ]);

        Admin::factory()->count(39)->create();
    }
}
