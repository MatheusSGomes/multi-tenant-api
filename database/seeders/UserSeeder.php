<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->create([
                'name' => 'User 1',
                'email' => 'user1@email.com',
                'password' => '12345678'
            ]);

        User::factory()
            ->count(2)
            ->create([
                'name' => 'User 2',
                'email' => 'user2@email.com',
                'password' => '12345678'
            ]);
    }
}
