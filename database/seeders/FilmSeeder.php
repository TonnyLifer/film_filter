<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Film;
use App\Models\FilmActor;
use App\Models\Rating;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1, 500) as $i){
            $film = Film::create([
                'genre_id' => rand(1, 5),
                'director_id' => rand(1, 50),
                'name' => fake()->name(),
                'description' => fake()->sentence(),
                'date' => Carbon::createFromTimestamp(rand(0, 1893456000))->format('Y-m-d'),
            ]);

            foreach(range(1, 10) as $i){
                FilmActor::create([
                    'film_id' => $film->id,
                    'actor_id' => rand(1, 100),
                ]);
            }

            Rating::create([
                'film_id' => $film->id,
                'rating' => rand(1, 10),
                'comment' => fake()->sentence(),
            ]);
        }
    }
}
