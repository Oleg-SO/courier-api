<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Example',
            'email' => 'example@example.com',
            'password' => bcrypt('DaddyYankee'),
        ]);
    }
}