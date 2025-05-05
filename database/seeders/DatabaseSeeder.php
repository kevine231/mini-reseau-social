<?php

namespace Database\Seeders;

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
        // Créer l'utilisateur de test seulement s'il n'existe pas déjà
        if (!User::where('email', 'toto@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Exécuter le seeder des centres d'intérêt
        $this->call([
            InterestSeeder::class,
            PostSeeder::class,
        ]);
    }
}
