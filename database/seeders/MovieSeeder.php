<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Movie::create([
                'title'          => 'Movie ' . Str::random(5),
                'image'          => 'panchayat.jpeg', // Make sure this image exists in public/images/
                'description'    => $faker->paragraph,
                'story'          => $faker->paragraph,
                'cast'           => $faker->name . ', ' . $faker->name,
                'imdb_rating'    => $faker->randomFloat(1, 5.0, 9.9),
                'review'         => $faker->sentence,
                'screenshots'    => json_encode(['kubera.jpeg', 'cid.jpeg']),
                'download_4k'    => 'https://example.com/downloads/movie-4k.mp4',
                'download_1080p' => 'https://example.com/downloads/movie-1080p.mp4',
                'download_720p'  => 'https://example.com/downloads/movie-720p.mp4',
                'download_480p'  => 'https://example.com/downloads/movie-480p.mp4',
            ]);
        }
    }
}
