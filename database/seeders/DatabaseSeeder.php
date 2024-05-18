<?php

namespace Database\Seeders;

use App\Models\Shortlink;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'lucas@teste.com',
        ]);

        Shortlink::factory()->count(1000)->create();
    }
}
