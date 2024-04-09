<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Recipe::factory()
        ->count(5)
        ->for(\App\Models\User::factory()->create())
        ->create();


        \App\Models\Recipe::factory()
            ->count(8)
            ->for(\App\Models\User::factory()->create())
            ->create();

        \App\Models\Comment::factory()
        ->count(2)
        ->for(\App\Models\Recipe::factory(), 'recipe')
        ->create();\App\Models\Comment::factory()
        ->count(1)
        ->for(\App\Models\Recipe::factory(), 'recipe')
        ->create();
        \App\Models\Comment::factory()
        ->count(3)
        ->for(\App\Models\Recipe::factory(), 'recipe')
        ->create();
}
}
