<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Account::factory(10)->create();

        Account::factory()->create([
            'username' => 'test',
            'password' => bcrypt('password'),
        ]);
    }
}
