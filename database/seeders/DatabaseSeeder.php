<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'test@example.com',
        ]);

        \App\Models\Book::factory()->create([
            'title' => 'Dilan: He is My Dilan',
            'author' => 'Pidi Baiq',
            'year' => '2014',
            'cover' => '',
            'desc' => '',
        ]);
        \App\Models\Book::factory()->create([
            'title' => 'Dilan Second Part: He is My Dilan',
            'author' => 'Pidi Baiq',
            'year' => '2015',
            'cover' => '',
            'desc' => '',
        ]);
        \App\Models\Book::factory()->create([
            'title' => 'MILEA Voice of Dilan',
            'author' => 'Pidi Baiq',
            'year' => '2018',
            'cover' => '',
            'desc' => '',
        ]);
    }
}
