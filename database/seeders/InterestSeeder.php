<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Interest;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            ['name' => 'Technologie', 'icon' => '💻'],
            ['name' => 'Sport', 'icon' => '⚽'],
            ['name' => 'Musique', 'icon' => '🎵'],
            ['name' => 'Art', 'icon' => '🎨'],
            ['name' => 'Voyage', 'icon' => '✈️'],
            ['name' => 'Cuisine', 'icon' => '🍳'],
            ['name' => 'Lecture', 'icon' => '📚'],
            ['name' => 'Photographie', 'icon' => '📸'],
            ['name' => 'Cinéma', 'icon' => '🎬'],
            ['name' => 'Mode', 'icon' => '👗'],
            ['name' => 'Jeux vidéo', 'icon' => '🎮'],
            ['name' => 'Nature', 'icon' => '🌿'],
            ['name' => 'Science', 'icon' => '🔬'],
            ['name' => 'Histoire', 'icon' => '📜'],
            ['name' => 'Langues', 'icon' => '🌍'],
        ];

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
