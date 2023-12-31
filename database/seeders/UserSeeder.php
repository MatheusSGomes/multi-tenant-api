<?php

namespace Database\Seeders;

use App\Models\Company;
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
        \Tenant::setTenant(Company::find(1));
        User::factory()
            ->count(1)
            ->create([
                'name' => 'User 1',
                'email' => 'user1@email.com',
                'password' => '12345678',
                'company_id' => 1,
            ]);

        \Tenant::setTenant(Company::find(2));
        User::factory()
            ->count(1)
            ->create([
                'name' => 'User 2',
                'email' => 'user2@email.com',
                'password' => '12345678',
                'company_id' => 2,
            ]);
    }
}
