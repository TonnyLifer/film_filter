<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = [
            ['name' => 'Хорор'],
            ['name' => 'Боевик'],
            ['name' => 'Детектив'],
            ['name' => 'Драма'],
            ['name' => 'Нуар']
        ];

        Genre::insert($genre);
    }
}
